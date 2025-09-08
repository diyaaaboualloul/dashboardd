<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function create()
    {
        return view('products.addproduct');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'price'       => ['required','numeric','min:0'],
            'image'       => ['nullable','image','mimes:jpg,jpeg,png,webp,gif','max:3072'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $filename = Str::uuid().'.'.$request->file('image')->extension();
            $path = $request->file('image')->storeAs('products', $filename, 'public');
        }

        Product::create([
            'title'       => $data['title'],
            'description' => $data['description'] ?? null,
            'price'       => $data['price'],
            'image_path'  => $path,
        ]);

        return redirect()->route('products.create')->with('success', 'Product added successfully.');
    }

    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('home', compact('products'));
    }

    // Soft delete (moves to trash)
    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product moved to trash.');
    }

    // Show trashed items
    public function trash()
    {
        $products = Product::onlyTrashed()->latest('deleted_at')->paginate(10);
        return view('products.trash', compact('products'));
    }

    // Restore from trash
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();
        return back()->with('success', 'Product restored.');
    }

    // Permanently delete (also remove image file)
    public function forceDestroy($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        if ($product->image_path && Storage::disk('public')->exists($product->image_path)) {
            Storage::disk('public')->delete($product->image_path);
        }

        $product->forceDelete();
        return back()->with('success', 'Product permanently deleted.');
    }
}

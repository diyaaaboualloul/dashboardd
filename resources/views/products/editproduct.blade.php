<x-layout :title="'Edit Product'">
    <div style="max-width:700px;margin:24px auto;background:#fff;border:1px solid #eee;border-radius:10px;padding:22px">
        <h2 style="margin:0 0 14px;">Edit Product</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title', $product->title) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description', $product->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Price ($)</label>
                <input type="number" step="0.01" min="0" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Image</label>
                @if ($product->image_path)
                    <div class="d-flex align-items-center mb-2">
                        <img src="{{ asset('storage/'.$product->image_path) }}" alt="" style="width:70px;height:70px;object-fit:cover;border-radius:6px;margin-right:10px;">
                        <label class="ms-2">
                            <input type="checkbox" name="remove_image" value="1"> Remove current image
                        </label>
                    </div>
                @endif
                <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp,.gif" class="form-control">
                <small class="text-muted">Uploading a new image will replace the existing one.</small>
            </div>

            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{ route('home') }}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </div>
</x-layout>

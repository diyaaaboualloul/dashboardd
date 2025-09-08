<x-layout :title="'Add Product'">
    <div style="max-width:700px;margin:24px auto;background:#fff;border:1px solid #eee;border-radius:10px;padding:22px">
        <h2 style="margin:0 0 14px;">Add Product</h2>

        @if (session('success'))
            <div style="background:#ecfdf5;border:1px solid #a7f3d0;color:#065f46;padding:10px;border-radius:8px;margin-bottom:12px;">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div style="background:#fee2e2;border:1px solid #fecaca;color:#991b1b;padding:10px;border-radius:8px;margin-bottom:12px;">
                <ul style="margin:0 0 0 16px;padding:0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom:12px">
                <label class="form-label">Title</label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-control" required>
            </div>

            <div style="margin-bottom:12px">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div style="margin-bottom:12px">
                <label class="form-label">Price ($)</label>
                <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}" class="form-control" required>
            </div>

            <div style="margin-bottom:16px">
                <label class="form-label">Image</label>
                <input type="file" name="image" accept=".jpg,.jpeg,.png,.webp,.gif" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Add Product</button>
        </form>
    </div>
</x-layout>

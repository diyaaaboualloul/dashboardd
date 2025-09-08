<x-layout :title="'Dashboard Home'">
    <div class="container" style="padding:20px;">
        <h1 style="margin-bottom:16px;">Dashboard Home</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a class="btn btn-primary" href="{{ route('products.create') }}">Add Product</a>
            <a class="btn btn-outline-secondary" href="{{ route('products.trash') }}">Trash</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th style="width:80px;">Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th style="width:120px;">Price</th>
                        <th style="width:160px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($products as $p)
                    <tr>
                        <td>
                            @if ($p->image_path)
                                <img src="{{ asset('storage/'.$p->image_path) }}" 
                                     alt="{{ $p->title }}" 
                                     style="width:60px;height:60px;object-fit:cover;border-radius:6px;">
                            @else
                                <div style="width:60px;height:60px;background:#eee;border-radius:6px;"></div>
                            @endif
                        </td>
                        <td>{{ $p->title }}</td>
                        <td style="max-width:380px;">
                            {{ \Illuminate\Support\Str::limit($p->description, 120) }}
                        </td>
                        <td>${{ number_format($p->price, 2) }}</td>
                        <td>
                            {{-- Edit will be wired next step --}}
<a href="{{ route('products.edit', $p) }}" class="btn btn-sm btn-outline-secondary">Edit</a>

                            <form action="{{ route('products.destroy', $p) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">No products yet.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $products->links() }}
        </div>
    </div>
</x-layout>

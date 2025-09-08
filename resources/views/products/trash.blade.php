<x-layout :title="'Trash'">
    <div class="container" style="padding:20px;">
        <h1 style="margin-bottom:16px;">Trash</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="mb-3">
            <a class="btn btn-outline-primary" href="{{ route('home') }}">Back to Products</a>
        </div>

        <div class="table-responsive">
            <table class="table table-striped align-middle">
                <thead>
                    <tr>
                        <th style="width:80px;">Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th style="width:120px;">Price</th>
                        <th style="width:220px;">Actions</th>
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
                        <td style="max-width:380px;">{{ \Illuminate\Support\Str::limit($p->description, 120) }}</td>
                        <td>${{ number_format($p->price, 2) }}</td>
                        <td>
                            <form action="{{ route('products.restore', $p->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">Restore</button>
                            </form>

                            <form action="{{ route('products.forceDestroy', $p->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Permanently delete this product? This cannot be undone.');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete Forever</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center text-muted">Trash is empty.</td></tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div>
            {{ $products->links() }}
        </div>
    </div>
</x-layout>

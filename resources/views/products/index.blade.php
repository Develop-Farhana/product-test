@extends('layouts.app')

@section('content')
    <div class="mb-3 d-flex justify-content-between">
        <form action="{{ route('products.search') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control me-2" placeholder="Search by product name">
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        <div>
            <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
            <a href="{{ route('cart.index') }}" class="btn btn-secondary">View Cart</a>
        </div>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Type</th>
                <th>Price</th>
                <th>Offer Price</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td><img src="{{ asset('storage/' . $product->image) }}" width="60" /></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->type }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->offer_price }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this product?')">Delete</button>
                        </form>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            <button class="btn btn-sm btn-info">Add to Cart</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">No products found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection

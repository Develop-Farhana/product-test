@extends('layouts.app')

@section('content')
<div class="mb-3 d-flex justify-content-between align-items-center">
    <form method="GET" class="d-flex" role="search">
        <input type="text" name="search" value="{{ $search ?? '' }}" class="form-control me-2"
            placeholder="Search by name">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <div>
        <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
        <a href="{{ route('cart.index') }}" class="btn btn-secondary">View Cart</a>
    </div>
</div>

<table class="table table-bordered table-hover">
    <thead class="table-light">
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
        @if($products->count())
        @foreach($products as $product)
        <tr>
            <td>
                <img src="{{ asset('storage/' . $product->image) }}" width="60" alt="{{ $product->name }}">
            </td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->type }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->offer_price }}</td>
            <td>{{ $product->description }}</td>
            <td>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger"
                        onclick="return confirm('Delete this product?')">Delete</button>
                </form>

                <form action="{{ route('cart.add', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button class="btn btn-sm btn-info">Add to Cart</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="7" class="text-center">No products found.</td>
        </tr>
        @endif
    </tbody>
</table>
@endsection

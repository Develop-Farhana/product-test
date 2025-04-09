@extends('layouts.app')

@section('content')
<a href="{{ route('products.index') }}" class="btn btn-secondary mb-3">Back to Products</a>
<h4>Products in Cart</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Type</th>
            <th>Price</th>
            <th>Offer Price</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cartItems as $item)
        <tr>
            <td><img src="{{ asset('storage/' . $item->product->image) }}" width="60" /></td>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->product->type }}</td>
            <td>{{ $item->product->price }}</td>
            <td>{{ $item->product->offer_price }}</td>
            <td>{{ $item->product->description }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No products in cart</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
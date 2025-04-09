@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    @include('products.form', ['product' => $product])
    <button type="submit" class="btn btn-success">Update Product</button>
</form>
@endsection
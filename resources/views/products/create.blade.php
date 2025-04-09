@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
    @csrf
    @include('products.form')
    <button type="submit" class="btn btn-primary">Add Product</button>
</form>
@endsection
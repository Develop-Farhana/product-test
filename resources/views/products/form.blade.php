<div class="mb-3">
    <label>Product Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Type</label>
    <input type="text" name="type" class="form-control" value="{{ old('type', $product->type ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Price</label>
    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price ?? '') }}" required>
</div>
<div class="mb-3">
    <label>Offer Price</label>
    <input type="number" name="offer_price" class="form-control"
        value="{{ old('offer_price', $product->offer_price ?? '') }}">
</div>
<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($product->image))
    <img src="{{ asset('storage/' . $product->image) }}" width="80" class="mt-2">
    @endif
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
</div>
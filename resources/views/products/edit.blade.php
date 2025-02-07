@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" value="{{ $product->price }}" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
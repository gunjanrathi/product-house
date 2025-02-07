@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add Product</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Price:</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
</div>
@endsection
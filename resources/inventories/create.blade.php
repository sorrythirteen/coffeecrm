@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add Inventory</h1>
    <form action="{{ route('inventories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Inventory</button>
    </form>
</div>
@endsection
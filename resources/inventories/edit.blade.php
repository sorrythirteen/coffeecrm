@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Inventory</h1>
    <form action="{{ route('inventories.update', $inventory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" value="{{ $inventory->product_name }}" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" class="form-control" value="{{ $inventory->quantity }}" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $inventory->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Inventory</button>
    </form>
</div>
@endsection
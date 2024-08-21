@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Inventory Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $inventory->product_name }}</h5>
            <p class="card-text"><strong>Quantity:</strong> {{ $inventory->quantity }}</p>
            <p class="card-text"><strong>Price:</strong> {{ $inventory->price }}</p>
            <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('inventories.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
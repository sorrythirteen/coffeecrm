@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Inventories</h1>
    <a href="{{ route('inventories.create') }}" class="btn btn-primary mb-3">Add Inventory</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
            <tr>
                <td>{{ $inventory->product_name }}</td>
                <td>{{ $inventory->quantity }}</td>
                <td>{{ $inventory->price }}</td>
                <td>
                    <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
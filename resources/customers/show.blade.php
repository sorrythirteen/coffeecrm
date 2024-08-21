@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Customer Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $customer->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $customer->email }}</p>
            <p class="card-text"><strong>Phone:</strong> {{ $customer->phone }}</p>
            <p class="card-text"><strong>Address:</strong> {{ $customer->address }}</p>
            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
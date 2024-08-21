@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Loyalty Program Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Customer: {{ $loyaltyProgram->customer->name }}</h5>
            <p class="card-text"><strong>Points:</strong> {{ $loyaltyProgram->points }}</p>
            <a href="{{ route('loyalty_programs.edit', $loyaltyProgram->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('loyalty_programs.destroy', $loyaltyProgram->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="{{ route('loyalty_programs.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
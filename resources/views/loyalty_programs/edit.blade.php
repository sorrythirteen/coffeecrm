<!-- resources/views/loyalty_programs/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Loyalty Program</h1>
    <form action="{{ route('loyalty_programs.update', $loyaltyProgram->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}" {{ $customer->id == $loyaltyProgram->customer_id ? 'selected' : '' }}>{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="points">Points</label>
            <input type="number" name="points" class="form-control" value="{{ $loyaltyProgram->points }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Loyalty Program</button>
    </form>
</div>
@endsection
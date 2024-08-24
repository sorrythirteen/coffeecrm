@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Employee Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->name }}</h5>
            <p class="card-text"><strong>Email:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Position:</strong> {{ $employee->position }}</p>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
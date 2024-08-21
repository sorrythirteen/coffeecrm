@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Loyalty Programs</h1>
    <a href="{{ route('loyalty_programs.create') }}" class="btn btn-primary mb-3">Add Loyalty Program</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Customer</th>
                <th>Points</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loyaltyPrograms as $loyaltyProgram)
            <tr>
                <td>{{ $loyaltyProgram->customer->name }}</td>
                <td>{{ $loyaltyProgram->points }}</td>
                <td>
                    <a href="{{ route('loyalty_programs.edit', $loyaltyProgram->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('loyalty_programs.destroy', $loyaltyProgram->id) }}" method="POST" style="display: inline;">
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
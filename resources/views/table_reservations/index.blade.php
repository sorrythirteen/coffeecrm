@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Table Reservations</h1>
    <a href="{{ route('table_reservations.create') }}" class="btn btn-primary">Create Reservation</a>
    <table class="table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Phone Number</th>
                <th>Table Number</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->phone_number }}</td>
                <td>{{ $reservation->table_number }}</td>
                <td>
                    <a href="{{ route('table_reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('table_reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
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
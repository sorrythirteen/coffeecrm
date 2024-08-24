@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Work Times</h1>
    <a href="{{ route('work_times.create') }}" class="btn btn-primary mb-3">Record Work Time</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workTimes as $workTime)
            <tr>
                <td>{{ $workTime->employee->name }}</td>
                <td>{{ $workTime->start_time }}</td>
                <td>{{ $workTime->end_time }}</td>
                <td>
                    <a href="{{ route('work_times.edit', $workTime->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('work_times.destroy', $workTime->id) }}" method="POST" style="display: inline;">
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
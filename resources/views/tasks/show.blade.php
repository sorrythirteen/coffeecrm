@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Task Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $task->title }}</h5>
            <p class="card-text"><strong>Description:</strong> {{ $task->description }}</p>
            <p class="card-text"><strong>Due Date:</strong> {{ $task->due_date }}</p>
            <p class="card-text"><strong>Status:</strong> {{ $task->status }}</p>
            @if($task->employee)
                <p class="card-text"><strong>Assigned to:</strong> {{ $task->employee->name }}</p>
            @else
                <p class="card-text"><strong>Assigned to:</strong> Not assigned</p>
            @endif
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
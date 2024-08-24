@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Редактировать</h1>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Сотрудник</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $employee->id == $task->employee_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required>{{ $task->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Сделать до</label>
            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
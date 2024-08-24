@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Добавить</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Сотрудник</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="due_date">Сделать до</label>
            <input type="date" name="due_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
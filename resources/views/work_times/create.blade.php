@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Записать часы</h1>
    <form action="{{ route('work_times.store') }}" method="POST">
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
            <label for="start_time">Начало смены</label>
            <input type="datetime-local" name="start_time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_time">Конец смены</label>
            <input type="datetime-local" name="end_time" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Записать</button>
    </form>
</div>
@endsection
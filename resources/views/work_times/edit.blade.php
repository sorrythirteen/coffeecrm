@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Редактировать</h1>
    <form action="{{ route('work_times.update', $workTime->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Сотрудник</label>
            <select name="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $employee->id == $workTime->employee_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Начало смены</label>
            <input type="datetime-local" name="start_time" class="form-control" value="{{ $workTime->start_time }}" required>
        </div>
        <div class="form-group">
            <label for="end_time">Конец смены</label>
            <input type="datetime-local" name="end_time" class="form-control" value="{{ $workTime->end_time }}">
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
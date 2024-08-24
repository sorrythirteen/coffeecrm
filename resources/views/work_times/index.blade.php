@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Рабочие часы</h1>
    <a href="{{ route('work_times.create') }}" class="btn btn-primary mb-3">Записать часы</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Сотрудник</th>
                <th>Начало смены</th>
                <th>Конец смены</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($workTimes as $workTime)
            <tr>
                <td>{{ $workTime->employee->name }}</td>
                <td>{{ $workTime->start_time }}</td>
                <td>{{ $workTime->end_time }}</td>
                <td>
                    <a href="{{ route('work_times.edit', $workTime->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('work_times.destroy', $workTime->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
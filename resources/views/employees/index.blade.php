@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Сотрудники</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Добавить сотрудника</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Почта</th>
                <th>Должность</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->email }}</td>
                <td>{{ $employee->position }}</td>
                <td>
                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
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
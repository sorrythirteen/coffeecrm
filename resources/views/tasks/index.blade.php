@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Задачи</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3">Добавить</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Сделать до</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->description }}</td>
                <td>{{ $task->due_date }}</td>
                <td>{{ $task->status }}</td>
                <td>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
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
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Детали</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $employee->name }}</h5>
            <p class="card-text"><strong>Почта:</strong> {{ $employee->email }}</p>
            <p class="card-text"><strong>Должность:</strong> {{ $employee->position }}</p>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning">Редактировать</a>
            <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
</div>
@endsection
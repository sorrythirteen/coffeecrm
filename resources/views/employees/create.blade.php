@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Добавить</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="position">Должность</label>
            <input type="text" name="position" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
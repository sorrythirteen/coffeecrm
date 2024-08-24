<!-- resources/views/customers/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Добавить гостя</h1>
    <form action="{{ route('customers.store') }}" method="POST">
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
            <label for="phone">Телефон</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">придумать назначение, либо удалить</label>
            <textarea name="address" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Добавить гостя</button>
    </form>
</div>
@endsection
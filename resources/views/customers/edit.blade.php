<!-- resources/views/customers/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Редактировать гостя</h1>
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ $customer->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="email" name="email" class="form-control" value="{{ $customer->email }}" required>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}">
        </div>
        <div class="form-group">
            <label for="address">придумать назначение, либо удалить</label>
            <textarea name="address" class="form-control">{{ $customer->address }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
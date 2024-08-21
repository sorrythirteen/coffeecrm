<!-- resources/views/customers/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Гости</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Добавить гостя</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Почта</th>
                <th>Телефон</th>
                <th>Адрес</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display: inline;">
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
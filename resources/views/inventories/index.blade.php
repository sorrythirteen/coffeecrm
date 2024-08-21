<!-- resources/views/inventories/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Запасы</h1>
    <a href="{{ route('inventories.create') }}" class="btn btn-primary mb-3">Добавить товар</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventories as $inventory)
            <tr>
                <td>{{ $inventory->product_name }}</td>
                <td>{{ $inventory->quantity }}</td>
                <td>{{ $inventory->price }}</td>
                <td>
                    <a href="{{ route('inventories.edit', $inventory->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('inventories.destroy', $inventory->id) }}" method="POST" style="display: inline;">
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
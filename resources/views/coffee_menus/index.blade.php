@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Меню</h1>
    <a href="{{ route('coffee_menus.create') }}" class="btn btn-primary mb-3">Добавить</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Название</th>
                <th>Объем (мл)</th>
                <th>Цена</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coffeeMenus as $coffeeMenu)
            <tr>
                <td>{{ $coffeeMenu->name }}</td>
                <td>{{ $coffeeMenu->volume_ml }}</td>
                <td>{{ $coffeeMenu->price }}</td>
                <td>{{ $coffeeMenu->description }}</td>
                <td>
                    <a href="{{ route('coffee_menus.edit', $coffeeMenu->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('coffee_menus.destroy', $coffeeMenu->id) }}" method="POST" style="display: inline;">
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
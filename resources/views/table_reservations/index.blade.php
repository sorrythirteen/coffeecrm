@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Бронирование столов</h1>
    <a href="{{ route('table_reservations.create') }}" class="btn btn-primary">Создать бронь</a>
    <table class="table">
        <thead>
            <tr>
                <th>Дата</th>
                <th>Время</th>
                <th>Телефон</th>
                <th>Стол</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->date }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->phone_number }}</td>
                <td>{{ $reservation->table_number }}</td>
                <td>
                    <a href="{{ route('table_reservations.edit', $reservation->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('table_reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
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
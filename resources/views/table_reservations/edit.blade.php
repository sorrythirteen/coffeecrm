@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать</h1>
    <form action="{{ route('table_reservations.update', $tableReservation->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" name="date" class="form-control" value="{{ $tableReservation->date }}" required>
        </div>
        <div class="form-group">
            <label for="time">Время</label>
            <input type="time" name="time" class="form-control" value="{{ $tableReservation->time }}" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Телефон</label>
            <input type="text" name="phone_number" class="form-control" value="{{ $tableReservation->phone_number }}" required>
        </div>
        <div class="form-group">
            <label for="table_number">Стол</label>
            <input type="number" name="table_number" class="form-control" min="1" max="10" value="{{ $tableReservation->table_number }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
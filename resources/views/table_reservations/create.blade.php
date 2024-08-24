@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Создать бронь</h1>
    <form action="{{ route('table_reservations.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="date">Дата</label>
            <input type="date" name="date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="time">Время</label>
            <input type="time" name="time" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone_number">Телефон</label>
            <input type="text" name="phone_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="table_number">Стол</label>
            <input type="number" name="table_number" class="form-control" min="1" max="10" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>
</div>
@endsection
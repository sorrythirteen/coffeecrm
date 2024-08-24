<!-- resources/views/loyalty_programs/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Добавить гостя</h1>
    <form action="{{ route('loyalty_programs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Гость</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="points">Баллы</label>
            <input type="number" name="points" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
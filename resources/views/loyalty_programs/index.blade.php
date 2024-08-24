<!-- resources/views/loyalty_programs/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Баллы</h1>
    <a href="{{ route('loyalty_programs.create') }}" class="btn btn-primary mb-3">Добавить гостя в программу лояльности</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Гость</th>
                <th>Баллы</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($loyaltyPrograms as $loyaltyProgram)
            <tr>
                <td>{{ $loyaltyProgram->customer ? $loyaltyProgram->customer->name : 'No Customer' }}</td>
                <td>{{ $loyaltyProgram->points }}</td>
                <td>
                    <a href="{{ route('loyalty_programs.edit', $loyaltyProgram->id) }}" class="btn btn-sm btn-warning">Редактировать</a>
                    <form action="{{ route('loyalty_programs.destroy', $loyaltyProgram->id) }}" method="POST" style="display: inline;">
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
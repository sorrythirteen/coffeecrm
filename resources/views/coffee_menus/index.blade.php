@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Coffee Menus</h1>
    <a href="{{ route('coffee_menus.create') }}" class="btn btn-primary mb-3">Add Coffee Menu</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Volume (ml)</th>
                <th>Price</th>
                <th>Description</th>
                <th>Actions</th>
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
                    <a href="{{ route('coffee_menus.edit', $coffeeMenu->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('coffee_menus.destroy', $coffeeMenu->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
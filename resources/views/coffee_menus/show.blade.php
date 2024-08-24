@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Coffee Menu Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $coffeeMenu->name }}</h5>
            <p class="card-text"><strong>Volume (ml):</strong> {{ $coffeeMenu->volume_ml }}</p>
            <p class="card-text"><strong>Price:</strong> {{ $coffeeMenu->price }}</p>
            <p class="card-text"><strong>Description:</strong> {{ $coffeeMenu->description }}</p>
            <p class="card-text"><strong>Ingredients:</strong></p>
            <ul>
                @foreach($coffeeMenu->ingredients as $ingredient)
                <li>{{ $ingredient->inventory->product_name }}</li>
                @endforeach
            </ul>
            <a href="{{ route('coffee_menus.edit', $coffeeMenu->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('coffee_menus.destroy', $coffeeMenu->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection
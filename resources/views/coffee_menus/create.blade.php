@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Add Coffee Menu</h1>
    <form action="{{ route('coffee_menus.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="volume_ml">Volume (ml)</label>
            <input type="number" name="volume_ml" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="ingredients">Ingredients</label>
            <select name="ingredients[]" class="form-control" multiple required>
                @foreach($inventories as $inventory)
                <option value="{{ $inventory->id }}">{{ $inventory->product_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add Coffee Menu</button>
    </form>
</div>
@endsection
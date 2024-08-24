@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Редактировать</h1>
    <form action="{{ route('coffee_menus.update', $coffeeMenu->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" class="form-control" value="{{ $coffeeMenu->name }}" required>
        </div>
        <div class="form-group">
            <label for="volume_ml">Объем (мл)</label>
            <input type="number" name="volume_ml" class="form-control" value="{{ $coffeeMenu->volume_ml }}" required>
        </div>
        <div class="form-group">
            <label for="price">Цена</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $coffeeMenu->price }}" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" rows="3">{{ $coffeeMenu->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="ingredients">Ингредиенты</label>
            <select name="ingredients[]" class="form-control" multiple required>
                @foreach($inventories as $inventory)
                <option value="{{ $inventory->id }}" {{ in_array($inventory->id, $coffeeMenu->ingredients->pluck('inventory_id')->toArray()) ? 'selected' : '' }}>{{ $inventory->product_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
</div>
@endsection
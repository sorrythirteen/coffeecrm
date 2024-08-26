@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Создать заказ</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Имя</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="items">Позиции</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Меню</th>
                        <th>Количество</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coffeeMenus as $coffeeMenu)
                        <tr>
                            <td>
                                <input type="checkbox" name="items[{{ $coffeeMenu->id }}][coffee_menu_id]"
                                    value="{{ $coffeeMenu->id }}">
                                {{ $coffeeMenu->name }}
                            </td>
                            <td>
                                <input type="number" name="items[{{ $coffeeMenu->id }}][quantity]" class="form-control"
                                    min="1" value="1">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <label for="inventories">Запасы</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Наименование</th>
                        <th>Количество</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($inventories as $inventory)
                        <tr>
                            <td>
                                <input type="hidden" name="inventories[{{ $inventory->id }}][id]"
                                    value="{{ $inventory->id }}">
                                {{ $inventory->product_name }}
                            </td>
                            <td>
                                <input type="number" name="inventories[{{ $inventory->id }}][quantity]" class="form-control"
                                    min="1" value="1">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <label for="payment_method">Метод оплаты</label>
            <select name="payment_method" class="form-control" required>
                <option value="cash">Наличные</option>
                <option value="sbp">СБП</option>
                <option value="card">Карта</option>
            </select>
        </div>
        <div class="form-group">
            <label for="order_time">Время оплаты</label>
            <input type="datetime-local" name="order_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Создать заказ</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Create Order</h1>
    <form action="{{ route('orders.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="customer_id">Customer</label>
            <select name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="items">Items</label>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Coffee Menu</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($coffeeMenus as $coffeeMenu)
                    <tr>
                        <td>
                            <input type="checkbox" name="items[{{ $coffeeMenu->id }}][coffee_menu_id]" value="{{ $coffeeMenu->id }}">
                            {{ $coffeeMenu->name }}
                        </td>
                        <td>
                            <input type="number" name="items[{{ $coffeeMenu->id }}][quantity]" class="form-control" min="1" value="1">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <label for="payment_method">Payment Method</label>
            <select name="payment_method" class="form-control" required>
                <option value="cash">Cash</option>
                <option value="sbp">SBP</option>
                <option value="card">Card</option>
            </select>
        </div>
        <div class="form-group">
            <label for="order_time">Order Time</label>
            <input type="datetime-local" name="order_time" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Order</button>
    </form>
</div>
@endsection
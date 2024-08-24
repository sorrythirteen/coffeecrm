@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">История заказов</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Добавить заказ</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Номер чека</th>
                <th>Имя гостя</th>
                <th>Позиции</th>
                <th>Метод оплаты</th>
                <th>Время оплаты</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->order_number }}</td>
                <td>{{ $order->customer->name }}</td>
                <td>
                    <ul>
                        @foreach($order->items as $item)
                        <li>{{ $item->coffeeMenu->name }} ({{ $item->quantity }})</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $order->payment_method }}</td>
                <td>{{ $order->order_time }}</td>
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
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
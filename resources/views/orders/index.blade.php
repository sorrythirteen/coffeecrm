@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Order History</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Create Order</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Receipt Number</th>
                <th>Date</th>
                <th>Total Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->receipt_number }}</td>
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->total_amount }}</td>
                <td>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display: inline;">
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
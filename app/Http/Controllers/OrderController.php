<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\CoffeeMenu;
use App\Models\Order;
use App\Models\OrderItem; // Убедитесь, что этот импорт используется
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('customer', 'items.coffeeMenu')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $coffeeMenus = CoffeeMenu::all();
        return view('orders.create', compact('customers', 'coffeeMenus'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'items' => 'required|array',
            'items.*.coffee_menu_id' => 'required|exists:coffee_menus,id',
            'items.*.quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:cash,sbp,card',
            'order_time' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
            $orderNumber = rand(1, 99999999);

            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_id' => $validatedData['customer_id'],
                'payment_method' => $validatedData['payment_method'],
                'order_time' => $validatedData['order_time'],
            ]);

            foreach ($validatedData['items'] as $item) {
                $coffeeMenu = CoffeeMenu::find($item['coffee_menu_id']);
                $order->items()->create([
                    'coffee_menu_id' => $item['coffee_menu_id'],
                    'quantity' => $item['quantity'],
                    'price' => $coffeeMenu->price,
                ]);
            }

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Order created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
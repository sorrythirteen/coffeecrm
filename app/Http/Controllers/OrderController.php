<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CoffeeMenu;
use App\Models\Order;
use App\Models\Inventory; // Добавьте этот импорт
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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
        $inventories = Inventory::all(); // Добавьте эту строку
        return view('orders.create', compact('customers', 'coffeeMenus', 'inventories'));
    }

    public function store(Request $request)
    {
        try {
            // Валидация данных
            $validatedData = $request->validate([
                'customer_id' => 'required|exists:customers,id',
                'items' => 'required|array',
                'items.*.coffee_menu_id' => 'required|exists:coffee_menus,id',
                'items.*.quantity' => 'integer|min:0', // Разрешаем нулевое значение
                'payment_method' => 'required|in:cash,sbp,card',
                'order_time' => 'required|date',
                'inventories' => 'required|array',
                'inventories.*.id' => 'required|exists:inventories,id',
                'inventories.*.quantity' => 'required|integer|min:1',
            ]);

            // Начало транзакции
            DB::beginTransaction();

            // Генерация номера заказа
            $orderNumber = rand(1, 99999999);

            // Создание заказа
            $order = Order::create([
                'order_number' => $orderNumber,
                'customer_id' => $validatedData['customer_id'],
                'payment_method' => $validatedData['payment_method'],
                'order_time' => $validatedData['order_time'],
            ]);

            // Добавление позиций заказа
            foreach ($validatedData['items'] as $item) {
                if (isset($item['quantity']) && $item['quantity'] > 0) { // Проверяем наличие поля и что количество больше 0
                    $coffeeMenu = CoffeeMenu::find($item['coffee_menu_id']);
                    if (!$coffeeMenu) {
                        throw new \Exception("Coffee menu item not found: {$item['coffee_menu_id']}");
                    }
                    $order->items()->create([
                        'coffee_menu_id' => $item['coffee_menu_id'],
                        'quantity' => $item['quantity'],
                        'price' => $coffeeMenu->price,
                    ]);
                }
            }

            // Списание запасов
            foreach ($validatedData['inventories'] as $inventoryData) {
                $inventory = Inventory::find($inventoryData['id']);
                if (!$inventory) {
                    throw new \Exception("Inventory item not found: {$inventoryData['id']}");
                }
                $inventory->quantity -= $inventoryData['quantity'];
                $inventory->save();
            }

            // Подтверждение транзакции
            DB::commit();

            // Перенаправление с сообщением об успехе
            return redirect()->route('orders.index')->with('success', 'Order created successfully.');
        } catch (\Exception $e) {
            // Откат транзакции
            DB::rollback();

            // Логирование ошибки
            Log::error('Order creation failed: ' . $e->getMessage());

            // Возвращение на предыдущую страницу с ошибкой
            return back()->withErrors(['error' => $e->getMessage()])->withInput();
        }
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
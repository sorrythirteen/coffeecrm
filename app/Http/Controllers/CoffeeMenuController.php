<?php

namespace App\Http\Controllers;

use App\Models\CoffeeMenu;
use App\Models\Inventory;
use Illuminate\Http\Request;

class CoffeeMenuController extends Controller
{
    public function index()
    {
        $coffeeMenus = CoffeeMenu::with('ingredients.inventory')->get();
        return view('coffee_menus.index', compact('coffeeMenus'));
    }

    public function create()
    {
        $inventories = Inventory::all();
        return view('coffee_menus.create', compact('inventories'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'volume_ml' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'ingredients' => 'required|array',
        ]);

        $coffeeMenu = CoffeeMenu::create($validatedData);

        foreach ($validatedData['ingredients'] as $inventoryId) {
            $coffeeMenu->ingredients()->create(['inventory_id' => $inventoryId]);
        }

        return redirect()->route('coffee_menus.index')->with('success', 'Coffee menu created successfully.');
    }

    public function show(CoffeeMenu $coffeeMenu)
    {
        $coffeeMenu->load('ingredients.inventory');
        return view('coffee_menus.show', compact('coffeeMenu'));
    }

    public function edit(CoffeeMenu $coffeeMenu)
    {
        $inventories = Inventory::all();
        $coffeeMenu->load('ingredients.inventory');
        return view('coffee_menus.edit', compact('coffeeMenu', 'inventories'));
    }

    public function update(Request $request, CoffeeMenu $coffeeMenu)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'volume_ml' => 'required|integer',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'ingredients' => 'required|array',
        ]);

        $coffeeMenu->update($validatedData);

        $coffeeMenu->ingredients()->delete();

        foreach ($validatedData['ingredients'] as $inventoryId) {
            $coffeeMenu->ingredients()->create(['inventory_id' => $inventoryId]);
        }

        return redirect()->route('coffee_menus.index')->with('success', 'Coffee menu updated successfully.');
    }

    public function destroy(CoffeeMenu $coffeeMenu)
    {
        $coffeeMenu->delete();
        return redirect()->route('coffee_menus.index')->with('success', 'Coffee menu deleted successfully.');
    }
}
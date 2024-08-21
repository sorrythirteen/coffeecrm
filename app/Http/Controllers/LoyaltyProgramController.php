<?php

namespace App\Http\Controllers;

use App\Models\LoyaltyProgram;
use App\Models\Customer;
use Illuminate\Http\Request;

class LoyaltyProgramController extends Controller
{
    public function index()
    {
        $loyaltyPrograms = LoyaltyProgram::all();
        return view('loyalty_programs.index', compact('loyaltyPrograms'));
    }

    public function create()
    {
        $customers = Customer::all();
        return view('loyalty_programs.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'points' => 'required|integer',
        ]);

        LoyaltyProgram::create($validatedData);

        return redirect()->route('loyalty_programs.index')->with('success', 'Loyalty program created successfully.');
    }

    public function show(LoyaltyProgram $loyaltyProgram)
    {
        return view('loyalty_programs.show', compact('loyaltyProgram'));
    }

    public function edit(LoyaltyProgram $loyaltyProgram)
    {
        $customers = Customer::all();
        return view('loyalty_programs.edit', compact('loyaltyProgram', 'customers'));
    }

    public function update(Request $request, LoyaltyProgram $loyaltyProgram)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'points' => 'required|integer',
        ]);

        $loyaltyProgram->update($validatedData);

        return redirect()->route('loyalty_programs.index')->with('success', 'Loyalty program updated successfully.');
    }

    public function destroy(LoyaltyProgram $loyaltyProgram)
    {
        $loyaltyProgram->delete();

        return redirect()->route('loyalty_programs.index')->with('success', 'Loyalty program deleted successfully.');
    }
}
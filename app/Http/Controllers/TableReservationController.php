<?php

namespace App\Http\Controllers;

use App\Models\TableReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TableReservationController extends Controller
{
    public function index()
    {
        $reservations = TableReservation::where('user_id', Auth::id())->get();
        return view('table_reservations.index', compact('reservations'));
    }

    public function create()
    {
        return view('table_reservations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'phone_number' => 'required',
            'table_number' => 'required|integer|min:1|max:10',
        ]);

        TableReservation::create([
            'user_id' => Auth::id(),
            'date' => $request->date,
            'time' => $request->time,
            'phone_number' => $request->phone_number,
            'table_number' => $request->table_number,
        ]);

        return redirect()->route('table_reservations.index')->with('success', 'Reservation created successfully.');
    }

    public function edit(TableReservation $tableReservation)
    {
        return view('table_reservations.edit', compact('tableReservation'));
    }

    public function update(Request $request, TableReservation $tableReservation)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required',
            'phone_number' => 'required',
            'table_number' => 'required|integer|min:1|max:10',
        ]);

        $tableReservation->update([
            'date' => $request->date,
            'time' => $request->time,
            'phone_number' => $request->phone_number,
            'table_number' => $request->table_number,
        ]);

        return redirect()->route('table_reservations.index')->with('success', 'Reservation updated successfully.');
    }

    public function destroy(TableReservation $tableReservation)
    {
        $tableReservation->delete();
        return redirect()->route('table_reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}
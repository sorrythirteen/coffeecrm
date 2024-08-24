<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WorkTime;
use App\Models\Employee;

class WorkTimeController extends Controller
{
    public function index()
    {
        $workTimes = WorkTime::all();
        return view('work_times.index', compact('workTimes'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('work_times.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date',
        ]);

        WorkTime::create($validatedData);

        return redirect()->route('work_times.index')->with('success', 'Work time recorded successfully.');
    }

    public function show(WorkTime $workTime)
    {
        return view('work_times.show', compact('workTime'));
    }

    public function edit(WorkTime $workTime)
    {
        $employees = Employee::all();
        return view('work_times.edit', compact('workTime', 'employees'));
    }

    public function update(Request $request, WorkTime $workTime)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_time' => 'required|date',
            'end_time' => 'nullable|date',
        ]);

        $workTime->update($validatedData);

        return redirect()->route('work_times.index')->with('success', 'Work time updated successfully.');
    }

    public function destroy(WorkTime $workTime)
    {
        $workTime->delete();

        return redirect()->route('work_times.index')->with('success', 'Work time deleted successfully.');
    }
}
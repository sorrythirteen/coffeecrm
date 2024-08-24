<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Employee;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::with('employee')->get();
    return view('tasks.index', compact('tasks'));
}

    public function create()
    {
        $employees = Employee::all();
        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function show(Task $task)
{
    $task->load('employee'); // Загрузка связанной модели
    return view('tasks.show', compact('task'));
}
    public function edit(Task $task)
    {
        $employees = Employee::all();
        return view('tasks.edit', compact('task', 'employees'));
    }

    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required',
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
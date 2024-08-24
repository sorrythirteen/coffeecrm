<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\LoyaltyProgram;
use App\Models\Employee;
use App\Models\Task;
use App\Models\WorkTime;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCustomers = Customer::count();
        $totalInventories = Inventory::count();
        $totalLoyaltyPoints = LoyaltyProgram::sum('points');
        $totalEmployees = Employee::count();
        $totalTasks = Task::count();
        $pendingTasks = Task::where('status', 'pending')->count();
        $completedTasks = Task::where('status', 'completed')->count();
        $totalWorkHours = WorkTime::sum(DB::raw('TIMESTAMPDIFF(HOUR, start_time, end_time)'));

        $customersData = Customer::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $customersDates = $customersData->pluck('date')->toArray();
        $customersCounts = $customersData->pluck('count')->toArray();

        $inventoriesData = Inventory::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $inventoriesDates = $inventoriesData->pluck('date')->toArray();
        $inventoriesCounts = $inventoriesData->pluck('count')->toArray();

        $loyaltyProgramsData = LoyaltyProgram::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $loyaltyProgramsDates = $loyaltyProgramsData->pluck('date')->toArray();
        $loyaltyProgramsCounts = $loyaltyProgramsData->pluck('count')->toArray();

        return view('dashboard', compact(
            'totalCustomers', 'totalInventories', 'totalLoyaltyPoints', 'totalEmployees', 'totalTasks', 'pendingTasks', 'completedTasks', 'totalWorkHours',
            'customersDates', 'customersCounts', 'inventoriesDates', 'inventoriesCounts', 'loyaltyProgramsDates', 'loyaltyProgramsCounts'
        ));
    }
}
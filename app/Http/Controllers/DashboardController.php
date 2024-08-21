<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Inventory;
use App\Models\LoyaltyProgram;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
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

        return view('dashboard', compact('customersDates', 'customersCounts', 'inventoriesDates', 'inventoriesCounts', 'loyaltyProgramsDates', 'loyaltyProgramsCounts'));
    }
}
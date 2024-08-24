@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Customers</h5>
                    <p class="card-text">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Inventories</h5>
                    <p class="card-text">{{ $totalInventories }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Loyalty Points</h5>
                    <p class="card-text">{{ $totalLoyaltyPoints }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Employees</h5>
                    <p class="card-text">{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Tasks</h5>
                    <p class="card-text">{{ $totalTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Pending Tasks</h5>
                    <p class="card-text">{{ $pendingTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Completed Tasks</h5>
                    <p class="card-text">{{ $completedTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Work Hours</h5>
                    <p class="card-text">{{ $totalWorkHours }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-4">
            <canvas id="customersChart" width="400" height="200"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="inventoriesChart" width="400" height="200"></canvas>
        </div>
        <div class="col-md-4">
            <canvas id="loyaltyProgramsChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var customersCtx = document.getElementById('customersChart').getContext('2d');
        var customersChart = new Chart(customersCtx, {
            type: 'line',
            data: {
                labels: @json($customersDates),
                datasets: [{
                    label: 'Количество гостей',
                    data: @json($customersCounts),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var inventoriesCtx = document.getElementById('inventoriesChart').getContext('2d');
        var inventoriesChart = new Chart(inventoriesCtx, {
            type: 'line',
            data: {
                labels: @json($inventoriesDates),
                datasets: [{
                    label: 'Объем запасов',
                    data: @json($inventoriesCounts),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var loyaltyProgramsCtx = document.getElementById('loyaltyProgramsChart').getContext('2d');
        var loyaltyProgramsChart = new Chart(loyaltyProgramsCtx, {
            type: 'line',
            data: {
                labels: @json($loyaltyProgramsDates),
                datasets: [{
                    label: 'Количество участников программы лояльности',
                    data: @json($loyaltyProgramsCounts),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: false
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
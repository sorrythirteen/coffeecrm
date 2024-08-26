@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Доска</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего гостей</h5>
                    <p class="card-text">{{ $totalCustomers }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего запасов</h5>
                    <p class="card-text">{{ $totalInventories }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего сотрудников</h5>
                    <p class="card-text">{{ $totalEmployees }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Всего задач</h5>
                    <p class="card-text">{{ $totalTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Незавершенные задачи</h5>
                    <p class="card-text">{{ $pendingTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Завершенные задачи</h5>
                    <p class="card-text">{{ $completedTasks }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Общее количество рабочих часов</h5>
                    <p class="card-text">{{ $totalWorkHours }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-6">
            <canvas id="customersChart" width="400" height="200"></canvas>
        </div>
        <div class="col-md-6">
            <canvas id="inventoriesChart" width="400" height="200"></canvas>
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
    });
</script>
@endsection
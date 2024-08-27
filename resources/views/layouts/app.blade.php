<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .sidebar {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidebar a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            color: #f1f1f1;
        }

        .sidebar .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        .openbtn {
            font-size: 20px;
            cursor: pointer;
            background-color: #111;
            color: white;
            padding: 10px 15px;
            border: none;
        }

        .openbtn:hover {
            background-color: #444;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidebar {
                padding-top: 15px;
            }

            .sidebar a {
                font-size: 18px;
            }
        }

        .footer {
            text-align: center;
            padding: 10px;
            background-color: #f8f9fa;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    @auth
        <div id="mySidebar" class="sidebar">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i> Доска</a>
            <a href="{{ route('customers.index') }}"><i class="fas fa-users"></i> Гости</a>
            <a href="{{ route('inventories.index') }}"><i class="fas fa-box-open"></i> Запасы</a>
            <a href="{{ route('table_reservations.index') }}"><i class="fas fa-table"></i> Бронь столов</a>
            <a href="{{ route('employees.index') }}"><i class="fas fa-user-tie"></i> Сотрудники</a>
            <a href="{{ route('tasks.index') }}"><i class="fas fa-tasks"></i> Задачи</a>
            <a href="{{ route('work_times.index') }}"><i class="fas fa-clock"></i> Рабочее время</a>
            <a href="{{ route('coffee_menus.index') }}"><i class="fas fa-coffee"></i> Меню</a>
            <a href="{{ route('orders.index') }}"><i class="fas fa-shopping-cart"></i> Заказы</a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                    class="fas fa-sign-out-alt"></i> Выход</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <span class="nav-link" style="color: #818181; padding: 8px 8px 8px 32px;"><i class="fas fa-user"></i>
                Пользователь: {{ Auth::user()->name }}</span>
        </div>
    @endauth

    <div id="main">
        @auth
            <button class="openbtn" onclick="openNav()">☰</button>
        @endauth
        <div class="container mt-4">
            @yield('content')
        </div>
        <div class="footer">
            <a href="https://github.com/sorrythirteen/coffeecrm" target="_blank">GitHub: sorrythirteen</a>
        </div>
    </div>

    <script>
        function openNav() {
            document.getElementById("mySidebar").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("mySidebar").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
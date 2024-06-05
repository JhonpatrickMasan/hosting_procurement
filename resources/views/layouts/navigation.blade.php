<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .sidebar {
            background-color: #2D349A;
            color: white;
            min-height: 100vh;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }

        .sidebar a:hover {
            background-color: rgba(12, 12, 12, 0.608);
        }

        .sidebar a.active {
            background-color: rgba(12, 12, 12, 0.608);
            padding: 10px 20px;
            border-radius: 5px;
        }

        .sidebar img {
            border-radius: 50%;
        }

        .sidebar .profile {
            text-align: center;
            padding: 10px;
        }

        .content-wrapper {
            display: flex;
            min-height: 100vh;
        }

        .main-content {
            flex-grow: 1;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
</head>

<body>
    @include('layouts.header')
    <div class="content-wrapper">
        <!-- Sidebar -->
        <div class="w-1/4 sidebar">
            <div class="p-6">
                <h2 class="mb-4 text-xl font-semibold">PROCUREMENT OFFICE</h2>
                <div class="mb-4 profile">
                    <div class="mb-4 text-xl font-semibold">{{ Auth::user()->name }}</div>
                </div>
                <ul>
                    <li class="mb-2">
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('suppliers.index') }}" class="{{ request()->routeIs('suppliers.index') ? 'active' : '' }}">
                            <i class="fas fa-database"></i> Suppliers' Database
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('procurements.index') }}" class="{{ request()->routeIs('procurements.index') ? 'active' : '' }}">
                            <i class="fas fa-clipboard-list"></i> Procurement Monitoring
                        </a>
                    </li>
                    <li class="mb-2">
                        <a>
                            <i class="fas fa-bell"></i> Notifications
                        </a>
                    </li>
                </ul>
                <div class="mt-auto">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                        @csrf
                    </form>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="w-3/4 p-6 main-content">
            @yield('content')
        </div>
    </div>
    @yield('scripts')
</body>

</html>

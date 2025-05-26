<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard | SWA Air Minum')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px;
            background-color: #1A364B;
            color: white;
            overflow-y: auto;
        }

        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #244a6b;
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="d-flex">
        @include('partials.sidebar')

        <div class="flex-grow-1" style="margin-left: 200px;">
            <div class="position-fixed top-0 end-0 start-0 d-flex justify-content-between align-items-center p-3"
                style="background-color: #D9D9D9; color: #265274; z-index: 1030; margin-left: 200px;">
                <h4 style="font-weight: bold">@yield('header', 'Dashboard')</h4>
                <form action="{{ route('logout') }}" method="POST" class="mb-0">
                    @csrf
                    <button class="btn btn-primary">Logout</button>
                </form>
            </div>
            <div style="height: 68px;"></div>
            <div class="p-4">
                @yield('content')
            </div>
        </div>
    </div>
</body>

</html>

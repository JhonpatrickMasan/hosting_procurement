<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Procorement') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'figtree', sans-serif;
            background: linear-gradient(to right, #4F74BB 20%, rgba(255, 255, 255, 0) 20%), url('{{ asset('images/login.png') }}');
            background-size: 100%;
            /* Adjust the size of the background image */
            background-position: right;
            /* Position the background image */
            background-repeat: no-repeat;
            /* Prevent the background image from repeating */
        }

        .container {
            display: flex;
            justify-content: flex-start;
            /* Align the form container to the left */
            align-items: center;
            height: 100vh;
            width: 100%;
            padding-left: 20px;
            /* Add some padding to the left */
        }

        .form-container {
            width: 100%;
            max-width: 500px;
            height: 100%;
            max-height: 890px;
            background-color: rgba(255, 255, 255, 1);
            /* Solid white background */
            padding: 20px;
            margin-left: 70px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            /* Add shadow for better visibility */
        }

        .header {
            font-size: 2.0em;
            font-weight: 600;
            margin-top: 10px;
            color: #4F74BB;
            /* Match the header color with the solid color background */
            margin-left: 35px;
        }

        .button {
            background-color: #0078D4;
            /* Microsoft blue color */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            /* Center content horizontally */
        }

        .button img {
            margin-right: 10px;
        }

        .divider {
            border: none;
            height: 1px;
            background: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0));
            /* Faded gradient */
            margin: 20px 0;
            /* Add some margin */
        }

        .divider-text {
            margin: 0 10px;
            color: black;
            font-weight: bold;
            text-align: center;
        }

        .divider-row {
            display: flex;
            align-items: center;
            justify-content: center;
            /* Center the text horizontally */
        }

        .register-button {
            background-color: #0078D4;
            /* Microsoft blue color */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            width: 100%;
            text-align: center;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
    <div class="container">
        <div class="form-container">
            <div>
                <a href="/">
                    <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
            </div>
            <div class="header">
                Procurement Office
            </div>
            <div class="header">
                @if (request()->is('login'))
                    Sign In
                @elseif (request()->is('register'))
                    Sign Up
                @endif
            </div>
            <div class="px-6 py-4 mt-6">
                {{ $slot }}
                <!-- Divider Line -->
                <hr class="divider">
                <!-- Divider Row with Text -->
                <div class="divider-row">
                    <hr class="divider">
                    <span class="divider-text">Sign in with</span>
                    <hr class="divider">
                </div>

                <!-- Button to Sign in with Microsoft -->
                <a href="#" class="button">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/4/44/Microsoft_logo.svg"
                        alt="Microsoft Icon" width="24" height="24">
                    Sign in with Microsoft
                </a>
            </div>
        </div>
    </div>
</body>

</html>

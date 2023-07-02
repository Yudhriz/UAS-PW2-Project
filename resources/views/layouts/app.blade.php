<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Login - Suntronic Store')</title>

    <link rel="icon" type="image/png" href="{{ asset('home/images/icons/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('home/images/icons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('home/images/icons/favicon-32x32.png') }}">
    <link rel="manifest" href="{{ asset('home/images/icons/site.webmanifest') }}">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/styles.min.css') }}" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">

        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>

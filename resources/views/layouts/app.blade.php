<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css'])
    <title>Roman Matviy</title>
</head>

<body>

    <div id="app">
        <div class="py-4">
            @yield('content')
        </div>
    </div>
    @vite(['resources/js/app.js'])

</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">


    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased">
@inertia

    <div class="fixed h-screen w-screen inset-0 pointer-events-none">
        @for($i = 0; $i <= 30; $i++)
            {{-- rotate-0, rorate-6, rotate-12, rotate-45, rotate-90, rotate 180, scale-50, scake-75, scale-100, scale-125, scale-25 --}}
            <img src="{{ asset('img/snowflake.png') }}" class="snowflake rotate-{{ Arr::random([0, 12, 45, 90, 180]) }} scale-{{ Arr::random([25, 50, 75, 100, 125]) }} transform-gpu" />
        @endfor
    </div>
</body>
</html>

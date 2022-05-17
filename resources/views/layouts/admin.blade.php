<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('config.pageName.Admin') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/hapo_logo.png') }}" />
</head>
<body>
    <main>
        <div>
            @include('components.alerts')
        </div>
        @yield('content')
    </main>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>

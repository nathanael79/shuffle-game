<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Fidelia POS</title>
    <meta name="description" content="Neat">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" href="{{ asset('assets/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{asset('assets/favicon.ico')}}" type="image/x-icon">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/css/neat.min.css?v=1.0') }}">
</head>
<body>

<div class="o-page">
    @include('layout.sidebar')

    <main class="o-page__content">
        @include('layout.navbar')

        <div class="container">
            @yield('content')
        </div>
    </main>
</div>

<!-- Main JavaScript -->
<script src="{{ asset('assets/js/neat.min.js?v=1.0') }}"></script>
@yield('js')
</body>
</html>

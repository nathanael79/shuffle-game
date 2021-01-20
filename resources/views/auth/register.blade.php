<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shuffle Game</title>
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

<div class="o-page o-page--center">
    <div class="o-page__card">
        <div class="c-card c-card--center">
{{--            <img src="{{ asset('assets/img/fidelia-logo-no-background.png') }}" alt="Neat">--}}
{{--          <span class="c-icon c-icon--large u-mb-small">--}}
{{--           --}}
{{--          </span>--}}
            <h3 class="u-mb-medium">Insert Your Name</h3>
            <h6 class="u-mb-small">The game will start after you enter your name below:</h6>
            <form method="POST" action="{{ route('user_register_action') }}">
                @csrf
                <div class="c-field">
                    <label class="c-field__label">Name</label>
                    <input class="c-input u-mb-small" type="name" placeholder="e.g. imanuel" required name="name">
                </div>
                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Login</button>
            </form>
        </div>
    </div>
</div>

<!-- Main JavaScript -->
<script src="{{asset('js/neat.min.js?v=1.0')}}"></script>
</body>
</html>

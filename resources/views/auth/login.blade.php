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
            <h4 class="u-mb-medium">Welcome Back :)</h4>
            <form method="POST" action="{{ route('admin_auth_check') }}" style="margin-bottom: 10px;">
                @csrf
                <div class="c-field">
                    <label class="c-field__label">Email Address</label>
                    <input class="c-input u-mb-small" type="email" placeholder="e.g. imanuel@ronaldo.com" required name="email">
                </div>

                <div class="c-field">
                    <label class="c-field__label">Password</label>
                    <input class="c-input u-mb-small" type="password" placeholder="Numbers, Pharagraphs Only" required name="password">
                </div>

                <button class="c-btn c-btn--fullwidth c-btn--info" type="submit">Login</button>
            </form>
            <a class="c-btn c-btn--fullwidth c-btn--success" href="{{ route('user_register_page') }}">Let's Play</a>
        </div>
    </div>
</div>

<!-- Main JavaScript -->
<script src="{{asset('js/neat.min.js?v=1.0')}}"></script>
</body>
</html>

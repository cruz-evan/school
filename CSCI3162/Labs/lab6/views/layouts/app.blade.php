<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'RESTQL') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/vendor/semantic/semantic.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="/vendor/semantic/semantic.min.js"></script>
    <script src="/js/app.js"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>

    </script>
</head>
<body>
        <nav div class="ui large top menu">

        <!-- Branding Image -->
        <a class="header item" href="{{ url('/') }}">
            {{ config('app.name', 'RESTQL') }}
        </a>
        <a class= "item" href="{{ url('/doc') }}">Documentation</a>
        <a class= "item" href="{{ url('/connections/list') }}">Connect</a>

            <!-- Authentication Links -->
            @if (Auth::guest())
            <div class="right menu">
                <a class= "item" href="{{ url('/login') }}">Login</a>
                <a class= "ui item" href="{{ url('/register') }}">Register</a>
            </div>
            @else
            <div class="right menu">
                <a class="item" href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <a class= "item" href="{{ url('/account') }}">Account</a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </div>
            @endif
        </nav>

        @yield('content')

        @include('layouts.footer')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>

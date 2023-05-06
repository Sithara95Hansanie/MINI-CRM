<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <!-- Styles -->
        <style>
        </style>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <h1 class="main-title">
                        Welcome to CRM
                    </h1>
                    @if (Route::has('login'))
                        <a class="btn btn-primary home-btn" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endif
                </div>

            </div>
        </div>
    </body>
</html>

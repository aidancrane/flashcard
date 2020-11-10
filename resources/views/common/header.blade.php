<!doctype html>
<html lang="en">

<head>
    <title>Flashcard Club - Learn with Flashcards</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/favicon.png') }}">
            Flashcard Club
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Home</a>
                </li>
                @auth
                <li class="nav-item active">
                    <a class="nav-link" href="/dashboard">Dashboard</a>
                </li>
                @endauth
            </ul>
            @guest
            <div class="d-flex flex-column float-right flex-md-row align-items-center px-md-1">
                <nav class="my-2 my-md-0">
                    <a class="nav-link pt-2 text-white" href="/login">Login</a>
                </nav>
                <div class="col-xs-6">
                    <a type="button" href="/register" class="btn btn-outline-light">Sign Up</a>
                </div>
            </div>
            @endguest
            @auth
            <div class="d-flex flex-column float-right flex-md-row align-items-center px-md-1">
                <div class="col-xs-6">
                    {!! Form::open(['route' => 'login.logout', 'method' => 'post']) !!}
                    {!! Form::submit('Log out', ['class' => 'btn btn-outline-light']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
            @endauth
        </div>
    </nav>
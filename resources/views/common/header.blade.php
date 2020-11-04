<!doctype html>
<html lang="en">

<head>
    <title>Flashcard Club - Learn with Flashcards</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-success">
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
        </div>
    </nav>
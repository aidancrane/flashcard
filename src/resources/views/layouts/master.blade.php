<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Flashcard Club - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @stack('scripts')
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
    @section('header')
        <header>
            <nav class="navbar navbar-expand-md navbar-dark">
                <div class="container-fluid">
                    <a class="navbar-brand px-2" href="/">
                        <img src="{{ asset('images/favicon.png') }}">
                        Flashcard Club
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar"
                        aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="m-1 navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="navbar-nav me-auto mb-2 mb-md-0">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">Home</a>
                            </li>

                            <li class="nav-item active">
                                <a class="nav-link" href="/frequently-asked-questions">FAQ</a>
                            </li>

                            @auth
                                <li class="nav-item active">
                                    <a class="nav-link" href="/dashboard">Dashboard</a>
                                </li>
                            @endauth

                            @guest
                            <li class="nav-item active">
                                <a class="nav-link" href="/login">Log in</a>
                            </li>
                            @endguest

                            {{-- STOP. There are multiple sidebars! This is the sidebar for mobile devices below!
                                     STOP. To update the navbar for desktop devices you will also need to update the layouts.sidebar.blade.php --}}

                            <div class="d-lg-none d-md-none">
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="/sets">
                                            <span class="menu-text">My Flashcards</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/sets/create">
                                            <span class="menu-text">New Flashcards</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/statistics">
                                            <span class="menu-text">My Stats</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/users/{{ auth()->user()->id }}/edit">
                                            <span class="menu-text">My Account</span>
                                        </a>
                                    </li>
                                @endauth
                        </ul>
                    </div>
                    <div class="d-flex px-md-1 pt-1">
                        @guest
                            <div class="col-xs-6">
                                <a type="button" href="/register" class="btn btn-outline-light">Sign Up</a>
                            </div>
                        @endguest

                        @auth
                            <div class="d-none d-md-block ms-auto">
                                <!-- Log out button for medium devices and larger -->
                                <div class="col-xs-6">
                                    {!! Form::open(['route' => 'login.logout', 'method' => 'post']) !!}
                                    {!! Form::submit('Log out', ['class' => 'btn btn-outline-light']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>

                            <div class="d-lg-none d-md-none">
                                <!-- Log out button for small devices -->
                                <div class="col-xs-6">
                                    {!! Form::open(['route' => 'login.logout', 'method' => 'post']) !!}
                                    {!! Form::submit('Log out', ['class' => 'btn btn-outline-light']) !!}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
                </div>
            </nav>
        </header>

        </div>
        </nav>
        </header>
    @show
    @yield('content')
</body>

@section('footer')
    <footer>
        <!-- Thanks for reading. -->
    </footer>
@show

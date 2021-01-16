<html>

<head>
    <title>Flashcard Club - @yield('title')</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
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
                    <div class="d-flex px-md-1">
                        <nav class="my-2 my-md-0">
                            <a class="nav-link pt-2 text-white" href="/login">Login</a>
                        </nav>
                        <div class="col-xs-6">
                            <a type="button" href="/register" class="btn btn-outline-light">Sign Up</a>
                        </div>
                    </div>
                    @endguest
                    @auth
                    <div class="d-flex px-md-1">
                        <div class="col-xs-6">
                            {!! Form::open(['route' => 'login.logout', 'method' => 'post']) !!}
                            {!! Form::submit('Log out', ['class' => 'btn btn-outline-light']) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    @endauth
                </div>
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

</html>
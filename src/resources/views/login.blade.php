@extends('layouts.master')

@section('title', 'Login')

@section('content')
<div class="pt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col d-none d-md-block {{-- bg-danger --}} pr-3"></div>
            <div class="col-md-4 {{-- bg-primary --}} px-4 pt-5">
                <div class="card shadow">
                    <div class="card-header">
                        Login to Flashcard Club
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                            {{ $error }}
                            <br>
                            @endforeach
                        </div>
                        @else
                        <p class="card-text"><small>Please enter your account details below to login.</small></p>
                        @endif
                        <form method="POST" action="{{ route("login.check")  }}">
                            @csrf
                            @method("POST")
                            <div class="form-group">
                                <label for="email_address">Email Address</label>
                                <input class="form-control" type="text" placeholder="Email Address" name="email_address" value="{{ old("email_address") }}" id="email_address">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                            </div>
                            <div class="row mt-2 py-1 px-3">
                                <button class="btn btn-primary btn-block text-white shadow" type="submit">Sign in</button>
                                {{-- Google logo originally from https://developers.google.com/identity/branding-guidelines --}}
                                <a class="btn btn-block mt-4 shadow" style="font-family: 'Roboto';" href="/auth/google/redirect" role="button"> <img width="20px" alt="Google sign-in" src="{{ asset("/images/google.svg") }}" /> Sign in with
                                    Google</a>
                            </div>
                        </form>
                        <p class="pt-3 text-center"><small><a href="/register">Click here to register</a> if you don't have an account yet.</small></p>
                    </div>
                </div>
            </div>
            <div class="col d-none d-md-block {{-- bg-danger --}} pr-3"></div>
        </div>
    </div>
</div>
@stop

@push("scripts")
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
@endpush
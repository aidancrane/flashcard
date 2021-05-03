@extends('layouts.master')

@section('title', 'Landing Page')

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
                            <div class="row mt-2">
                                <div class="col-1">
                                    <input class="text-white btn btn-block btn-primary" type="submit" value="Sign in">
                                </div>
                                <div class="col-1">
                                </div>
                                <div class="col-3">
                                    <div class="g-signin2">
                                        <script>
                                            function onSuccess(googleUser) {
                                                console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
                                                window.location.replace("/dashboard");
                                            }

                                            function renderButton() {
                                                gapi.signin2.render('g-signin2', {
                                                    'longtitle': true,
                                                    'theme': 'dark',
                                                    'onsuccess': onSuccess,
                                                });
                                            }
                                        </script>
                                    </div>
                                </div>
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

@push('scripts')
<meta name="google-signin-client_id" content="{{ env("GOOGLE_CLIENT_ID") }}">
<script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>


@endpush
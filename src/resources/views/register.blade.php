@extends('layouts.master')

@section('title', 'Landing Page')

@section('content')
<div class="pt-2">
    <div class="container-fluid">
        <div class="row pb-4">
            <div class="col d-none d-md-block {{-- bg-danger --}} pr-3"></div>
            <div class="col-md-6 {{-- bg-primary --}} px-4 pt-5">
                <div class="card shadow">
                    <div class="card-header">
                        Register for Flashcard Club
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
                        <h4 class="card-text mb-0 pb-0">Hello! Welcome. Lets get to know you,</h4>
                        @endif

                        <div class="row pb-1 my-3 px-3">
                            {{-- Google logo originally from https://developers.google.com/identity/branding-guidelines --}}
                            <a class="btn btn-block shadow" style="font-family: 'Roboto';" href="/auth/google/redirect" role="button"> <img width="20px" alt="Google sign-in" src="{{ asset("/images/google.svg") }}" /> Sign in with
                                Google</a>
                        </div>
                        <hr>
                        <h4>Don't use socials? No problem,</h4>
                        <form method="POST" action="/register" accept-charset="UTF-8">
                            @csrf
                            <div class="row">
                                <div class="col form-group">
                                    <label for="first_name">What is your first name?</label>
                                    <input class="form-control" type="text" placeholder="First Name" value="{{ old("first_name") }}" name="first_name" id="first_name">
                                </div>
                                <div class="col form-group">
                                    <label for="last_name">What is your last name?</label>
                                    <input class="form-control" type="text" placeholder="First Name" value="{{ old("last_name") }}" name="last_name" id="last_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="friendly_name">How should we refer to you?</label>
                                <input class="form-control" type="text" placeholder="Nickname" value="{{ old("friendly_name") }}" name="friendly_name" id="friendly_name">
                            </div>
                            <div class="form-group">
                                <label for="username">What username would you like?</label>
                                <input class="form-control" type="text" placeholder="Username" value="{{ old("username") }}" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label for="email_address">What is your email address?</label>
                                <input class="form-control" type="email" placeholder="Email Address" value="{{ old("email_address") }}" name="email_address" id="email_address">
                            </div>
                            <div class="form-group">
                                <label for="password">What would you like your password to be?</label>
                                <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                            </div>
                            <div class="form-group">
                                <label for="password1">Could you repeat your password please,</label>
                                <input class="form-control" type="password" placeholder="Password" name="password1" id="password1">
                            </div>
                            <div class="form-group">
                                <label for="tos_accepted">I have read and agree to the terms of service and privacy policy.</label>
                                <br>
                                <input name="tos_accepted" type="checkbox" value="1" id="tos_accepted" required>
                            </div>
                            <input class="text-white btn btn-block btn-primary mt-3" type="submit" value="Join Us">
                        </form>
                        <p class="pt-3 text-center mb-0"><small>To read about our <a href="/pages/application-terms-of-service">terms of service<a> and <a href="/pages/privacy-policy">privacy policy</a> click here.</small></p>
                        <p class="text-center pt-0"><small>Made with ❤️ by Aidan.</small></p>
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
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
                        <p class="card-text">Hello! Welcome. Lets get to know you,</p>
                        @endif

                        {!! Form::open(['route' => 'register.second']) !!}
                        <div class="row">
                            <div class="col form-group">
                                {!! Form::label('first_name', 'What is your first name?'); !!}
                                {!! Form::text('first_name', null ,['class' => 'form-control', 'type' => 'text', 'placeholder' => 'First Name']) !!}
                            </div>
                            <div class="col form-group">
                                {!! Form::label('last_name', 'What is your last name?'); !!}
                                {!! Form::text('last_name', null ,['class' => 'form-control', 'type' => 'text', 'placeholder' => 'First Name']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('friendly_name', 'How should we refer to you?'); !!}
                            {!! Form::text('friendly_name', null ,['class' => 'form-control', 'type' => 'text', 'placeholder' => 'Nickname']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('username', 'What username would you like?'); !!}
                            {!! Form::text('username', null ,['class' => 'form-control', 'type' => 'text', 'placeholder' => 'Username']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('email_address', 'What is your email address?'); !!}
                            {!! Form::email('email_address', null ,['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email Address']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'What would you like your password to be?'); !!}
                            {!! Form::password('password' ,['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Password']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password1', 'Could you repeat your password please,'); !!}
                            {!! Form::password('password1' ,['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Password']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('tos_accepted', 'I have read and agree to the terms of service and privacy policy.'); !!}
                            <br>
                            {!! Form::checkbox('tos_accepted'); !!}
                        </div>
                        {!! Form::submit('Join Us', ['class' => 'btn btn-block btn-primary mt-3']) !!}
                        {!! Form::close() !!}
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
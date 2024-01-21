@extends('layouts.master')

@section('title', 'Authentication Error')

@section('content')
<div class="container pt-4">
    <div class="card shadow">
        <div class="card-header">
            Authentication Error
        </div>
        <div class="card-body">
            <h3>Unable to Authenticate</h3>
            User who logged in has already logged in with a different account or provided account's email is not verified.
        </div>

    </div>


</div>
@stop
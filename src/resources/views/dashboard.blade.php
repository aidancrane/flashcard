@extends('layouts.sidebar-study')

@section('title', 'Dashboard')

@section('right-panel')
<main role="main">
    <div class="card">
        <div class="card-body">
            Hello and welcome {{ auth()->user()->friendly_name }} <span class="mdi mdi-access-point-check"></span>.
        </div>
    </div>
</main>
@stop
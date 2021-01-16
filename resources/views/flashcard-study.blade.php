@extends('layouts.sidebar-study')

@section('title', 'Dashboard')

@section('right-panel')
<main role="main">
    <div class="card">
        <div class="card-body">
            Welcome to Study mode {{ auth()->user()->friendly_name }}. Please choose a study mode.
        </div>
    </div>
</main>
@stop
@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
@parent
<div class="container-fluid pt-4">
    <div class="row">
        @include('layouts.sidebar')
        <div class="col-md-10 px-4">
            @yield('right-panel', 'Default Content')
        </div>
    </div>
</div>
@stop
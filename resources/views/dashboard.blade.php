@extends('common.header')
<div class="container-fluid pt-4">
    <div class="row">
        @include('menu.left-dashboard-panel')
        <div class="col-md-10 px-4">
            <main role="main">
                <div class="card">
                    <div class="card-body">
                        Hello and welcome {{ auth()->user()->friendly_name }} <span class="mdi mdi-access-point-check"></span>.
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@extends('common.footer')
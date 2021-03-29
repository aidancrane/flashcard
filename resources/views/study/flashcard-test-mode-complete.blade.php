@extends('layouts.sidebar-study')

@section('title', 'Test Mode End')

@section('right-panel')
<main role="main">

    <div class="card">
        <div class="card-body" style="user-select:none;">
            <h3>Well Done, you finished <code>{{ $set->set_title }}</code>.</h3>
            <hr>
            <p class="lead">Take a break, you've earned it.</p>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            You got {{ $testResult->correct_answers }} cards correct.
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            You got {{ $testResult->incorrect_answers }} cards incorrect.
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body">
                            You skipped {{ $testResult->skipped_questions }} cards.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
@extends('layouts.sidebar-study')

@section('title', 'Test Mode End')

@section('right-panel')
<main role="main">

    <div class="card">
        <div class="card-body" style="user-select:none;">
            <h3>Well Done, you finished <code>{{ $set->set_title }}</code>.</h3>
            <hr>
            <p class="lead text-center">Take a break, you've earned it.</p>

            Are you cramming? Use the button below to jump back in,

            <div class="row">
                <div class="col">
                    <div class="card mt-2">
                        <div id="test-mode" class="card-body text-center">
                            <h1><span class="mdi mdi-notebook-check-outline"></span></h1>
                            Start Again
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    $("#test-mode").click(function(event) {
                        window.location.replace("{{ route('study.test-mode', $set) }}");
                    });
                });
            </script>

            <div class="row">
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body text-center">
                            <h1><span class="mdi mdi-check"></span></h1>
                            You got {{ $testResult->correct_answers }} cards correct.
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body text-center">
                            <h1><span class="mdi mdi-close"></span></h1>
                            You got {{ $testResult->incorrect_answers }} cards incorrect.
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body text-center">
                            <h1><span class="mdi mdi-card-plus-outline"></span></h1>
                            You skipped {{ $testResult->skipped_questions }} cards.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop
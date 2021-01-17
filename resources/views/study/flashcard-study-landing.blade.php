@extends('layouts.sidebar-study')

@section('title', 'Dashboard')

@section('right-panel')
<main role="main">
    <div class="card">
        <div class="card-body">
            Welcome to Study mode {{ auth()->user()->friendly_name }}.
            <div class="row">
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body" id="study-mode">
                            <div class="text-center">
                                <h1><span class="mdi mdi-notebook-check-outline"></span></h1>
                                Study Mode
                                <div class="text-small text-muted">
                                    Go your own pace.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body" id="test-mode">
                            <div class="text-center">
                                <h1><span class="mdi mdi-chart-box"></span></h1>
                                Test Mode
                                <div class="text-small text-muted">
                                    A timed, scored and iterative approach to cramming.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="card mt-2">
                        <div class="card-body" id="presentation-mode">
                            <div class="text-center">
                                <h1><span class="mdi mdi-presentation"></span></h1>
                                Presenter Mode
                                <div class="text-small text-muted">
                                    Go Fullscreen.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@stop


@push('scripts')
<script>
    $(document).ready(function() {
        $("#study-mode").click(function(event) {
            window.location.replace("{{ route('study.study-mode', $set) }}");
        });
    });
</script>
@endpush
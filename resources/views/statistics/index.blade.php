@extends('layouts.sidebar-study')

@section('title', 'Statistics')

@section('right-panel')
<main role="main">
    <div class="card">
        <div class="card-body">
            <div id="chart" style="height: 300px;"></div>

            <script>
                const chart = new Chartisan({
                    el: '#chart',
                    url: "@chart('flashcard_chart', ['user_id' => auth()->user()->id])",
                    hooks: new ChartisanHooks()
                        .colors(['#38c172', '#DC143C', '#4299E1', '#EAEAEA'])
                        .datasets(['bar', 'bar', 'bar', {
                            type: 'line',
                            fill: false
                        }])
                        .beginAtZero(),
                });
            </script>
        </div>
    </div>
</main>
@stop

@push('scripts')
<script src="{{ asset('js/charts.js') }}"></script>
@endpush
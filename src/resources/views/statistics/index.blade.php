@extends('layouts.sidebar-study')

@section('title', 'Statistics')

@section('right-panel')
<main role="main">
    <div class="card">
        <div class="card-body">
            {!! $chart->container() !!}


           {{-- <div id="chart" style="height: 300px;"></div>
             <script>
                const chart = new Chart({
                    el: '#chart',
                    url: "@chart('flashcard_chart', ['user_id' => auth()->user()->id])",
                    hooks: new ChartHooks()
                        .colors(['#38c172', '#DC143C', '#4299E1', '#EAEAEA'])
                        .datasets(['bar', 'bar', 'bar', {
                            type: 'line',
                            fill: false
                        }])
                        .beginAtZero(),
                });
            </script>
        </div> --}}
    </div>
</main>
{{-- <script src="{{ asset('js/charts.js') }}"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
{!! $chart->script() !!}
@stop

@push('scripts')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script> --}}
@endpush
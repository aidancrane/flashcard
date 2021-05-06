@extends('layouts.master')

@section('title', 'Landing Page')

@section('content')
<div class="h-100">

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <h1 class="text-center text-white mt-5 pb-5">Flashcard Club</h1>
                <div class="container pb-5">
                    <div class="row">
                        <div class="col text-center text-white">
                            <span class="mdi mdi-book-open-page-variant-outline mdi-48px"></span>
                            <h3>Unlimited Cards</h3>
                            Unlimited cards and sets for all.
                        </div>
                        <div class="col text-center text-white">
                            <span class="mdi mdi-table-arrow-right mdi-48px"></span>
                            <h3>Exportable</h3>
                            Export your flashcards to spreadsheet
                        </div>
                    </div>
                    <div class="row pt-3">
                        <div class="col text-center text-white">
                            <span class="mdi mdi-lead-pencil mdi-48px"></span>
                            <h3>Simple Editor</h3>
                            Use our editor to make changes, include images and more.
                        </div>
                        <div class="col text-center text-white">
                            <span class="mdi mdi-chart-box-outline mdi-48px"></span>
                            <h3>Study Statistics</h3>
                            View and track performance as you cram.
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm text-center">
                <main role="main">

                    <div class="card">
                        <div class="card-body" style="user-select:none;">
                            <div class="card py-5" id="page_first_card" style="--animate-duration:0.1s;">
                                <div class="card-body py-5" id="page_first_card_body">
                                    <center class="ugc-center ">
                                        {{-- <h1 class="pt-5 pb-5" style="white-space: nowrap;">Simple Tap-to-Flip Flashcards</h1> --}}
                                        <h1 class="pt-5 pb-5">Simple <span style="white-space: nowrap;">Tap-to-Flip</span> Flashcards</h1>
                                    </center>
                                </div>
                            </div>
                            <div class="pt-2">
                                <span class="ps-2" id="progress_ticker">5</span> of 20
                                <div class="progress">
                                    <div class="progress-bar bg-success" id="progress_bar_success" role="progressbar" style="width: 25%"></div>
                                    <div class="progress-bar bg-danger" id="progress_bar_fail" role="progressbar" style="width: 5%"></div>
                                </div>
                            </div>
                            <div class="container pt-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <div class="container">
                                                <div class="row row-cols-2">
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="cross_button"><span class="mdi mdi-close mdi-24px"></span></div>
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="tick_button"><span class="mdi mdi-check mdi-24px"></span></div>
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="left_button"><span class="mdi mdi-arrow-left mdi-24px"></span></div>
                                                    <div class="col border rounded p-2" style="background-color: #A9A9A9;" id="right_button"><span class="mdi mdi-arrow-right mdi-24px"></span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <div class="text-center">
        <a class="btn btn-success btn-lg text-white" href="/login" role="button">Get Started</a>
    </div>
    <svg viewBox="0 0 1440 124">
        <path fill="#8ed1fcff"
          d="M 0,124 V 74 C 55,102 110,131 159,104 207,76 250,-6 301,0 351,6 409,101 467,114 c 57,12 115,-57 176,-68 60,-12 124,36 178,56 53,19 97,12 147,-12 49,-25 106,-67 166,-67 59,-1 122,39 174,55 51,15 91,5 132,-4 l 0,50 z" />
    </svg>
    <div style="background-color: #8ed1fcff;">
        <div class="container-fluid pt-4 px-5 pb-2">

            <main role="main">

                <div class="card mb-3">
                    <div class="card-body">
                        <h1 class="text-center pt-5">Hold All the Cards!</h1>
                        <div class="container pb-5">
                            <div class="row">
                                <div class="col text-center">
                                    <span class="mdi mdi-meditation mdi-48px"></span>
                                    <h3>Practice Makes Perfect</h3>
                                    Learn through repetition.
                                </div>
                                <div class="col text-center">
                                    <span class="mdi mdi-notebook-edit-outline mdi-48px"></span>
                                    <h3>Organize your Thoughts</h3>
                                    Improve recall through tabulation
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col text-center">
                                    <span class="mdi mdi-matrix mdi-48px"></span>
                                    <h3>Iterative Improvement</h3>
                                    Improve cramming performance through eliminiation
                                </div>
                                <div class="col text-center">
                                    <span class="mdi mdi-medal mdi-48px"></span>
                                    <h3>Test for Success</h3>
                                    Study and improve for long term results
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <svg viewBox="0 0 1440 155">
        <path d="M 1440,0 V 73 C 1363,35 1285,-4 1213,7 1142,19 1078,82 1011,84 945,87 878,28 804,9 731,-9 652,12 580,31 509,51 444,67 392,101 341,136 295.26396,155.93853 232.26396,153.93853 170.26396,152.93853 90,129 0,73 V 0 Z" fill="#8ed1fcff">
        </path>
    </svg>
</div>
@stop
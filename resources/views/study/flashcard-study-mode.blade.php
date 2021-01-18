@extends('layouts.sidebar-study')

@section('title', 'Study Mode')

@section('right-panel')
<main role="main">
    <div class="flashcard-contents d-none">
        @forelse ($set->flashcards()->orderBy('flashcard_order')->get() as $flashcard)
        <div data-flashcard-id="{{ $flashcard->id }}" data-flashcard-order="{{ $flashcard->flashcard_order }}" class="flashcard text-white">
            <div id="front_text">
                {{ $flashcard->front_text }}
            </div>
            <div id="back_text">
                {{ $flashcard->back_text }}
            </div>
        </div>
        @empty
        <div class="card">
            <div class="card-body user-generated-no-overflow">
                This set doesn't have any flashcards!
            </div>
        </div>
        @endforelse
    </div>

    <div class="card">
        <div class="card-body user-generated-no-overflow">
            <div class="card">
                <div class="card-body user-generated-no-overflow" id="page_first_card">
                    <div class="text-center">
                        Flashcard Contents go here.
                    </div>
                </div>
            </div>
            <div class="pt-2">
                <span class="ps-2" id="progress_ticker">0</span> of {{ count($set->flashcards()->get()) }}
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                </div>
            </div>
            <div class="container pt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col border rounded p-2"><span class="mdi mdi-arrow-left mdi-24px"></span></div>
                                    <div class="col border rounded p-2"><span class="mdi mdi-arrow-right mdi-24px"></span></div>
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
<script src="{{ asset('js/flashcard-viewer.js') }}"></script>
@endpush
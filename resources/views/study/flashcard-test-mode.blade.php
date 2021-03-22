@extends('layouts.sidebar-study')

@section('title', 'Test Mode')

@section('right-panel')
<main role="main">
    <div class="flashcard-contents d-none">
        @forelse ($set->flashcards()->orderBy('flashcard_order')->get() as $flashcard)
        <div data-flashcard-id="{{ $flashcard->id }}" data-flashcard-order="{{ $flashcard->flashcard_order }}" class="flashcard text-white">
            <div class="front_text">
                {{ $flashcard->front_text }}
            </div>
            <div class="back_text">
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
        <div class="card-body user-generated-no-overflow" style="user-select:none;">
            <div class="card animate__animated animate__flipInX" id="page_first_card">
                <div class="card-body user-generated-no-overflow" id="page_first_card_body">
                    <div class="text-center">
                        This set doesn't have any flashcards, or you don't have javascript enabled.
                    </div>
                </div>
            </div>
            <div class="pt-2">
                <span class="ps-2" id="progress_ticker">1</span> of {{ count($set->flashcards()->get()) }}
                <div class="progress">
                    <div class="progress-bar" role="progressbar" id="progress_bar" style="width: {{ (count($set->flashcards()->get()) == 0 ? 0 : 1 / count($set->flashcards()->get()) * 100) }}%"></div>
                </div>
            </div>
            <div class="container pt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="container">
                                <div class="row row-cols-2">
                                    <div class="col border rounded p-2 bg-danger" id="cross_button"><span class="mdi mdi-close mdi-24px"></span></div>
                                    <div class="col border rounded p-2 bg-success" id="tick_button"><span class="mdi mdi-check mdi-24px"></span></div>
                                    <div class="col border rounded p-2" id="left_button"><span class="mdi mdi-arrow-left mdi-24px"></span></div>
                                    <div class="col border rounded p-2" id="right_button"><span class="mdi mdi-arrow-right mdi-24px"></span></div>
                                </div>
                                <div class="text-center pt-1">timer</div>
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
<script src="{{ asset('js/study-mode-viewer.js') }}"></script>
<script src="{{ asset('js/test-mode-viewer.js') }}"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" />
@endpush
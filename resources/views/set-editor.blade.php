@extends('layouts.sidebar-study')

@section('title', 'Dashboard')

@section('right-panel')
<main role="main">
    <div class="card">
        <div class="card-body">
            <input type="hidden" class="set-id" value="{{ $set->id }}">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="d-flex pt-2">
                        <div class="flex-fill justify-content-start">
                            <h1 id="change-name-h1" class="set-title-h1">{{ $set->set_title }}</h1>
                            <div hidden id="change-name-div" class="pe-2 py-1">
                                <input id="change-name-input" maxlength="200" class="form-control">
                            </div>
                        </div>

                        <div class="justify-content-end">
                            <button type="button" id="change-name-button" class="btn btn-outline-info btn-sm set-title py-1">Change name</button>
                        </div>
                    </div>


                    <div class="d-flex">
                        <div class="flex-fill justify-content-start">
                            <div class="text-muted">
                                @if($set->set_description == "")
                                    <small id="flashcard-description">This flashcard set doesn't have a description yet.</small>
                                    @else
                                    <small id="flashcard-description">{{ $set->set_description }}</small>
                                    @endif
                                    <div hidden id="change-description-div" class="pe-2 py-1">
                                        <input id="change-description-input" maxlength="200" minlength="5" rows="5" class="form-control">
                                    </div>
                            </div>
                        </div>

                        <div class="justify-content-end">
                            <button type="button" class="btn btn-outline-info btn-sm" id="change-description">
                                {{-- Change Description Button --}}
                                @if($set->set_description == "")
                                    Add one
                                    @else
                                    Change
                                    @endif</button>
                        </div>
                    </div>


                    <div class="d-flex pt-2">
                        <div class="flex-fill justify-content-start">
                            <div class="text-muted">
                                @if($set->category == "")
                                    <small id="flashcard-categories">This flashcard set doesn't have a category yet.</small>
                                    @else
                                    <small id="flashcard-categories">{{ $set->category }}</small>
                                    @endif
                                    <div hidden id="change-categories-div" class="pe-2 py-1">
                                        <input id="change-categories-input" maxlength="200" minlength="5" rows="5" class="form-control">
                                    </div>
                            </div>
                        </div>

                        <div class="justify-content-end">
                            <button type="button" class="btn btn-outline-info btn-sm" id="change-categories">
                                {{-- Change Description Button --}}
                                @if($set->set_description == "")
                                    Add one
                                    @else
                                    Change
                                    @endif</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="mt-2 px-3" id="set-editors">
            <div class="flashcard-container" id="flashcard-1-container">
                <hr>
                <h3>Flashcard 1 - Front</h3>
                <textarea class="easy-markdown-editor-needed flashcard-front" max="300" id="flashcard-1-front" name="flashcard-1-front"></textarea>
                <h3>Flashcard 1 - Back</h3>
                <textarea class="easy-markdown-editor-needed flashcard-back" max="300" id="flashcard-1-back" name="flashcard-1-back"></textarea>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-outline-info btn-sm py-1 flashcard-remove-button" id="1">Remove Flashcard 1</button>
                </div>
            </div>
        </div>


        <div class="px-2 py-2">
            <div class="card mt-2">
                <div class="card-body" id="new-flashcard">
                    <div class="text-center">
                        <h1><span class="mdi mdi-card-plus-outline"></span></h1>
                        Add a flashcard
                    </div>
                    <div class="text-end">
                        FLASHCARD COUNT
                    </div>
                </div>
            </div>
        </div>
</main>
@stop

@section('footer')
<!-- Response toasts -->
<div class="position-absolute te-notification not-clickable">
    <div class="toast-container not-clickable">
        <div class="toast not-clickable" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="{{ asset('images/favicon.png') }}" width="10px" height="10px" class="rounded me-2" alt="...">
                <strong class="me-auto">Flashcard Club</strong>
                <small class="text-muted">now</small>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button> --}}
            </div>
            <div class="toast-body">
                Toast Notification
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('js/set-editor-metadata.js') }}"></script>
<script src="{{ asset('js/set-editor-flashcard-manager.js') }}"></script>
@endpush
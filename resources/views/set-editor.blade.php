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
                                <input id="change-name-input" class="form-control">
                            </div>
                        </div>

                        <div class="justify-content-end">
                            <button type="button" id="change-name-button" class="btn btn-outline-info btn-sm set-title py-1">Change name</button>
                        </div>
                    </div>
                    @if($set->set_description == "")
                        <div class="d-flex">
                            <div class="flex-fill justify-content-start">
                                <div class="text-muted">
                                    <small>This flashcard set doesn't have a description yet.</small>
                                </div>
                            </div>

                            <div class="justify-content-end">
                                <button type="button" class="btn btn-outline-info btn-sm editor-add-description">Add one</button>
                            </div>
                        </div>
                        @else
                        {{ $set->set_description }}
                        @endif
                        @if($set->category == "")
                            <div class="d-flex pt-2">
                                <div class="flex-fill justify-content-start">
                                    <div class="text-muted">
                                        <small>This flashcard set doesn't have a category yet.</small>
                                    </div>
                                </div>

                                <div class="justify-content-end">
                                    <button type="button" class="btn btn-outline-info btn-sm">Add one</button>
                                </div>
                            </div>
                            @else
                            {{ $set->category }}
                            @endif
                </div>
            </div>

            <div class="card mt-2">
                <div class="card-body">
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
<script src="{{ asset('js/set-editor.js') }}"></script>
@endpush
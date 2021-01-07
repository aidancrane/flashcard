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

            <div class="mt-2">
                <hr>
                <div class="row">
                    <div class="col-md">
                        <div class="p-2 pe-1">
                            <div class="card py-4">
                                FLASHCARD FRONT
                                <textarea></textarea>
                                <script>
                                    var easymde = new EasyMDE({
                                        // autofocus: true,
                                        autoDownloadFontAwesome: false,
                                        showIcons: ["bold", "italic", "|"],
                                        toolbar: [{
                                                name: "bold",
                                                action: EasyMDE.toggleBold,
                                                className: "mdi mdi-18px mdi-format-bold",
                                                title: "Bold",
                                            },
                                            {
                                                name: "italic",
                                                action: EasyMDE.toggleItalic,
                                                className: "mdi mdi-18px mdi-format-italic",
                                                title: "Italic",
                                            },

                                            {
                                                name: "heading-smaller",
                                                action: EasyMDE.toggleHeadingSmaller,
                                                className: "mdi mdi-18px mdi-format-header-decrease",
                                                title: "Smaller Heading",
                                            },
                                            {
                                                name: "heading-bigger",
                                                action: EasyMDE.toggleHeadingBigger,
                                                className: "mdi mdi-18px mdi-format-header-increase",
                                                title: "Bigger Heading",
                                            },
                                            "|",
                                            {
                                                name: "horizontal-rule",
                                                action: EasyMDE.drawHorizontalRule,
                                                className: "mdi mdi-18px mdi-minus",
                                                title: "Insert Horizontal Line",
                                            },
                                            {
                                                name: "quote",
                                                action: EasyMDE.toggleBlockquote,
                                                className: "mdi mdi-18px mdi-format-quote-open",
                                                title: "Quote",
                                            },
                                            {
                                                name: "unordered-list",
                                                action: EasyMDE.toggleUnorderedList,
                                                className: "mdi mdi-18px mdi-format-list-bulleted",
                                                title: "Generic List",
                                            },
                                            {
                                                name: "ordered-list",
                                                action: EasyMDE.toggleOrderedList,
                                                className: "mdi mdi-18px mdi-format-list-numbered",
                                                title: "Numbered List",
                                            },
                                            {
                                                name: "table",
                                                action: EasyMDE.drawTable,
                                                className: "mdi mdi-18px mdi-table",
                                                title: "Insert Table",
                                            },
                                            "|",
                                            {
                                                name: "link",
                                                action: EasyMDE.drawLink,
                                                className: "mdi mdi-18px mdi-link",
                                                title: "Create Link",
                                            },
                                            {
                                                name: "image",
                                                action: EasyMDE.drawImage,
                                                className: "mdi mdi-18px mdi-image-area",
                                                title: "Insert Image",
                                            },
                                            {
                                                name: "preview",
                                                action: EasyMDE.togglePreview,
                                                noDisable: true,
                                                className: "mdi mdi-18px mdi-eye-outline",
                                                title: "Toggle Preview",
                                            },
                                        ],
                                    });
                                    easymde.value("This text will appear in the editor\n\n ![Dog Running](https://s3.amazonaws.com/cdn-origin-etr.akc.org/wp-content/uploads/2017/11/22170353/German-Shepherd-Dog-running.jpg)");
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="p-2 ps-1">
                        <div class="card py-4">
                            <div class="text-center">
                                FLASHCARD BACK
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
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
<script src="{{ asset('js/set-editor-metadata.js') }}"></script>
<script src="{{ asset('js/set-editor-flashcard-manager.js') }}"></script>
@endpush
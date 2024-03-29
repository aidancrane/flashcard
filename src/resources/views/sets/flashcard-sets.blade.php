@extends('layouts.sidebar-study')

@section('title', 'Dashboard')

@section('right-panel')
    <main role="main">
        <div class="card">
            <div class="card-body">
                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif
                <table class="set-table table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Flashcards</th>
                            <th>Creation Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
                <script>
                    window.addEventListener("load", function() {
                        $(function() {
                            var table = $('.set-table').DataTable({
                                processing: true,
                                serverSide: true,
                                responsive: true,
                                ajax: '{{ route('sets.datatable-index') }}',
                                order: [0, 'desc'],
                                language: {
                                    "emptyTable": "You don't have any flashcards yet!"
                                },
                                columns: [{
                                        data: 'id',
                                        name: 'set.id',
                                        width: '5%',
                                    },
                                    {
                                        data: 'set_title',
                                        name: 'set.set_title',
                                        width: '50%',
                                        render: function(data, type, row) {

                                            let renderedResponse = "";

                                            if (row.set_title != "") {
                                                renderedResponse += row.set_title;
                                            } else {
                                                renderedResponse += "No Title";
                                            }

                                            if (row.set_description != "") {
                                                renderedResponse += ' <small class="text-muted">' + row
                                                    .set_description + '</small>';
                                            }
                                            if (row.category != "") {
                                                renderedResponse +=
                                                    ' <span class="rounded text-white ps-1 pe-1" style=\"background-color: #007bff; font-size: small\">' +
                                                    row.category + '</span>';
                                            }
                                            return renderedResponse;
                                        },
                                    },
                                    {
                                        data: 'flashcard_count',
                                        name: 'flashcard_count',
                                        width: '5%',
                                        searchable: false,
                                        sortable: false,
                                    },
                                    {
                                        data: 'creation_date',
                                        name: 'set.creation_date',
                                    },
                                    {
                                        data: null,
                                        render: function(data, type, row) {

                                            return `<div class="btn-group" role="group">
                                                    <a
                                                        type="button"
                                                        href="{{ route('sets.index') }}/` + row.id + `/"
                                                        class="btn btn-sm btn-primary text-white">
                                                        Study
                                                    </a>
                                                    <a
                                                        type="button"
                                                        href="{{ route('sets.index') }}/` + row.id + `/edit"
                                                        class="btn btn-sm btn-primary text-white">
                                                        Edit
                                                    </a>
                                                    <a
                                                        type="button"
                                                        href="{{ route('sets.index') }}/` + row.id + `/export"
                                                        class="btn btn-sm btn-primary text-white">
                                                        Export
                                                    </a>
                                                    <button
                                                        type="button"
                                                        class="btn btn-sm btn-danger text-white"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteSetModal"
                                                        data-bs-id="` + row.id + `" 
                                                        data-bs-title="` + row.set_title + `">
                                                        Delete
                                                    </button>
                                                </div>
                                            `;

                                        },
                                        searchable: false,
                                        sortable: false,
                                    }
                                ],
                            });
                        });
                    });
                </script>
            </div>
        </div>
    </main>

    <div class="modal fade" id="deleteSetModal" tabindex="-1" aria-labelledby="deleteSetModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSetModalLabel">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    You will not be able to recover deleted flashcard sets.

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('sets.delete-from-index') }}" method="post">
                        @csrf
                        <input type="hidden" class="form-control" id="set-delete-id" name="set-delete-id">
                        <button type="submit" class="btn btn-danger text-white">Delete Set</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var deleteModal = document.getElementById('deleteSetModal')
        deleteModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;

            // Each flashcard set has an id and a title available.
            var delete_target_id = button.getAttribute('data-bs-id');
            var delete_target_name = button.getAttribute('data-bs-title');

            // Update the flashcard delete modal to reflect the correct flashcard form id for deletion.
            var modalTitle = deleteModal.querySelector('.modal-title');
            var modalBodyInput = deleteModal.querySelector('.modal-footer #set-delete-id');

            modalTitle.textContent = delete_target_name;
            modalBodyInput.value = delete_target_id;
        })
    </script>
@stop

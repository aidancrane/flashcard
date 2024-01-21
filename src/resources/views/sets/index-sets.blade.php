@extends('layouts.sidebar-study')

@section('title', 'Dashboard')

@section('right-panel')
    <main role="main">


        <div class="card">
            <div class="card-body">

                <h1 class="card-title">
                    {{ auth()->user()->friendly_name }}'s Flashcards
                </h1>

                @if (Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                @endif

                @if ($sets->isEmpty())
                <p class="p-5">No flashcard sets found. Start creating your sets now!</p>
                @else

                <div class="table-responsive">
                    <table class="set-table table table-bordered">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Flashcards</th>
                                <th>Creation Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sets as $set)
                                <tr>
                                    {{-- <td>{{ $set->id }}</td> --}}
                                    <td>
                                        @if ($set->set_title != '')
                                            {{ $set->set_title }}
                                        @else
                                            No Title
                                        @endif
                                        @if ($set->set_description != '')
                                            <small class="text-muted">{{ $set->set_description }}</small>
                                        @endif
                                        @if ($set->category != '')
                                            <span class="rounded text-white ps-1 pe-1"
                                                style="background-color: #007bff; font-size: small">{{ $set->category }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $set->flashcards->count() }}</td>
                                    <td>{{ $set->creation_date }}</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('sets.show', $set->id) }}"
                                                class="btn btn-sm btn-primary text-white">Study</a>
                                            <a href="{{ route('sets.edit', $set->id) }}"
                                                class="btn btn-sm btn-primary text-white">Edit</a>
                                            <a href="{{ route('sets.export', $set->id) }}"
                                                class="btn btn-sm btn-primary text-white">Export</a>
                                            <button type="button" class="btn btn-sm btn-danger text-white"
                                                data-bs-toggle="modal" data-bs-target="#deleteSetModal"
                                                data-bs-id="{{ $set->id }}"
                                                data-bs-title="{{ $set->set_title }}">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

               


                <!-- Pagination links -->
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        Showing {{ $sets->firstItem() }} to {{ $sets->lastItem() }} of {{ $sets->total() }} entries
                    </div>
                    <div>
                        {{ $sets->links() }}
                    </div>
                </div>

                @endif

                <!-- Modal Structure -->
                <div class="modal fade" id="deleteSetModal" tabindex="-1" aria-labelledby="deleteSetModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteSetModalLabel">Delete Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this set?</p>
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
                        var deleteModal = document.getElementById('deleteSetModal');
                        var deleteSetButton = deleteModal.querySelector('.modal-footer .btn-danger');

                        // Each flashcard set has an id and a title available.
                        var delete_target_id = button.getAttribute('data-bs-id');
                        var delete_target_name = button.getAttribute('data-bs-title');

                        // Update the flashcard delete modal to reflect the correct flashcard form id for deletion.
                        var modalTitle = deleteModal.querySelector('.modal-title');
                        var modalBodyInput = deleteModal.querySelector('.modal-footer #set-delete-id');

                        modalTitle.textContent = delete_target_name;
                        modalBodyInput.value = delete_target_id;

                        // Set focus on the "Delete Set" button
                        deleteSetButton.focus();

                        deleteModal.addEventListener('keydown', function(event) {
                            if (event.key === 'Enter') {
                                // Trigger the click event for the "Delete Set" button
                                deleteSetButton.click();
                            }
                        });
                    })
                </script>

            </div>
        </div>
    </main>
@stop

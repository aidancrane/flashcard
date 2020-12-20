@include('common.header')
<div class="container-fluid pt-4">
    <div class="row">
        @include('menu.left-dashboard-panel')
        <div class="col-md-10 px-4">
            <main role="main">
                <div class="card">
                    <div class="card-body">
                        <table class="set-table table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Set Title</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        </table>
                        <script>
                            $(function() {
                                $('.set-table').DataTable({
                                    processing: true,
                                    serverSide: true,
                                    ajax: '{{ route("sets.datatable-index") }}',
                                    columns: [{
                                            data: 'id',
                                            name: 'set.id',
                                            width: '5%',
                                        }, {
                                            data: 'set_title',
                                            name: 'set.set_title',
                                            width: '50%',
                                        }, {
                                            data: 'creation_date',
                                            name: 'set.creation_date',
                                        },
                                        {
                                            data: null,
                                            render: function(data, type, row) {
                                                return '<div class="btn-group" role="group" aria-label="Edit Flashcard sets"><button type="button" class="btn btn-sm btn-primary">Edit</button><button type="button" class="btn btn-sm btn-danger">Delete</button></div>';
                                            },
                                            searchable: false
                                        }
                                    ],
                                });
                            });
                        </script>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@include('common.footer')
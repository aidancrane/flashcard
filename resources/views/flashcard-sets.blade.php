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
                                    }, {
                                        data: 'set_title',
                                    }]
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
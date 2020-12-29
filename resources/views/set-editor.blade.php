@include('common.header')
<div class="container-fluid pt-4">
    <div class="row">
        @include('menu.left-dashboard-panel')
        <div class="col-md-10 px-4">
            <main role="main">
                <div class="card">
                    <div class="card-body">

                        <div class="card">
                            <div class="card-body">
                                <h2>{{ $set->set_title }}</h2>
                                @if($set->set_description == "")
                                    <div class="d-flex">
                                        <div class="flex-fill justify-content-start">
                                            <div class="text-muted">
                                                <small>This flashcard set doesn't have a description yet.</small>
                                            </div>
                                        </div>

                                        <div class="justify-content-end">
                                            <button type="button" class="btn btn-outline-info btn-sm">Add one</button>
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
        </div>
    </div>
</div>
@include('common.footer')
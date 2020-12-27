@include('common.header')
<div class="container-fluid pt-4">
    <div class="row">
        @include('menu.left-dashboard-panel')
        <div class="col-md-10 px-4">
            <main role="main">
                <div class="card">
                    <div class="card-body">
                        Let's get started,
                        <div class="mt-2 bg-light pt-4">
                            <div class="container">
                                @if ($errors->any())
                                <div class="alert alert-danger mb-1">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                {!! Form::open(['route' => 'sets.new-set']) !!}
                                <div class="form-group pb-2">
                                    {!! Form::label('set_title', 'What should we call your set?', ['class' => 'pb-3']); !!}
                                    {!! Form::text('set_title', '' ,['class' => 'form-control', 'placeholder' => 'History Revision']) !!}
                                </div>

                                {!! Form::submit('Create Set', ['class' => 'btn btn-block btn-primary text-white mb-3']) !!}
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@include('common.footer')
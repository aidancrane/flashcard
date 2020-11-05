@include('common.header')
<div class="pt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col d-none d-md-block {{-- bg-danger --}} pr-3"></div>
            <div class="col-md-4 {{-- bg-primary --}} px-4 pt-5">
                <div class="card shadow">
                    <div class="card-header">
                        Login to Flashcard Club
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @else
                        <p class="card-text"><small>Please enter your account details below to login.</small></p>
                        @endif

                        {!! Form::open(['route' => 'login.check']) !!}
                        <div class="form-group">
                            {!! Form::label('email', 'Email Address'); !!}
                            {!! Form::text('email', null ,['class' => 'form-control', 'type' => 'email', 'placeholder' => 'Email Address']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('password', 'Password'); !!}
                            {!! Form::password('password' ,['class' => 'form-control', 'type' => 'password', 'placeholder' => 'Password']) !!}
                        </div>
                        {!! Form::submit('Sign in', ['class' => 'btn btn-block btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            <div class="col d-none d-md-block {{-- bg-danger --}} pr-3"></div>
        </div>
    </div>
</div>
@include('common.footer')
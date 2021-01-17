@extends('layouts.sidebar-study')

@section('title', 'Account')

@section('right-panel')
<main role="main">
    <div class="card">
        <div class="card-body">
            <p class="fs-3">My Account</p>

            <form method="post" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-3">
                        <label for="first_name">First name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="First name" aria-describedby="first_name_feedback"
                        value="{{ old('first_name', $user->first_name) }}" name="first_name">
                        <div id="first_name_feedback" class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="last_name">Last name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Last name" aria-describedby="last_name_feedback"
                        value="{{ old('last_name', $user->last_name) }}" name="last_name">
                        <div id="last_name_feedback" class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="friendly_name">Friendly Name</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('friendly_name') is-invalid @enderror" id="friendly_name" placeholder="friendly_name" aria-describedby="friendly_name_feedback"
                        value="{{ old('friendly_name', $user->friendly_name) }}" name="friendly_name">
                        <div id="friendly_name_feedback" class="invalid-feedback">
                            {{ $errors->first('friendly_name') }}
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="username">Username</label>
                    </div>
                    <div class="col-md-9">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" aria-describedby="username_feedback"
                        value="{{ old('username', $user->username) }}" name="username">
                        <div id="username_feedback" class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="email_address">Email</label>
                    </div>
                    <div class="col-md-9">
                        <input type="email" class="form-control @error('email_address') is-invalid @enderror" id="email_address" placeholder="Email address" aria-describedby="email_address_feedback"
                        value="{{ old('email_address', $user->email_address) }}" name="email_address">
                        <div id="email_address_feedback" class="invalid-feedback">
                            {{ $errors->first('email_address') }}
                        </div>
                    </div>
                </div>

                <input class="btn btn-primary text-white mt-2" type="submit" value="Update Account">
            </form>

            <p class="fs-3">Update Password</p>

            <form method="post" action="{{ route('users.update-password', $user->id) }}">
                @csrf
                @method('PUT')
                {{-- Be aware the repeated password section uses a lot of the same validators as the first password, this is intentional so that they both
              have the same error indicated on them --}}

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="password">Password</label>
                    </div>
                    <div class="col-md-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="New password" aria-describedby="password_feedback"
                        value="" name="password">
                        <div id="password_password" class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-3">
                        <label for="password">Repeated Password</label>
                    </div>
                    <div class="col-md-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password1" placeholder="Repeated password" aria-describedby="password_feedback"
                        value="" name="password1">
                        <div id="password_password" class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    </div>
                </div>

                <input class="btn btn-danger text-white mt-2" type="submit" value="Update Password">

            </form>

        </div>
    </div>
</main>
@stop
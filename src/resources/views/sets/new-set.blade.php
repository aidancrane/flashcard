@extends('layouts.sidebar-study')

@section('title', 'Dashboard')

@section('right-panel')
    <main role="main">
        <div class="card">
            <div class="card-body">
                Let's get started,

                <div class="mt-2 pt-4">
                    <div class="container">
                        <form action="{{ route('sets.new-set') }}" method="POST">
                            @method('POST')
                            @csrf

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                    <br>
                                @endforeach
                            </div>
                        @endif

                            <div class="form-group pb-2">
                                <label for="set_title" class="pb-3">What should we call your set?</label>
                                <input class="form-control" placeholder="History Revision" name="set_title" type="text"
                                    value="" id="set_title">
                            </div>

                            <input class="btn btn-block btn-primary text-white mb-3" type="submit" value="Create Set">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop

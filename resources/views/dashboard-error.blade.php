@include('common.header')
<div class="container pt-4">
    <main role="main">
        <div class="card">
            <div class="card-body">
                @if(Session::has('message'))
                <p class="alert pb-2 mb-0 {{ Session::get('alert-class', 'alert-warning') }}">{{ Session::get('message') }}</p>
                @else
                <p class="alert pb-2 mb-0 alert-info">Sorry, you can't do that. But you can go <a href="/">home</a>.</p>
                @endif
            </div>
        </div>
    </main>
</div>
@include('common.footer')
@include('common.header')
<div class="container pt-4">
    <main role="main">
        <div class="card">
            <div class="card-body">
                Hello and welcome {{ auth()->user()->friendly_name }}.
            </div>
        </div>
    </main>
</div>
@include('common.footer')
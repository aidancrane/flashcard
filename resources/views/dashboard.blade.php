@include('common.header')
<div class="container-fluid pt-4">
    <div class="row">
        <nav class="col-md-2 d-md-block sidebar">
            <div class="sidebar-sticky">
                <div class="nav flex-column flex-nowrap overflow-auto text-white p-2">
                    <ul class="nav flex-column">
                        <ul class="nav flex-column">
                            <li>
                                <span class="mdi mdi-dock-top mdi-24px"></span>
                                <span class="menu-text">My Flashcard Sets</span>
                            </li>
                            <li>
                                <span class="mdi mdi-chart-line mdi-24px"></span>
                                <span class="menu-text">My Stats</span>
                            </li>
                            <li>
                                <span class="mdi mdi-account-outline mdi-24px"></span>
                                <span class="menu-text">My Account</span>
                            </li>
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="col-md-10 px-4">
            <main role="main">
                <div class="card">
                    <div class="card-body">
                        Hello and welcome {{ auth()->user()->friendly_name }} <span class="mdi mdi-access-point-check"></span>.
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@include('common.footer')
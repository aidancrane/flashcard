{{-- STOP. Did you know this sidebar is not visible on mobile devices!
    To update the sidebar for mobile devices you need to edit layouts.master.blade.php --}}
<nav class="col-md-2 d-md-block sidebar d-none d-lg-block">
    <div>
        <div class="nav flex-column flex-nowrap overflow-auto text-white p-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="/sets">
                        <span class="mdi mdi-dock-top mdi-24px"></span>
                        <span class="menu-text">My Flashcards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/sets/create">
                        <span class="mdi mdi-dock-top mdi-24px"></span>
                        <span class="menu-text">New Flashcards</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/statistics">
                        <span class="mdi mdi-chart-line mdi-24px"></span>
                        <span class="menu-text">My Stats</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/users/{{ auth()->user()->id }}/edit">
                        <span class="mdi mdi-account-outline mdi-24px"></span>
                        <span class="menu-text">My Account</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>    
</nav>
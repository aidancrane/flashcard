{{-- STOP. Did you know this sidebar is not visible on mobile devices!
    To update the sidebar for mobile devices you need to edit layouts.master.blade.php --}}
<nav class="col-md-2 d-md-block sidebar d-none d-lg-block">
    <div>
        <div class="nav flex-column flex-nowrap overflow-auto text-white p-2">
            <ul class="nav flex-column">
                <ul class="nav flex-column">
                    <li>
                        <span class="mdi mdi-dock-top mdi-24px"></span>
                        <span class="menu-text"><a href="/sets" class="no-text-decoration text-white">My Flashcard Sets</a></span>
                    </li>
                    <li>
                        <span class="mdi mdi-dock-top mdi-24px"></span>
                        <span class="menu-text"><a href="/sets/create" class="no-text-decoration text-white">Make new Set</a></span>
                    </li>
                    <li>
                        <span class="mdi mdi-chart-line mdi-24px"></span>
                        <span class="menu-text">My Stats</span>
                    </li>
                    <li>
                        <span class="mdi mdi-account-outline mdi-24px"></span>
                        <span class="menu-text"><a href="/users/{{ auth()->user()->id }}/edit" class="no-text-decoration text-white">My Account</a></span>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</nav>
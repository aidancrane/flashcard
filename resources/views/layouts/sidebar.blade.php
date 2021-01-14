<nav class="col-md-2 d-md-block sidebar">
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
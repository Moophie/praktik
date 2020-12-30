<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/"><img class="navbar-brand" id="menuLogo" src="../images/logo.png" alt="logo"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jobs">Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/student">Student</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/settings">Student settings</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="/settingspro">Professional settings</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="/companies">Companies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/student">Student profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/applications">Applications</a>
            </li>
            @if (Auth::check())
                <li class="nav-item" style="position:absolute; right: 20px;">
                    <p class="nav-link">{{ Auth::user()->firstname }}</p>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/logout">Log out</a>
                </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/login">Log in</a>
                <a class="nav-link" href="/signup">Signup</a>
            </li>
            @endif
        </ul>
    </div>
</nav>

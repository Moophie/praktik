<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="/"><img class="navbar-brand" id="menuLogo" src="../images/logo.png" alt="logo"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jobs">Jobs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/student">Students</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="/settingspro">Professional settings</a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link" href="/companies">Companies</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/applications">Applications</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/profile">{{ Auth::user()->firstname }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout">Log out</a>
            </li>
        </ul>
    </div>
</nav>

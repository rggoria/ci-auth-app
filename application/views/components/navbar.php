<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">RG.</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="modeDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Mode <i id="selectedModeIcon" class="bi bi-sun"></i>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="modeDropdown">
                        <li><a class="dropdown-item" href="#" onclick="setThemeMode('dark')"><i class="bi bi-moon"></i> Dark Mode</a></li>
                        <li><a class="dropdown-item" href="#" onclick="setThemeMode('light')"><i class="bi bi-sun"></i> Light Mode</a></li>
                        <li><a class="dropdown-item" href="#" onclick="setThemeMode('auto')"><i class="bi bi-arrows-angle-contract"></i> Auto Mode</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
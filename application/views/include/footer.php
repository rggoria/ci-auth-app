<footer class="footer mt-auto py-3 bg-dark text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col"></div> <!-- Empty column for spacing -->
            <div class="col text-center">
                <p>&copy; <?php echo date("Y"); ?> RG | Designed by Ram Emerson S. Goria</p>
            </div>
            <div class="col text-end">
                <p>Version 1.0.0</p>
            </div>
        </div>
    </div>
</footer>


<!-- Bootstrap Bundle JS -->
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>

<!-- Theme Mode JavaScript -->
<script>
    // Function to set theme mode
    function setThemeMode(mode) {
        const iconMap = {
            'dark': 'bi-moon',
            'light': 'bi-sun',
            'auto': 'bi-arrows-angle-contract'
        };

        const selectedModeIcon = document.getElementById('selectedModeIcon');
        selectedModeIcon.className = 'bi ' + iconMap[mode];

        if (mode === "auto") {
            // Check if the user prefers dark mode
            const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");
            setThemeMode(prefersDarkScheme.matches ? "dark" : "light");

            // Listen for changes in color scheme preference
            prefersDarkScheme.addListener((e) => {
                setThemeMode(e.matches ? "dark" : "light");
            });
        } else {
            document.body.classList.toggle("dark-mode", mode === "dark");
        }
    }

    // Initial theme setting based on user preference
    setThemeMode("auto");
</script>

</body>

</html>
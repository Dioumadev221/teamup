<?php
// Lire le menu depuis le fichier JSON
$menu_json = file_get_contents(__DIR__ . "/menu.json");
$menu = json_decode($menu_json, true);

// Récupérer la valeur du thème depuis le cookie ou défaut
global $theme;
if (!isset($theme)) {
    $theme = isset($_COOKIE['user_profile']) ? $_COOKIE['user_profile'] : "0";
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TeamUp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <?php for ($m = 0; $m < count($menu); $m++) { ?>
                <li class="nav-item <?php echo $m == 0 ? "active" : ""; ?>">
                    <a class="nav-link" href="<?php echo $menu[$m]["route"]; ?>">
                        <?php echo $menu[$m]["label"]; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
        <!-- Sélecteur de thème sans rechargement -->
        <form class="form-inline my-2 my-lg-0" id="themeForm">
            <select id="lst_theme" name="lst_theme" class="form-control">
                <option value="0" <?php echo $theme == "0" ? "selected" : ""; ?>>Thème</option>
                <option value="1" <?php echo $theme == "1" ? "selected" : ""; ?>>Clair</option>
                <option value="2" <?php echo $theme == "2" ? "selected" : ""; ?>>Foncé</option>
            </select>
        </form>
    </div>
</nav>

<script>
    // Changement de thème instantané via AJAX
    document.getElementById('lst_theme').addEventListener('change', function() {
        var themeValue = this.value;

        // 1. Envoi AJAX pour enregistrer le cookie (même traitement que POST normal)
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'index.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('lst_theme=' + encodeURIComponent(themeValue));

        // 2. Changement immédiat du fichier CSS du thème
        var themeLink = document.getElementById('dynamic-theme-css');
        if (!themeLink) {
            themeLink = document.createElement('link');
            themeLink.id = 'dynamic-theme-css';
            themeLink.rel = 'stylesheet';
            document.head.appendChild(themeLink);
        }
        if (themeValue === '2') {
            themeLink.href = '/teamup/application/themes/fonce/master.css';
        } else {
            themeLink.href = '/teamup/application/themes/default/master.css';
        }
    });
</script>
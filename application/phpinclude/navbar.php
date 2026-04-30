<?php
// Lire le menu depuis le fichier JSON
$menu_json = file_get_contents(__DIR__ . "/menu.json");
$menu = json_decode($menu_json, true);
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">TeamUp</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <?php for ($m = 0; $m < count($menu); $m++) { ?>
                <li class="nav-item <?php echo $m == 0 ? "active" : ""; ?>">
                    <a class="nav-link" href="<?php echo $menu[$m]["route"]; ?>">
                        <?php echo $menu[$m]["label"]; ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</nav>
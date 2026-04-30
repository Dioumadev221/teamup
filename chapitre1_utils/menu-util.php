<?php
$menu = array();

$menu[0] = array(
    "route" => "#",
    "label" => "Accueil",
    "tag" => "",
    "icon" => "home"
);
$menu[1] = array(
    "route" => "#",
    "label" => "Utilisateurs",
    "tag" => "",
    "icon" => "avatar"
);
$menu[2] = array(
    "route" => "#",
    "label" => "Demandes",
    "tag" => "",
    "icon" => "collective"
);
$menu[3] = array(
    "route" => "#",
    "label" => "Agenda",
    "tag" => "",
    "icon" => "calendar"
);
$menu[4] = array(
    "route" => "#",
    "label" => "Tâches",
    "tag" => "",
    "icon" => "coding"
);
$menu[5] = array(
    "route" => "#",
    "label" => "Messages",
    "tag" => "",
    "icon" => "chat"
);
$menu[6] = array(
    "route" => "#",
    "label" => "Rapports",
    "tag" => "",
    "icon" => "analysis"
);

$json = json_encode($menu);
echo "js=" . $json;
    
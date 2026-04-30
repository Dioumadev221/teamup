<?php
require_once '../comfpl/main.php';
require_once 'config.php';

define('USER_PROFILE', 'user_profile');

$theme = "0";

// Log du POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lst_theme'])) {
    $theme = $_POST['lst_theme'];
    echo "<script>console.log('POST theme = " . $theme . "');</script>";
    $expiration = time() + 60 * 60;
    setcookie(USER_PROFILE, $theme, $expiration);
}

// Log du cookie
if (isset($_COOKIE[USER_PROFILE])) {
    $theme = $_COOKIE[USER_PROFILE];
    echo "<script>console.log('COOKIE theme = " . $theme . "');</script>";
}

echo "<script>console.log('Final theme = " . $theme . "');</script>";

// Application du thème FPL
if ($theme == "2") {
    FPLGlobal::$theme = "fonce";
} else {
    FPLGlobal::$theme = "default";
}

echo "<script>console.log('Thème FPL = " . FPLGlobal::$theme . "');</script>";

require_once 'views/_layout.php';

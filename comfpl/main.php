<?php
// Fichier principal du framework FPL (version minimale)
require_once __DIR__ . '/controllers/BaseController.php';
require_once __DIR__ . '/views/ViewResult.php';
require_once __DIR__ . '/views/PartialViewResult.php';
require_once __DIR__ . '/views/JsonResult.php';
require_once __DIR__ . '/FPLGlobal.php';

// Auto-chargement simple des classes (si besoin)
spl_autoload_register(function ($class) {
    $prefix = 'comfpl\\';
    $base_dir = __DIR__ . '/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) return;
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) require_once $file;
});
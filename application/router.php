<?php
require_once '../comfpl/main.php';
require_once 'config.php';

$route = $_SERVER['REQUEST_URI'];
$target_action = FPLGlobal::get_action($route, FPLGlobal::$default_route);
$model = FPLGlobal::get_request_data();

FPLGlobal::process_result($target_action);
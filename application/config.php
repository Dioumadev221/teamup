<?php

FPLGlobal::$namespace = "teamup\\Controllers\\";


FPLGlobal::$default_route = "general-home-index.do";


$bootstrap = new bundle();
$bootstrap->css_set = array(
    new cssItemBundle("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"),
    new cssItemBundle("https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css"),
    new cssItemBundle("https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css")
);
$bootstrap->script_set = array(
    new scriptItemBundle("https://code.jquery.com/jquery-3.3.1.min.js"),
    new scriptItemBundle("https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js"),
    new scriptItemBundle("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"),
    new scriptItemBundle("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js")
);
FPLGlobal::add_bundle("bootstrap", $bootstrap);

// Connexion BDD (par défaut)
$cx_server = "localhost";
$cx_login = "root";
$cx_pwd = "";
$cx_dbname = "teamup";

function get_default_connection() {
    global $cx_server, $cx_login, $cx_pwd, $cx_dbname;
    return array("cx_server"=>$cx_server, "cx_login"=>$cx_login, "cx_pwd"=>$cx_pwd, "cx_dbname"=>$cx_dbname);
}
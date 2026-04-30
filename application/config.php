<?php

require_once __DIR__ . '/../comfpl/bundle.php';
require_once __DIR__ . '/../comfpl/FPLGlobal.php';
if (!class_exists('bundle')) {
    class bundle
    {
        public $css_set = [];
        public $script_set = [];
    }
    class cssItemBundle
    {
        public $url;
        public function __construct($url)
        {
            $this->url = $url;
        }
    }
    class scriptItemBundle
    {
        public $url;
        public function __construct($url)
        {
            $this->url = $url;
        }
    }
}
// Connexion à la base de données
$cx_server = "localhost";
$cx_login = "root";
$cx_pwd = "";
$cx_dbname = "teamup";

function get_default_connection()
{
    global $cx_server, $cx_login, $cx_pwd, $cx_dbname;
    return array(
        "cx_server" => $cx_server,
        "cx_login" => $cx_login,
        "cx_pwd" => $cx_pwd,
        "cx_dbname" => $cx_dbname
    );
}

// Bundle Bootstrap (identique au précédent)
$bootstrap = new bundle();
$bootstrap->css_set = [
    new cssItemBundle("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"),
    new cssItemBundle("https://use.fontawesome.com/releases/v5.7.0/css/all.css")
];
$bootstrap->script_set = [
    new scriptItemBundle("https://code.jquery.com/jquery-3.3.1.min.js"),
    new scriptItemBundle("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"),
    new scriptItemBundle("https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js")
];
FPLGlobal::add_bundle("bootstrap", $bootstrap);

<?php
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

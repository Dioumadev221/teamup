<?php
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

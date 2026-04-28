<?php
namespace comfpl\views;

class PartialViewResult {
    public $content;
    public function __construct($content) {
        $this->content = $content;
    }
}
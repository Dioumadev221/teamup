<?php
namespace comfpl\views;

class JsonResult {
    public $json_data;
    public function __construct($json_data) {
        $this->json_data = $json_data;
    }
}
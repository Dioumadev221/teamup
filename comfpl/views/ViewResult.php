<?php
namespace comfpl\views;

class ViewResult {
    public $model;
    public $viewName;
    public $content;
    public function __construct($model, $viewName) {
        $this->model = $model;
        $this->viewName = $viewName;
    }
}
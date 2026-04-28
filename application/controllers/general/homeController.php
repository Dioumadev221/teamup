<?php
namespace teamup\Controllers\general;

use comfpl\controllers\BaseController;

class homeController extends BaseController {
    public function index($model) {
        $model->message = "Bienvenue sur Team Up";
        return $this->View($model, "index");
    }
}
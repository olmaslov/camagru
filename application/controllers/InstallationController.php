<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 27.08.18
 * Time: 20:43
 */

namespace application\controllers;


use application\core\Controller;

class InstallationController extends Controller {
    public function installAction() {
        $this->model->install;
    }
}
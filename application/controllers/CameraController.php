<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 27.08.18
 * Time: 20:43
 */

namespace application\controllers;


use application\core\Controller;

class CameraController extends Controller {
	public function enableAction() {
		$this->view->render('main page');
	}

	public function cameraAction() {
	    $this->view->render('camera');
    }
}
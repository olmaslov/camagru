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
	    $res = $this->model->get_user_photos($_COOKIE);
//	    debug($res);
	    $this->view->render('camera', $res);
    }

    public function maskAction(){
	    if (isset($_POST['mask'], $_POST['data'])){
	        $this->model->add_mask($_POST);
        }
    }
}
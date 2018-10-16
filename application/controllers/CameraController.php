<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 27.08.18
 * Time: 20:43
 */

namespace application\controllers;


use application\core\Controller;
use application\core\View;

class CameraController extends Controller {

	public function cameraAction() {
	    if (isset($_COOKIE['hash'], $_COOKIE['id'])) {
	        $code = json_decode($this->funk->checkAcc($_COOKIE));
	        if ($code->code != 0){
	            View::errorCode(403);
            }
            else {
                $res = $this->model->get_user_photos($_COOKIE);
                $header = true;
                $this->view->render('camera', $res, $header);
            }
        }
        else
            View::errorCode(403);
    }

    public function maskAction(){
	    if (isset($_POST['mask'], $_POST['data'])){
	        $this->model->add_mask($_POST);
        }
    }
}
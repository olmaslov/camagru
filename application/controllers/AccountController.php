<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 22:49
 */

namespace application\controllers;

use application\core\Controller;

use application\core\View;
use PDO;

class AccountController extends Controller {
    public function loginAction() {
        if (isset($_POST['intra'])) {
            $token = json_decode($_POST['intra']);
            exit ($this->model->intraLogin($token));
        }

        if (isset($_POST['secret'])) {
            $secret = json_decode(file_get_contents("application/config/client_id.json"));
            exit($secret->secret);
        }


        if (isset($_POST['google'])) {
            exit ($this->model->googleLogin($_POST['google']));
        }


        if (isset($_POST['fb'])) {
            exit ($this->model->fbLogin($_POST['access_token']));
        }

        if (isset($_POST['simple'])) {
            exit ($this->model->loginSimple($_POST));
        }

        $this->view->render("login");

    }

    public function registerAction() {
        if (isset($_POST['register'])) {
            exit($this->model->registerSimple($_POST));
        }

        $this->view->render("register");
    }

    public function responseAction() {
        echo "<div id='test'></div>";
    }

    public function myAction(){
    	$res = json_decode($this->funk->checkAcc($_COOKIE));
    	if ($res->code == 0) {
			$this->view->render("my");
		}
		else {
			header('Location: login#my');
		}
	}

	public function adminAction(){
		$res = json_decode($this->funk->checkAcc($_COOKIE));
		if ($res->code == 0) {
			if ($res->role == 1) {
				$this->view->render("admin");
			}
			else
			{
				View::errorCode(403);
			}
		}
		else {
			header('Location: login#admin');
		}
	}
}
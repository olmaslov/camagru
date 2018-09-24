<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 22:49
 */

namespace application\controllers;

use application\core\Controller;

use PDO;

class AccountController extends Controller {
	public function loginAction() {
		if (isset($_POST['intra'])){
			$token = json_decode($_POST['intra']);
			exit ($this->model->intraLogin($token));
		}

		if (isset($_POST['secret'])){
			$secret = json_decode(file_get_contents("application/config/client_id.json"));
			exit($secret->secret);
		}



		if (isset($_POST['google'])) {
			exit ($this->model->googleLogin($_POST['google']));
		}



		if (isset($_POST['fb'])){
			exit ($this->model->fbLogin($_POST['access_token']));
		}

		$this->view->render("login");

	}

	public function registerAction() {
        if (isset($_POST['register'])){
            exit($this->model->registerSimple($_POST));
        }

		$this->view->render("register");
	}

	public function responseAction() {
		echo "<div id='test'></div>";
	}
}
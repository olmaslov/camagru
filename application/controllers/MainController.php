<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 23:06
 */

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;

class MainController extends Controller {

	public function indexAction() {
//		require 'AccountController.php';
//		$acc = AccountController::class;
//		print_r($this->funk->checkAcc($_COOKIE));
		$res = json_decode($this->funk->checkAcc($_COOKIE));
		if ($res->code == 0) {
			$result = $this->model->get_post('0');
			$vars = [
				'news' => $result
			];
			$this->view->render('main page', $vars);
		}
		else {
			header('Location: login#');
		}

	}

	public function getpostAction() {
//	    $this->model->get_post($_POST['last']);
    }
}
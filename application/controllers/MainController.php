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
		$res = json_decode($this->funk->checkAcc($_COOKIE));
		if ($res->code == 0) {
			$result = $this->model->get_post();
			$header = true;
			$this->view->render('Camagru', $result, $header);
		}
		else {
			header('Location: login#');
		}

	}
}
<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 07.10.18
 * Time: 23:36
 */

namespace application\controllers;

use application\core\Controller;

use application\core\View;
use PDO;


class InstallController extends Controller {

	public function installAction() {
		if (!$this->model->test_db()) {
			$this->view->render("install");
			if (isset($_POST['install'])) {
				if (!$this->model->install_db($_POST)) {
					echo '1';
				} else {
					echo '0';
				}
			}
		}
		elseif (!isset($_POST['install']))
			header('Location: login');
	}
}
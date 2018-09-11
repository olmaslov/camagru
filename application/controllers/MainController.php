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

//		$result = $this->model->get_news();
//		$vars = [
//			'news' => $result
//		];
		$this->view->render('main page');
	}
}
<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 22:56
 */

namespace application\core;

abstract class Controller {

	public $route;
	public $view;
	public $model;

	public function __construct($route) {
		$this->route = $route;
		$this->view = new View($route);
		$this->model = $this->loadmodel($route['controller']);
	}

	public function loadmodel($name) {
		$path = 'application\models\\'.ucfirst($name);
		if (class_exists($path)){
			return new $path();
		}
	}
}
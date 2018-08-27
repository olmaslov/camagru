<?php

namespace application\core;

class Router {

	protected $routes = [];
	protected $params = [];

    function __construct() {
		$arr = require 'application/config/routes.php';
		foreach ($arr as $key => $value) {
			$this->add($key, $value);
    	}
    }

    public function add($route, $params) {
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $params;
	}

	public function match() {
		$url = preg_replace('/\/camagru_mvc\//', '', $_SERVER['REQUEST_URI']); //заменить camagru_mvc на нужное выражение
		if (($cutoff = strpos($url, '?')) !== false) { //обрезаем get запрос
			$url = substr($url, 0, $cutoff);
		}
		foreach ($this->routes as $key => $value){
			if (preg_match($key, $url,$mathes)) {
				$this->params = $value;
				return true;
			}
		}
		return false;
	}

	public function run() {
    	if ($this->match()){
    		$classpath = 'application\controllers\\'.ucfirst($this->params['controller']).'Controller';
			if (!class_exists($classpath)){
				View::errorCode(404);
			} else {
				$action = $this->params['action'].'Action';
				if (!method_exists($classpath, $action)) {
					View::errorCode(404);
				} else {
					$controller = new $classpath($this->params);
					$controller->$action();
				}
			}
    	}
		else
			View::errorCode(404);
	}


}
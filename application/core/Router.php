<?php

namespace application\core;

use application\lib\Db;

class Router {

	protected $routes = [];
	protected $params = [];
	protected $db;

    function __construct() {
		$arr = require 'application/config/routes.php';
		$this->db = new Db();
		foreach ($arr as $key => $value) {
			$this->add($key, $value);
    	}
    }

    public function add($route, $params) {
        if ($this->db->err == 1 && $params['controller'] != 'install') {
            $params = [
              'controller' => 'install',
              'action' => 'install'
            ];
        }
		$route = '#^'.$route.'$#';
		$this->routes[$route] = $params;
	}

	public function match() {
		$url = preg_replace('/\/camagru_mvc\//', '', $_SERVER['REQUEST_URI']); //replace camagru_mvc with yours
		if (($cutoff = strpos($url, '?')) !== false) { //cutting get request
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
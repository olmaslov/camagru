<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 12.08.18
 * Time: 22:19
 */

namespace application\core;

use application\lib\Db;

use application\lib\Functions;

abstract class Model {

	public $db;
	public $funk;

	public function __construct() {
		$this->db = new Db();
		$this->funk = new Functions();
	}
}
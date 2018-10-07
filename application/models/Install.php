<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.10.18
 * Time: 0:14
 */

namespace application\models;

use application\core\Model;

class Install extends Model{
	public function install_db($args){
		if ($this->db->test() == 1) {
			include_once 'config/setup.php';
		}
		else
			return 1;
	}

	public function test_db(){
		if ($this->db->test() == 1) {
			return 0;
		}
		else
			return 1;
	}
}
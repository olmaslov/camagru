<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 15.08.18
 * Time: 4:21
 */

namespace application\lib;

use application\lib\Db;

class Functions {

	public $db;

	public function __construct() {
		$this->db = new Db();
	}

	public function generateCode($length = 6) {
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
		$code = "";
		$clen = strlen($chars) - 1;
		while (strlen($code) < $length) {
			$code .= $chars[mt_rand(0, $clen)];
		}
		$code = hash('md5', $code);
		return $code;
	}

	public function checkAcc($args) {
		if (isset($args['hash']) && isset($args['id'])) {
			$res = $this->db->row("SELECT * from users WHERE id = '" . $args['id'] . "'");
			$ret = array();
			if ($args['hash'] == $res['hash'] || $args['id'] != $res['id']) {
				$ret['code'] = 0;
				$ret['role'] = $res['role'];
				return json_encode($ret);
			} else {
				$ret['hash'] = $this->generateCode();
				$ret['code'] = 1;
				$this->db->query("UPDATE `users` SET `hash`= '" . $ret['hash'] . "' WHERE `id`= '" . $ret['id'] . "';");
				return json_encode($ret);
			}
		} else {
			$ret['code'] = 1;
			return json_encode($ret);
		}
	}
}
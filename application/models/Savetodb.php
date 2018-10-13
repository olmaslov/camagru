<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 12.08.18
 * Time: 22:14
 */

namespace application\models;

use application\core\Model;

class Savetodb extends Model {
    public function save_post($params) {
        $this->db->query("INSERT INTO `posts` (`uid`, `type`, `descr`) VALUES (:uid, :type, :descr)", $params);
        $result = $this->db->row("SELECT LAST_INSERT_ID()");
        return $result['LAST_INSERT_ID()'];
    }

    public function del_post($params) {
    	$val = $this->db->row("SELECT * FROM `posts` WHERE id='". $params['id'] ."' AND uid='".$_COOKIE['id']."'");
    	if (isset($val)) {
			if ($this->db->query("UPDATE `posts` SET `deleted`='1' WHERE id='". $params['id'] ."' AND uid='".$_COOKIE['id']."'"))
				return 1;
			else
				return 0;
		}
	}
}
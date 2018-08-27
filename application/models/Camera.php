<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 27.08.18
 * Time: 20:38
 */

namespace application\models;


use application\core\Model;

class Camera extends Model {
	public function get_news() {
		$result = $this->db->row('SELECT title, description FROM news');
		return $result;
	}
}
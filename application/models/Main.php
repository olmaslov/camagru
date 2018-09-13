<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 12.08.18
 * Time: 22:14
 */

namespace application\models;

use application\core\Model;

class Main extends Model {
	public function get_news() {
		$result = $this->db->row('SELECT title, description FROM news');
		return $result;
	}

	public function get_post($last) {
	    $result = $this->db->row('SELECT id, type, descr FROM posts');
	    return $result;
    }
}
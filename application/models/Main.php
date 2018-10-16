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

	public function get_post() {
	    $result = $this->db->all('SELECT id, descr, uid, creation_date FROM posts WHERE deleted IS NULL ORDER BY id DESC LIMIT 6');
            foreach ($result as $key => $value) {
                $result[$key]['user'] = $this->db->row("SELECT f_name, login FROM users WHERE id = '" . $value['uid'] . "'");
                $result[$key]['comment'] = $this->db->all("SELECT * FROM comments WHERE pid = '" . $value['id'] . "' ORDER BY creation_date DESC");
                $result[$key]['likecount'] = $this->db->row("SELECT count(*) as total from likes WHERE pid = '" . $value['id'] . "'");
                $result[$key]['like'] = false;
                if ($this->db->row("SELECT * FROM likes WHERE pid = '" . $value['id'] . "' AND uid = '" . $_COOKIE['id'] . "' ORDER BY creation_date DESC")) {
                    $result[$key]['like'] = true;
                }
                foreach ($result[$key]['comment'] as $key1 => $val) {
                    $result[$key]['comment'][$key1]['user'] = $this->db->row("SELECT f_name, login FROM users WHERE id = '" . $val['uid'] . "'");
                }
            }
            return $result;
    }
}
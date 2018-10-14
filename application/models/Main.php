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
	    foreach ($result as $key => $value){
	        $result[$key]['user'] = $this->db->row("SELECT f_name, login FROM users WHERE id = '".$value['uid']."'");
            $result[$key]['comment'] = $this->db->all("SELECT * FROM comments WHERE pid = '".$value['id']."' ORDER BY creation_date DESC");
            foreach ($result[$key]['comment'] as $key1 => $val){
                $result[$key]['comment'][$key1]['user'] = $this->db->row("SELECT f_name, login FROM users WHERE id = '".$val['uid']."'");
            }
        }
	    return $result;
    }

//    public function get_posts(){
//	    $res = $this->db->all("SELECT * from posts ORDER BY id DESC");
//	    $res1 = $this->db->all("SELECT * from  ORDER BY id DESC");
//            return $res;
//    }

    public function is_user() {
//	    $sql = $this->db->row('SELECT hash FROM users WHERE id=);
//	    var_dump($_COOKIE);
//	    return $result;
    }
}
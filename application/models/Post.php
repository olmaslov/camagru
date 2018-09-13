<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 12.08.18
 * Time: 22:14
 */

namespace application\models;

use application\core\Model;

class Post extends Model {
    public function get_post($quant, $uid, $last){
        $result = $this->db->row('SELECT * FROM posts');
        return $result;
    }
}
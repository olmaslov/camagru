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
        return $result[0]['LAST_INSERT_ID()'];
    }
}
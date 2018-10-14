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
    public function get_post(){
        $result = $this->db->all("SELECT * FROM posts WHERE id < '".$_POST['lastid']."' AND deleted IS NULL ORDER BY id DESC LIMIT 6");
        foreach ($result as $key => $value){
            $result[$key]['user'] = $this->db->row("SELECT f_name, login FROM users WHERE id = '".$value['uid']."'");
            $result[$key]['comment'] = $this->db->all("SELECT * FROM comments WHERE pid = '".$value['id']."' ORDER BY creation_date DESC");
            foreach ($result[$key]['comment'] as $key1 => $val){
                $result[$key]['comment'][$key1]['user'] = $this->db->row("SELECT f_name, login FROM users WHERE id = '".$val['uid']."'");
            }
        }
        return $result;
    }

    public function add_comment() {
        $params = [
            'id' => $_POST['id'],
            'comment' => $_POST['comment'],
            'uid' => $_COOKIE['id'],
        ];
        if ($this->db->query('INSERT INTO `comments`(`uid`, `pid`, `text`) VALUES (:uid, :id, :comment)', $params)){
            $res = $this->db->row("SELECT * from posts WHERE id = '" . $_POST['id'] . "'");
            $res1 = $this->db->row("SELECT * from users WHERE id = '" . $res['uid'] . "'");
            if ($res1['receive'] == 1) {
                mail($res1['email'], 'Comment', "You have new comment on your post");
            }
            return 1;
        }
        return 0;
    }
}
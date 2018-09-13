<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 9/12/18
 * Time: 11:14 AM
 */

namespace application\models;

use application\core\Model;


class Installation extends Model {
    public function install() {
        $query = "CREATE TABLE users (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      login VARCHAR(30),
                      f_name VARCHAR(30),
                      l_name VARCHAR(30),
                      email VARCHAR(30) NOT NULL,
                      password VARCHAR(256),
                      reg_from VARCHAR(30) NOT NULL,
                      hash TEXT(255),
                      code TEXT(600),
                      token VARCHAR(600),
                      rtoken VARCHAR(600),
                      pic VARCHAR(600),
                      role INT(5) NOT NULL,
                      reg_date TIMESTAMP
                      )";
        $result = $this->db->query($query);
        return $result;
    }
}
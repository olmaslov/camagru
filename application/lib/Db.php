<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 08.08.18
 * Time: 20:26
 */

namespace application\lib;

use PDO;

class Db {
		protected  $dbh;

        public function __construct() {
			$conf = require 'application/config/db.php';
			try {
                $this->dbh = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['dbname'], $conf['user'], $conf['passwd']);
            }
            catch (\PDOException $e) {
                try {
                    $this->dbh = new PDO('mysql:host=' . $conf['host'], $conf['user'], $conf['passwd']);
//                    $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "CREATE DATABASE camagru";
                    $this->dbh->exec($sql);
                    $sql = "CREATE TABLE users (
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
                    $this->dbh = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['dbname'], $conf['user'], $conf['passwd']);
                    $this->dbh->exec($sql);
                    $sql = "CREATE TABLE posts (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      uid int(6),
                      type TINYINT(1),
                      descr VARCHAR(30),
                      creation_date TIMESTAMP
                      )";
                    $this->dbh->exec($sql);
                    $sql = "CREATE TABLE comments (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      uid int(6),
                      pid int(6),
                      text VARCHAR(600),
                      creation_date TIMESTAMP
                      )";
                    $this->dbh->exec($sql);
                } catch (\PDOException $e) {
//                    echo $sql . "<br>" . $e->getMessage();
                }
            }
        }

        public function query($sql, $params = []) {
        	$stmt = $this->dbh->prepare($sql);
        	if(!empty($params)) {
        		foreach ($params as $key =>$val) {
        			$stmt->bindValue(':'.$key, $val);
				}
			}
			$stmt->execute();
        	return $stmt;
        }

        public function row($sql, $params = []){
        	$result = $this->query($sql, $params);
        	return $result->fetch(PDO::FETCH_ASSOC);
		}

		public function column($sql, $params = []) {
        	$result = $this->query($sql, $params);
        	return $result->fetchColumn();
		}
}
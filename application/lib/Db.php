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
	protected $dbh;
	public $err = 0;

	public function __construct() {
		$conf = require 'config/database.php';
		try {
			$this->dbh = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['dbname'], $conf['user'], $conf['passwd']);
		} catch (\PDOException $e) {
			$this->err = 1;
		}
	}

	public function test() {
		return $this->err;
	}

	public function initdb() {
		$conf = require 'config/database.php';
		try {
			$this->dbh = new PDO('mysql:host=' . $conf['host'], $conf['user'], $conf['passwd']);
			$sql = "CREATE DATABASE " .$conf['dbname'];
			$this->dbh->exec($sql);
			$this->dbh = new PDO('mysql:host=' . $conf['host'] . ';dbname=' . $conf['dbname'], $conf['user'], $conf['passwd']);
			$sql = "CREATE TABLE users (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      login VARCHAR(30),
                      f_name VARCHAR(30),
                      l_name VARCHAR(30),
                      email VARCHAR(30) NOT NULL,
                      password VARCHAR(256),
                      fb_id VARCHAR(256),
                      google_id VARCHAR(256),
                      intra_id VARCHAR(256),
                      hash TEXT(255),
                      code TEXT(600),
                      token VARCHAR(600),
                      rtoken VARCHAR(600),
                      pic VARCHAR(600),
                      role INT(5) NOT NULL,
                      verified TINYINT(1),
                      receive TINYINT(1) DEFAULT 1,
                      reg_date TIMESTAMP
                      );
                      CREATE TABLE posts (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      uid int(6),
                      type TINYINT(1),
                      descr VARCHAR(30),
                      deleted TINYINT(1) NULL,
                      creation_date TIMESTAMP
                      );
                      CREATE TABLE comments (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      uid int(6),
                      pid int(6),
                      text VARCHAR(600),
                      creation_date TIMESTAMP
                      );
                      CREATE TABLE likes (
                      id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                      uid int(6),
                      pid int(6),
                      creation_date TIMESTAMP
                      )";
			$this->dbh->exec($sql);
		} catch (\PDOException $e) {
                    echo $e->getMessage();
		}
	}

	public function query($sql, $params = []) {
		$stmt = $this->dbh->prepare($sql);
		if (!empty($params)) {
			foreach ($params as $key => $val) {
				$stmt->bindValue(':' . $key, $val);
			}
		}
		$stmt->execute();
		return $stmt;
	}

	public function row($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public function all($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	public function column($sql, $params = []) {
		$result = $this->query($sql, $params);
		return $result->fetchColumn();
	}
}
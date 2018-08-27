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
			$this->dbh = new PDO('mysql:host='.$conf['host'].';dbname='.$conf['dbname'], $conf['user'], $conf['passwd']);
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
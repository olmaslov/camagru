<?php
if ($args['std'] == 0){
			$db_info = '<?php
	$DB_DSN = \''.$args['path'].'\';
	$DB_USER = \''.$args['user'].'\';
	$DB_PASSWORD = \''.$args['pass'].'\';
	$DB_NAME = \''.$args['name'].'\';

	return [
		\'host\' => $DB_DSN,
		\'dbname\' => $DB_NAME,
		\'user\' => $DB_USER,
		\'passwd\' => $DB_PASSWORD
	];';
			file_put_contents('./config/database.php', $db_info);
			$this->db->initdb();
			$hash = $this->funk->generateCode();
			$params = [
				'email' => $args['mail'],
				'pass' => hash('md5', $args['apass']),
				'login' => $args['login'],
				'hash' => $hash
			];
			$this->db->query("INSERT INTO `users` 
(`email`, `password`, `login`, `role`, `hash`) 
VALUES (:email, :pass, :login, '1', :hash)", $params);
}
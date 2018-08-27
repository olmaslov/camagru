<?php
/**
 * Created by PhpStorm.
 * User: omaslov
 * Date: 15.08.18
 * Time: 4:21
 */
function generateCode($length=6) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPRQSTUVWXYZ0123456789";
	$code = "";
	$clen = strlen($chars) - 1;
	while (strlen($code) < $length) {
		$code .= $chars[mt_rand(0,$clen)];
	}
	$code = hash('md5', $code);
	return $code;
}
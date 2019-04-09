<?php
function getConnexion() {
	global $pdo;
	if($pdo == null) {
		$dsn = 'mysql:host=localhost;dbname=dbchat';
		$pdo = new PDO($dsn, 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	}
	return $pdo;
}
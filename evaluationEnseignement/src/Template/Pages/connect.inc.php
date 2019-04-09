<?php
function getConnexion() {
	global $pdo;
	if($pdo == null) {
		$dsn = "mysql:host=localhost;dbname=bdevaluationenseignement;charset=utf8";
		$pdo = new PDO($dsn, "syseval", "a78z54");
	}
	return $pdo;
}
<?php
function getConnexion() {
	global $pdo;
	if($pdo == null) {
		$dsn = "mysql:host=localhost;dbname=myMovies;charset=utf8";
		$pdo = new PDO($dsn, "root", "");
	}
	return $pdo;
}
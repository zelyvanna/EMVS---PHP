<?php
function getConnexion() {
	global $pdo;
	if($pdo == null) {
		$dsn = "mysql:host=localhost;dbname=myMovies";
		$pdo = new PDO($dsn, "myMovies", "YBCea6UTUhV2Bxmw");
	}
	return $pdo;
}
<?php
function getConnexion() {
	global $pdo;
	if($pdo == null) {
		$dsn = "mysql:host=localhost;dbname=mymovies";
		$pdo = new PDO($dsn, "root", "");
	}
	return $pdo;
}
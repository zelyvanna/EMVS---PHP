<?php
function getConnexion() {
	global $pdo;
	if($pdo == null) {
	//Connexion
		$dsn = "mysql:host=localhost;dbname=dbRomandie";
		$pdo =  new PDO($dsn, "root", "");
	}
	return $pdo;
}

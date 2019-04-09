<?php

function getConnexion() {
	/* Permet de recherche la valeur de $pdo dans tout mon projet,
	   par uniquement dans ce fichier. */
	global $pdo;

	if($pdo == null) {
		// Paramètres de connections à la BD
		$dsn = 'mysql:dbname=myMovies;host=localhost';
		$user = 'root';
		$password = '';

		// Connexion
		$pdo = new PDO($dsn, $user, $password);
	}

	// On retourne l'objet connexion
	return $pdo;
}
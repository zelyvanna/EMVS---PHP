<?php

//============
// Connexion
//============

function getConnexion(){
	//Paramètres
	$dsn='mysql:dbname=mymovies;host=127.0.0.1';
	$user = 'root';
	$password = '';
	try{
		$conn = new PDO($dsn,$user,$password);
	}catch(Exception $err){
		echo "Connection à MYSQL impossible :",
		$err->getMessage();
		die();
	}
	return $conn;
}
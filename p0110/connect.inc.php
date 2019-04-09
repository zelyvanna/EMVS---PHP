<?php

//============
// Connexion
//============

function getConnexion(){
	//Il faut créer un objet "global" sinon cela va créer à CHAQUE appel de la fonction un objet
	//"$conn" supplémentaire et va donc diminuer les performances
	global $conn;
	//Paramètres
	$dsn='mysql:dbname=mymovies;host=127.0.0.1';
	$user = 'root';
	$password = '';
	
	if($conn==null){
		try{
			$conn = new PDO($dsn,$user,$password);
		}catch(Exception $err){
			echo "Connection à MYSQL impossible :",
			$err->getMessage();
			die();
		}
	}
	return $conn;
}
<?php

//============
// Connexion
//============

function getConnexion(){
	//Il faut cr�er un objet "global" sinon cela va cr�er � CHAQUE appel de la fonction un objet
	//"$conn" suppl�mentaire et va donc diminuer les performances
	global $conn;
	//Param�tres
	$dsn='mysql:dbname=mymovies;host=127.0.0.1';
	$user = 'root';
	$password = '';
	
	if($conn==null){
		try{
			$conn = new PDO($dsn,$user,$password);
		}catch(Exception $err){
			echo "Connection � MYSQL impossible :",
			$err->getMessage();
			die();
		}
	}
	return $conn;
}
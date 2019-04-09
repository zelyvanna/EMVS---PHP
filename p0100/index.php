<?php

//============
// Connexion
//============

//Paramètres
$dsn='mysql:dbname=mymovies;host=127.0.0.1';
$user = 'root';
$password = '';

//test connexion et renvoie message d'erreur
try{
	$conn = new PDO($dsn,$user,$password);
}catch(Exception $err){
	echo "Connection à MYSQL impossible :",
	$err->getMessage();
	die();
}

//==========================================
// Affichage liste films sous forme de texte
//==========================================

$sql = "SELECT * FROM tblfilm";
$stmt = $conn->query($sql);

foreach($stmt as $row){
	echo $row["filmTitre"].", paru en ".$row["filmAnnee"].", réalisé par ".$row["filmNomMES"].".<br />";
}
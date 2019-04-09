<!DOCTYPE html>
<html>
<head>
	<title>P0315 - Liste d'articles (Catalogue)</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	require('functions.php');
	session_start();
	
	//Traitement
	if(isset($_GET["action"]) && $_GET["action"] == "removeArticle") {
		//Suppression
		$_SESSION["catalogue"]->removeArticle($_GET["id"]);
	}
	
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";

	//Affichage
	if(isset($_SESSION["catalogue"])) {
		echo $_SESSION["catalogue"]->detail();
	}
?>
	<p><a href="index.php">Retour au formulaire</a></p>
</body>
</html>
<?php
	require('functions.php');
	session_start();	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Backend</title>
	</head>
	<body>
<?php
	if( ! isset ($_SESSION["catalogue"]) ) {
		$_SESSION["catalogue"] = new Catalogue();
	}
	//Traitement
	if (isset($_REQUEST["action"]) ) {
		//Formulaire ajout d'un Article
		if($_REQUEST["action"] == "addArticle") {
			$_SESSION["catalogue"]->printForm();
		}
		//Ajout d'un Article
		if($_REQUEST["action"] == "form_Ajouter") {
			$_SESSION["catalogue"]->addArticle($_POST["description"], $_POST["prix"]);
		}
		//Formulaire de mise à jour
		if($_REQUEST["action"] == "updateArticle") {
			$_SESSION["catalogue"]->printForm($_GET["id"]);
		}
		//Modification d'un Article
		if($_REQUEST["action"] == "form_Modifier") {
			$_SESSION["catalogue"]->updateArticle($_POST["id"],$_POST["description"], $_POST["prix"]);
		}
		//Suppression d'un Article
		if( $_REQUEST["action"] == "removeArticle") {
			$_SESSION["catalogue"]->removeArticle($_GET["id"]);
		}
	}
	//Affichage
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
	
	echo $_SESSION["catalogue"]->detail();
?>
<a href="?action=addArticle">Ajouter un article</a>
	</body>
</html>

<!DOCTYPE html>
<html>
<head>
	<title>P0315 - Ajout d'articles</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	require('functions.php');
	session_start();
	/*
	$_SESSION["catalogue"] = array();
	$_SESSION["catalogue"][] = new Article("crayon couleur", "0.5");
	$_SESSION["catalogue"][] = new Article("crayon papier", "0.4");
	$_SESSION["catalogue"][] = new Article("bloc note A4", "2");
	*/
	
?>
<form action="#" method="POST">
	<input type="hidden" name="action" value="form_add" />
	<p>
		<label for="description">Description</label>
		<input type="text" name="description" id="description" />
	</p>
	<p>
		<label for="prix">Prix</label>
		<input type="text" name="prix" id="prix" />
	</p>
	<p><input type="submit" value="Ajouter l'article" /></p>
</form>
<?php
	if (isset($_POST["action"]) ) {
		//Ajout d'un Article
		if($_POST["action"] == "form_add") {
			$_SESSION["catalogue"][] = new Article($_POST["description"], $_POST["prix"]);
			echo "<p>L'article a été ajouté avec succès</p>";
		}
	}
?>
<a href="list.php">Liste</a>
</body>
</html>

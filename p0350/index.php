<!DOCTYPE html>
<html>
<head>
	<title>P0350 - Catalogue d'articles</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	require('functions.php');
	session_start();
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
	if(! isset($_SESSION["catalogue"]) ){
		$_SESSION["catalogue"] = new Catalogue();
	}
	if (isset($_POST["action"]) ) {
		//Ajout d'un Article
		if($_POST["action"] == "form_add") {
			$_SESSION["catalogue"]->addArticle($_POST["description"], $_POST["prix"]);
			echo "<p>L'article a été ajouté avec succès</p>";
		}
	}
?>
<a href="list.php">Liste</a>
</body>
</html>

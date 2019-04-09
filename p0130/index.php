<?php
	//Include (bibliothèques)
	//Inclure le fichier de la classe
	include('class.catalogue.php');
	include('class.movie.php');
	//Connexion DB
	include('connect.inc.php');
	
	/*
	Affiche le formulaire de sélection de film
	*/
	function getForm() {
		global $cat;
?>
	<form action="#" method="POST">
	<p>
		<?php $cat->getMoviesSelect();?>
		<input name="chooseMovie" id="chooseMovie" type="submit" value="Modifier"/>
		<input name="deleteMovie" id="deleteMovie" type="submit" value="Supprimer"/>
	</p>
	<p>
		<input name="showAddForm" id="showAddForm" type="submit" value="Ajouter un film"/>
	</p>
	</form>
<?php
	}
	/*
	Affiche le header
	*/
	function getHeader() {
?>
		<!DOCTYPE html>
		<html>
		<head>
		<title>Ajout de film</title>
		<meta charset="utf-8" />
		</head>
		<body>
<?php		
	}
	/*
	Affiche le footer
	*/
	function getFooter() {
?>
		</body>
		</html>
<?php		
	}
	getHeader();
	//Traitement
	$cat = new Catalogue();

	//Delete
	if( isset($_POST["deleteMovie"]) ) {
		$cat->removeMovie($_POST["filmId"]);
		printf("<p>Le film avec le PK:%d a été supprimé</p>", $_POST["filmId"]);
	}
	//Update
	if( isset($_POST["editMovie"]) ) {
		$movie = new Movie($_POST["PK_film"], $_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"]);
		echo "<p>Film modifié ainsi :</p>";
		$movie->getDetail();
	}
	//Add
	if( isset($_POST["addMovie"]) ) {
		$movie = new Movie($_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"]);
		echo "<p>Nouveau film créé :</p>";
		$movie->getDetail();
	}
	
	//Formulaires
	//Edition
	if( isset($_POST["chooseMovie"]) ) {
		$movie = new Movie($_POST["filmId"]);
		$movie->getEditForm();
	}
	//Ajout
	if( isset($_POST["showAddForm"]) ) {
		$movie = new Movie();
		$cat->addMovieForm();
	}
	if( !isset($_POST["chooseMovie"]) && !isset($_POST["showAddForm"]) ) {
		//Sélection
		getForm();
		//Liste des films
		$cat->getMoviesList();	
	}
	
	getFooter();
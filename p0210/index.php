<?php
	//Include (bibliothèques)
	//Inclure le fichier de la classe
	include('class.catalogue.php');
	include('class.movie.php');
	//Connexion DB
	include('connect.inc.php');
	//Fonctions utiles
	include('functions.php');
	
	getHeader();
	//Traitement
	$cat = new Catalogue();

	//Delete
	if( isset($_POST["deleteMovie"]) ) {
		$cat->removeMovie($_POST["PK_film"]);
		printf("<p>Le film avec le PK:%d a été supprimé</p>", $_POST["PK_film"]);
	}
	//Update
	if( isset($_POST["editMovie"]) ) {
		if(checkFields($_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"])) {
			$movie = new Movie($_POST["PK_film"], $_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"]);
			echo "<p>Film modifié ainsi :</p>";
			$movie->getDetail();
			uploadAffiche($movie->getPK());
		} else {
			echo "<p>Film non modifié</p>";
		}
	}
	//Add
	if( isset($_POST["addMovie"]) ) {
		if(checkFields($_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"])) {
			$movie = new Movie($_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"]);
			echo "<p>Nouveau film créé :</p>";
			$movie->getDetail();
			uploadAffiche($movie->getPK());
		} else {
			echo "<p>Film non ajouté</p>";
		}
	}
	
	//Affichage
	//Formulaire Edition
	$showList = true;
	if( isset($_POST["chooseMovie"]) ) {
		$movie = new Movie($_POST["PK_film"]);
		$movie->getEditForm();
		$showList = false;
	}
	//Formulaire Ajout
	if( isset($_POST["showAddForm"]) ) {
		$movie = new Movie();
		$cat->addMovieForm();
		$showList = false;
	}
	//Show detail
	if( isset($_POST["showMovie"]) ) {
		$movie = new Movie($_POST["PK_film"]);
		$movie->getFullDetail();
		$showList = false;
		echo '<p class="clear"><a href="">Retour à la liste des films</a></p>';
	}
	
	if( $showList ) {
		//Formulaire Sélection
		getForm();
		//Liste des films
		$cat->getMoviesList();	
	}
	
	getFooter();
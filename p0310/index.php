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
		$cat->removeMovie($_POST["filmId"]);
		printf("<p>Le film avec le PK:%d a été supprimé</p>", $_POST["filmId"]);
	}
	//Update
	if( isset($_POST["editMovie"]) ) {
		if(checkFields($_POST["filmTitre"], $_POST["filmAnnee"], $_POST["filmNomMES"], $_POST["filmPrenomMES"], $_POST["filmAnneeNaissanceMES"])) {
			$movie = new Movie($_POST["filmId"], $_POST["filmTitre"], $_POST["filmAnnee"], $_POST["filmNomMES"], $_POST["filmPrenomMES"], $_POST["filmAnneeNaissanceMES"]);
			echo "<p>Film modifié ainsi :</p>";
			$movie->getDetail();
			uploadAffiche($movie->getPK());
		} else {
			echo "<p>Film non modifié</p>";
		}
	}
	//Add
	if( isset($_POST["addMovie"]) ) {
		if(checkFields($_POST["filmTitre"], $_POST["filmAnnee"], $_POST["filmNomMES"], $_POST["filmPrenomMES"], $_POST["filmAnneeNaissanceMES"])) {
			$movie = new Movie($_POST["filmTitre"], $_POST["filmAnnee"], $_POST["filmNomMES"], $_POST["filmPrenomMES"], $_POST["filmAnneeNaissanceMES"]);
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
		$movie = new Movie($_POST["filmId"]);
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
		$movie = new Movie($_POST["filmId"]);
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
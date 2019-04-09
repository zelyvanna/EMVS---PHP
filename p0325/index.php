<?php
	//Include (bibliothèques)
	//Inclure le fichier de la classe
	include('class.catalogue.php');
	include('class.movie.php');
	//Connexion DB
	include('connect.inc.php');
	include('functions.php');
	getHeader();
?>
<?php
	$cat = new Catalogue();
	//Vote
	if( isset($_POST["vote"]) ) {
		$movie = new Movie($_POST["PK_film"]);
		$movie->setVote($_POST["note"]);
		$movie->getFullDetail();
	}
	//Show
	if( isset($_POST["showMovie"]) ) {
		$movie = new Movie($_POST["PK_film"]);
		$movie->getFullDetail();
	}
	//Delete
	if( isset($_POST["deleteMovie"]) ) {
		$cat->removeMovie($_POST["PK_film"]);
		printf("<p>Le film avec le PK:%d a été supprimé", $_POST["PK_film"]);
	}
	//Update
	if( isset($_POST["editMovie"]) ) {
		$movie = new Movie($_POST["PK_film"], $_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"]);
		if(is_uploaded_file($_FILES['photoAffiche']['tmp_name'])) {
		
			echo "Le fichier ".$_FILES['photoAffiche']['name'];
			echo " chargé avec succès";
			copy($_FILES['photoAffiche']['tmp_name'], "./affiches/{$movie->getPK()}.jpg");
		}
		echo "<p>Film modifié ainsi :</p>";
		$movie->getFullDetail();
	}
	//Add
	if( isset($_POST["addMovie"]) ) {
		$movie = new Movie($_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"]);
		if(is_uploaded_file($_FILES['photoAffiche']['tmp_name'])) {
			echo "Le fichier ".$_FILES['photoAffiche']['name'];
			echo " chargé avec succès";
			copy($_FILES['photoAffiche']['tmp_name'], "./affiches/{$movie->getPK()}.jpg");
		}
		echo "<p>Nouveau film créé :</p>";
		$movie->getDetail();
	}
?>
	<form action="#" method="POST">
	<p>
		<?php $cat->getMoviesSelect();?>
		<input name="showMovie" id="showMovie" type="submit" value="Afficher"/>
		<input name="chooseMovie" id="chooseMovie" type="submit" value="Modifier"/>
		<input name="deleteMovie" id="deleteMovie" type="submit" value="Supprimer"/>
	</p>
	<?php if( !isset($_POST["showAddForm"]) ): ?>
	<p>
		<input name="showAddForm" id="showAddForm" type="submit" value="Ajouter un film"/>
	</p>
	<?php endif;?>
	</form>
<?php
	//Formulaires
	
	//Edition
	if( isset($_POST["chooseMovie"]) ) {
		$movie = new Movie($_POST["PK_film"]);
		$movie->getEditForm();
	}
	//Ajout
	if( isset($_POST["showAddForm"]) ) {
		$cat->addMovieForm();
	}
	
	//Liste des films
	$cat->getMoviesList();
	
	getFooter();

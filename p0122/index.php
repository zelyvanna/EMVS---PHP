<?php
	//Include (bibliothèques)
	//Inclure le fichier de la classe
	include('class.catalogue.php');
	include('class.movie.php');
	//Connexion DB
	include('connect.inc.php');
	
	$cat = new Catalogue();
	
	if( isset($_POST["editMovie"]) ) {
		$movie = new Movie($_POST["PK_film"], $_POST["titreFilm"], $_POST["anneeFilm"], $_POST["nomMES"], $_POST["prenomMES"], $_POST["anneeNaissanceMES"]);
		echo "<p>Film modifié ainsi :</p>";
		$movie->getDetail();
	}
?>
	<form action="#" method="POST">
	<p>
		<?php $cat->getMoviesSelect();?>
		<input name="chooseMovie" id="chooseMovie" type="submit" value="Modifier"/>
	</p>
	</form>
<?php
	if( isset($_POST["chooseMovie"]) ) {
		$movie = new Movie($_POST["PK_film"]);
		$movie->getEditForm();
	}
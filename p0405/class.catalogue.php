<?php
class Catalogue {

	function Catalogue() {
	}
	function addMovieForm() {
?>
	<form action="#" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<p><label for="titreFilm">Titre&nbsp;:</label><input name="titreFilm" id="titreFilm" type="text" /></p>
		<p><label for="anneeFilm">Année&nbsp;:</label><input name="anneeFilm" id="anneeFilm" type="text" /></p>
		<p><input type="file" name="photoAffiche" /></p>
		<p><label for="nomMES">Nom MES&nbsp;:</label><input name="nomMES" id="nomMES" type="text" /></p>
		<p><label for="prenomMES">Prénom MES&nbsp;:</label><input name="prenomMES" id="prenomMES" type="text" /></p>
		<p><label for="anneeNaissanceMES">Année de naissance MES&nbsp;:</label><input name="anneeNaissanceMES" id="anneeNaissanceMES" type="text" /></p>
		<p><input name="addMovie" id="addMovie" type="submit" value="Ajout"/></p>
	</form>
<?php
	}
	function getMoviesSelect() {
		$pdo = getConnexion();
		
		//Requete SQL
		$sql = "SELECT * FROM tbl_film";
		$result = $pdo->query($sql);	
		
		echo '<select name="PK_film">';
		while($row =  $result->fetch()) {
			//Instancier (créer) un film
			$film = new Movie($row["PK_film"]);
			$film->getOption();
		}
		echo '</select>';
	}
	function getMoviesList() {
		$pdo = getConnexion();
		
		//Requete SQL
		$sql = "SELECT * FROM tbl_film";
		$result = $pdo->query($sql);	
		
		echo "<ul>\n";
		while($row =  $result->fetch()) {
			//Instancier (créer) un film
			$film = new Movie($row["PK_film"]);
			$film->getDetail();
		}
		echo "</ul>\n";
	}

	function removeMovie($pk) {
		$pdo = getConnexion();
		//Requete SQL
		$sql = sprintf("DELETE FROM tbl_film WHERE PK_film='%d'",$pk);
		$result = $pdo->query($sql);
	}
}
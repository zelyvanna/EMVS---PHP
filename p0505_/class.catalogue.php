<?php
class Catalogue {

	function Catalogue() {
	}
	function addMovieForm() {
?>
	<form action="#" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<p><label for="filmTitre">Titre&nbsp;:</label><input name="filmTitre" id="filmTitre" type="text" /></p>
		<p><label for="filmAnnee">Année&nbsp;:</label><input name="filmAnnee" id="filmAnnee" type="text" /></p>
		<p><input type="file" name="photoAffiche" /></p>
		<p><label for="filmNomMES">Nom MES&nbsp;:</label><input name="filmNomMES" id="filmNomMES" type="text" /></p>
		<p><label for="filmPrenomMES">Prénom MES&nbsp;:</label><input name="filmPrenomMES" id="filmPrenomMES" type="text" /></p>
		<p><label for="filmAnneeNaissanceMES">Année de naissance MES&nbsp;:</label><input name="filmAnneeNaissanceMES" id="filmAnneeNaissanceMES" type="text" /></p>
		<p><input name="addMovie" id="addMovie" type="submit" value="Ajout"/></p>
	</form>
<?php
	}
	function getMoviesSelect() {
		$pdo = getConnexion();
		
		//Requete SQL
		$sql = "SELECT * FROM tblFilm";
		$result = $pdo->query($sql);	
		
		echo '<select name="filmId">';
		while($row =  $result->fetch()) {
			//Instancier (créer) un film
			$film = new Movie($row["filmId"]);
			$film->getOption();
		}
		echo '</select>';
	}
	function getMoviesList() {
		$pdo = getConnexion();
		
		//Requete SQL
		$sql = "SELECT * FROM tblFilm";
		$result = $pdo->query($sql);	
		
		echo "<ul>\n";
		while($row =  $result->fetch()) {
			//Instancier (créer) un film
			$film = new Movie($row["filmId"]);
			$film->getDetail();
		}
		echo "</ul>\n";
	}

	function removeMovie($pk) {
		$pdo = getConnexion();
		//Requete SQL
		$sql = sprintf("DELETE FROM tblFilm WHERE filmId='%d'",$pk);
		$result = $pdo->query($sql);
	}
}
<?php
class Catalogue {

	function __construct() {
	}
		function addMovieForm() {
?>
	<form action="#" method="POST">
		<p><label for="titreFilm">Titre&nbsp;:</label><input name="titreFilm" id="titreFilm" type="text" /></p>
		<p><label for="anneeFilm">Année&nbsp;:</label><input name="anneeFilm" id="anneeFilm" type="text" /></p>
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
		$sql = "SELECT * FROM tblfilm";
		$result = $pdo->query($sql);	
		
		echo '<select name="filmId">';
		while($row =  $result->fetch()) {
			//Instancier (créer) un film
			$film = new Movie($row["filmId"]);
			$film->getOption();
		}
		echo '</select>';
	}
	public function getMoviesList() {
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
		
	public function removeMovie($pk) {
		$pdo = getConnexion();
		//Requete SQL
//		$sql = sprintf("DELETE FROM tbl_film WHERE PK_film='%d'",$pk);
		$sql = "DELETE FROM tblFilm WHERE filmId=$pk";
		$pdo->exec($sql);
	}
	
}
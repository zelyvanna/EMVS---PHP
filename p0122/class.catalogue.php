<?php
class Catalogue {

	function Catalogue() {
	}
	function getMoviesSelect() {
		$pdo = getConnexion();
		
		//Requete SQL
		$sql = "SELECT * FROM tblFilm";
		$result = $pdo->query($sql);	
		
		echo '<select name="PK_film">';
		while($row =  $result->fetch()) {
			//Instancier (créer) un film
			$film = new Movie($row["filmId"]);
			$film->getOption();
		}
		echo '</select>';
	}
}
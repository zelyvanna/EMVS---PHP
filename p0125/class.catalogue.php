<?php
class Catalogue {

	function __construct() {
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
	public function removeMovie($pk) {
		$pdo = getConnexion();
		//Requete SQL
//		$sql = sprintf("DELETE FROM tbl_film WHERE PK_film='%d'",$pk);
		$sql = "DELETE FROM tblFilm WHERE filmId=$pk";
		$pdo->exec($sql);
	}
}
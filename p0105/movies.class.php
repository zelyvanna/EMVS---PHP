<?php
class Movie{
	public function __construct(){


	}

	public function getMoviesList($conn){
		$sql = "SELECT * FROM tblfilm";
		$stmt = $conn->query($sql);

		foreach($stmt as $row){
			echo $row["filmTitre"].", paru en ".$row["filmAnnee"].", réalisé par ".$row["filmNomMES"].".<br />";
		}

	}
}
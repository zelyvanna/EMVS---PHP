<?php
class Movie{
	
	public function __construct(){
	$conn=getConnexion();
		if(func_num_args() == 0){
		//Si pas d'arguments -> Liste des films
			$this->getMoviesList($conn);
		}else if(func_num_args() == 1){
		//Si 1 argument -> récupère la valeur de l'argument et recherche le film correspondant
			$this->selectFilm($conn,func_get_arg(0));
		}else if(func_num_args() == 5){
		//Si 5 arguments -> Ajout d'un film dans la bdd
		
			//Récupération des arguments dans un tableau (array)
			$insert = array(func_get_arg(0),func_get_arg(1),func_get_arg(2),func_get_arg(3),func_get_arg(4));
			//Appel de la méthode d'ajout de film
			$this->addFilm($conn,$insert);
		}

	}

	public function getMoviesList($conn){
	//Affichage de la liste de tous les films
		$sql = "SELECT * FROM tblfilm";
		$stmt = $conn->query($sql);

		foreach($stmt as $row){
			echo $row["filmTitre"].", paru en ".$row["filmAnnee"].", réalisé par ".$row["filmNomMES"]." ".$row["filmPrenomMES"].".<br />";
		}

	}
	
	public function addFilm($conn,$insert){
	//Méthode d'ajout des films
		
		//Attribution à chaque champ une cellule du tableau des arguments ($insert)
		$titre=$insert[0];
		$annee=$insert[1];
		$nomMES=$insert[2];
		$prenomMES=$insert[3];
		$anneeMES=$insert[4];
		
		$sql = "INSERT INTO tblfilm(filmTitre,filmAnnee,filmNomMES,filmPrenomMES,filmAnneeNaissanceMES) VALUES('$titre',$annee,'$nomMES','$prenomMES',$anneeMES);";
		$conn->query($sql);
	}
	
	public function selectFilm($conn,$id){
	//Méthode d'affichage d'un film selon son id
	
		$sql = "SELECT * FROM tblfilm WHERE filmId = $id;";
		$stmt = $conn->query($sql);
		$row=$stmt->fetch();
		echo $row["filmTitre"].", paru en ".$row["filmAnnee"].", réalisé par ".$row["filmNomMES"]." ".$row["filmPrenomMES"].".<br />";
	}
	
}
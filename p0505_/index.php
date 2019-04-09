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
		$movie = new Movie($_POST["filmId"]);
		$movie->setVote($_POST["note"]);
		$movie->getFullDetail();
	}
	//Show
	if( isset($_POST["showMovie"]) ) {
		$movie = new Movie($_POST["filmId"]);
		$movie->getFullDetail();
	}
	//Delete
	if( isset($_POST["deleteMovie"]) ) {
		$cat->removeMovie($_POST["filmId"]);
		printf("<p>Le film avec le PK:%d a été supprimé", $_POST["filmId"]);
	}
	//Update
	if( isset($_POST["editMovie"]) ) {
		$movie = new Movie($_POST["filmId"], $_POST["filmTitre"], $_POST["filmAnnee"], $_POST["filmNomMES"], $_POST["filmPrenomMES"], $_POST["filmAnneeNaissanceMES"]);
		if(is_uploaded_file($_FILES['photoAffiche']['tmp_name'])) {
			$movie->updateAffiche();
		}
		echo "<p>Film modifié ainsi :</p>";
		$movie->getFullDetail();
	}
	//Add
	if( isset($_POST["addMovie"]) ) {
		$movie = new Movie($_POST["filmTitre"], $_POST["filmAnnee"], $_POST["filmNomMES"], $_POST["filmPrenomMES"], $_POST["filmAnneeNaissanceMES"]);
		if(is_uploaded_file($_FILES['photoAffiche']['tmp_name'])) {
			$movie->updateAffiche();
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
	<form action="#" method="POST">
		<p>
			<input title="Date de début" name="anneeSearchDebut" id="anneeSearchDebut" type="text" />
			<input title="Date de fin" name="anneeSearchFin" id="anneeSearchFin" type="text" />
			<input title="Titre du film" name="searchTitre" id="searchTitre" required type="text"/>
		</p>
		<p>
			<input name="searchMovie" id="searchMovie" type="submit" value="Rechercher"/>
		</p>
	</form>
<?php
	//Formulaires
	
	//Edition
	if( isset($_POST["chooseMovie"]) ) {
		$movie = new Movie($_POST["filmId"]);
		$movie->getEditForm();
	}
	//Ajout
	if( isset($_POST["showAddForm"]) ) {
		$cat->addMovieForm();
	}
	
	//Liste des films
	$cat->getMoviesList();

	//Recherche des films
	if(isset($_POST["searchMovie"])){
		if($_POST["anneeSearchDebut"]!=null && $_POST["anneeSearchFin"]){
			$anneeDebut = $_POST["anneeSearchDebut"];
			$anneeFin = $_POST["anneeSearchFin"];
		}else{
			$anneeDebut=null;
			$anneeFin=null;
		}
		if($_POST["searchTitre"]!=null){
			$titre = $_POST["searchTitre"];
			if($anneeDebut==null||$anneeFin == null){
				$sql = "SELECT * FROM tblFilm WHERE filmTitre LIKE '%{$titre}%'";
			}else if($anneeDebut >0  && $anneeFin > 0){
				$sql = "SELECT * FROM tblFilm WHERE filmTitre LIKE '%{$titre}%' AND filmAnnee <= {$anneeFin} AND filmAnnee >= {$anneeDebut}";

			}else{
				$sql = "SELECT * FROM tblFilm WHERE filmTitre LIKE '%{$titre}%'";
			}
			$pdo=getConnexion();
			$res = $pdo->query($sql);
			foreach($res as $row){
				$movie = new Movie($row["filmId"]);
				$movie->getDetail();
				?><form action="#" method="post"><input hidden type="text" value='<?php echo $row["filmId"]; ?>' /><input name="chooseMovie" id="chooseMovie" type="submit" value="Modifier"/></form><?php
			}
		}else {
			//Pas utile car champ en required
			echo "Veuillez entrer un titre dans le champ de recherche";
		}
	}

	getFooter();


<?php
class Movie {
	private $_filmId;
	private $_filmTitre;
	private $_filmAnnee;
	private $_filmNomMES;
	private $_filmPrenomMES;
	private $_filmAnneeNaissanceMES;


	function __construct() {
		$pdo = getConnexion();

		if(func_num_args() == 1) {
			// On récupère l'ID passé en paramètre
			$this->_filmId = func_get_arg(0);

			// Requête
			$sql = "SELECT * FROM tblfilm WHERE filmId = :filmId;";

			// Préparation de la requête
			$stmt = $pdo->prepare($sql);

			// Exécution de la requête
			$stmt->execute(array(':filmId'=>$this->_filmId));
			$film = $stmt->fetch();

			// Attribution de valeurs
			$this->_filmId = $film["filmId"];
			$this->_filmTitre = $film["filmTitre"];
			$this->_filmAnnee = $film["filmAnnee"];
			$this->_filmNomMES = $film["filmNomMES"];
			$this->_filmPrenomMES = $film["filmPrenomMES"];
			$this->_filmAnneeNaissanceMES = $film["filmAnneeNaissanceMES"];

			
		}

		if(func_num_args() == 5) {
			// Attribution de valeurs
			$this->_filmTitre = func_get_arg(0);
			$this->_filmAnnee = func_get_arg(1);
			$this->_filmNomMES = func_get_arg(2);
			$this->_filmPrenomMES = func_get_arg(3);
			$this->_filmAnneeNaissanceMES = func_get_arg(4);

			// Requête
			$sql = "INSERT INTO tblfilm(filmTitre, filmAnnee, filmNomMES, filmPrenomMES, filmAnneeNaissanceMES) VALUES(:filmTitre, :filmAnnee, :filmNomMES, :filmPrenomMES, :filmAnneeNaissanceMES);";

			// Préparartion de la requête
			$stmt = $pdo->prepare($sql);

			// Exécution de la requête
			$stmt->execute(array(':filmTitre'=>$this->_filmTitre, ':filmAnnee'=>$this->_filmAnnee, ':filmNomMES'=>$this->_filmNomMES, ':filmPrenomMES'=>$this->_filmPrenomMES, ':filmAnneeNaissanceMES'=>$this->_filmAnneeNaissanceMES));
		}

		if(func_num_args() == 6) {
			// Attribution de valeurs
			$this->_filmId = func_get_arg(0);
			$this->_filmTitre = func_get_arg(1);
			$this->_filmAnnee = func_get_arg(2);
			$this->_filmNomMES = func_get_arg(3);
			$this->_filmPrenomMES = func_get_arg(4);
			$this->_filmAnneeNaissanceMES = func_get_arg(5);

			// Requête
			$sql = "UPDATE tblfilm SET filmTitre = :filmTitre, filmAnnee = :filmAnnee, filmNomMES = :filmNomMES, filmPrenomMES = :filmPrenomMES, filmAnneeNaissanceMES = :filmAnneeNaissanceMES WHERE filmId = :filmId;";

			// Préparation de la requête
			$stmt = $pdo->prepare($sql);

			// Exécution de la requête
			$stmt->execute(array(':filmTitre'=>$this->_filmTitre, ':filmAnnee'=>$this->_filmAnnee, ':filmNomMES'=>$this->_filmNomMES, ':filmPrenomMES'=>$this->_filmPrenomMES, ':filmAnneeNaissanceMES'=>$this->_filmAnneeNaissanceMES, ':filmId'=>$this->_filmId));
		}
	}

	public function getPK() {
		return $this->_filmId;
	}

	function updateAffiche() {
		$width = 200;
		$height = 300;
		$delta_x = 0;
		$delta_y = 0;

		//Récupérer les dimensions de l'image chargée
		list($width_orig, $height_orig) = getimagesize($_FILES['filmAffiche']['tmp_name']);
		echo "Le fichier ".$_FILES['filmAffiche']['name'];
		echo " chargé avec succès";

		//L'image est-elle trop large ?
		if( ($width_orig / $height_orig * $height) > $width ) {
			$delta_x = ($width_orig - $width / $height * $height_orig) / 2;
		} else {
			$delta_y = ($height_orig - $height / $width * $width_orig) / 2;
		}

		/*
		echo "deltax:$delta_x";
		echo "deltay:$delta_y";
		*/

		//Création de l'image aux bonnes dimensions
		$affiche_new = imagecreatetruecolor($width, $height);
		$affiche = imagecreatefromjpeg($_FILES['filmAffiche']['tmp_name']);

		//Redimensionnement de l'image
		if(imagecopyresampled($affiche_new, $affiche, 0, 0, $delta_x, $delta_y, $width, $height, $width_orig-2*$delta_x, $height_orig-2*$delta_y)) {
			echo " - image redimensionnée avec succès";
			// Enregistrement
			imagejpeg($affiche_new, "./affiches/{$this->_filmId}.jpg", 100);
			imagedestroy($affiche_new);
		}
	}

	function getEditForm() {
?>
	<form action="#" method="POST" enctype="multipart/form-data">
		<input type="hidden" name="filmId" value="<?php echo $this->_filmId;?>" /> 
		<p><input type="hidden" name="MAX_FILE_SIZE" value="2000000" /></p>
		<p><label for="filmTitre">Titre&nbsp;:</label><input name="filmTitre" id="filmTitre" type="text" value="<?php echo $this->_filmTitre;?>"/></p>
		<p><label for="filmAnnee">Année&nbsp;:</label><input name="filmAnnee" id="filmAnnee" type="text" value="<?php echo $this->_filmAnnee;?>"/></p>
		<p><label for="filmAffiche">Affiche&nbsp;:</label><input name="filmAffiche" id="filmAffiche" type="file" /></p>
		<p><label for="filmNomMES">Nom MES&nbsp;:</label><input name="filmNomMES" id="filmNomMES" type="text" value="<?php echo $this->_filmNomMES;?>"/></p>
		<p><label for="filmPrenomMES">Prénom MES&nbsp;:</label><input name="filmPrenomMES" id="filmPrenomMES" type="text" value="<?php echo $this->_filmPrenomMES;?>"/></p>
		<p><label for="filmAnneeNaissanceMES">Année de naissance MES&nbsp;:</label><input name="filmAnneeNaissanceMES" id="filmAnneeNaissanceMES" type="text" value="<?php echo $this->_filmAnneeNaissanceMES;?>"/></p>
		<p><input name="editMovie" id="editMovie" type="submit" value="Mettre à jour"/></p>
	</form>


<?php
	}

	function getSearchForm(){
?>
	<form action="#" method="POST">
		<p><label for="filmAnneeDebut">Année début&nbsp;:</label><input name="filmAnneeDebut" id="filmAnneeDebut" type="text" /></p>
		<p><label for="filmAnneeFin">Année fin&nbsp;:</label><input name="filmAnneeFin" id="filmAnneeFin" type="text" /></p>
		<p><label for="filmTitre">Titre&nbsp;:</label><input name="filmTitre" id="filmTitre" type="text" required /></p>
		<p><input name="searchMovie" id="searchMovie" type="submit" value="Rechercher"/></p>
	</form>

<?php
	}


	function getFullDetail() {
?>
	<div id="detail">
	<h1><?php echo $this->_filmTitre; ?></h1>
		<div id="description">
			<p><span class="legend">Année : </span><?php echo $this->_filmAnnee; ?></p>
			<h2>Metteur en scène</h2>
			<p><span class="legend">Prénom : </span><?php echo $this->_filmPrenomMES; ?></p>
			<p><span class="legend">Nom : </span><?php echo $this->_filmNomMES; ?></p>
			<p><span class="legend">Année : </span><?php echo $this->_filmAnneeNaissanceMES; ?></p>
			<h2>Votes</h2>
			<form action="#" method="POST">
				<p>
					<span class="legend">Note :</span>
					<input type="hidden" name="filmId" value="<?php echo $this->_filmId; ?>" />
					<select name="note">
					<?php
						for($i=0; $i<=5; $i++) {
							echo "<option value='".$i."' >".$i."</option>\n";
						}
					?>
					</select>
					<input type="submit" value="Voter" name="vote" />
				</p>
			</form>
			<p><span class="legend">Moyenne :</span><?php echo $this->getVoteResult(); ?></p>
			<div id="voteResult">
				<div style="width:<?php echo $this->getVotePercent(); ?>%"></div>
			</div>
		</div>
		<div id="affiche">
			<img src="affiches/<?php echo $this->_filmId; ?>.jpg" alt="affiche de '<?php echo $this->_filmTitre; ?>'" />
		</div>
	</div>
	
<?php
	}


	function getDetail() {
		echo "<li>" . $this->_filmTitre . ", paru en ". $this->_filmAnnee . ", réalisé par " . $this->_filmNomMES . " " . $this->_filmPrenomMES . "<br />";
	}

	function getOption() {
?>
		<option value="<?php echo $this->_filmId;?>"><?php echo $this->_filmTitre;?></option>
<?php
	}

	function setVote($note) {
		$pdo = getConnexion();
		$sql = "INSERT INTO tblvote(tblFilm_filmId, voteNote) VALUES(:tblFilm_filmId, :voteNote);";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':tblFilm_filmId'=>$this->_filmId, ':voteNote'=>$note));
	}

	function getVoteResult() {
		$pdo = getConnexion();
		$sql = "SELECT IFNULL(avg(voteNote), 0) AS Moyenne, IFNULL(count(voteNote), 0) as Nombre FROM tblvote WHERE tblFilm_filmId = " . $this->_filmId;
		$result = $pdo->query($sql);
		$row = $result->fetch();
		return sprintf("%1.2f / %d", $row["Moyenne"], $row["Nombre"]);
	}

	function getVotePercent() {
		$pdo = getConnexion();
		$sql = "SELECT avg(voteNote) AS Moyenne FROM tblvote WHERE tblFilm_filmId = " . $this->_filmId;
		$result = $pdo->query($sql);
		$row = $result->fetch();
		return sprintf("%1.2f", $row["Moyenne"]*20);
	}

}


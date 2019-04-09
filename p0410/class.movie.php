<?php
class Movie {
	private $pk;
	private $titre;
	private $annee;
	private $nomMES;
	private $prenomMES;
	private $anneeNaissanceMES;

	function Movie() {
		$pdo = getConnexion();
		switch(func_num_args()) {
			case 1:
				//Recuperation du film
				$sql = "SELECT * FROM tbl_film WHERE PK_film = ".func_get_arg(0);
				$result = $pdo->query($sql);
				$film = $result->fetch();
				$this->pk = $film["PK_film"];
				$this->titre = $film["titreFilm"];
				$this->annee = $film["anneeFilm"];
				$this->nomMES = $film["nomMES"];
				$this->prenomMES = $film["prenomMES"];
				$this->anneeNaissanceMES = $film["anneeNaissanceMES"];				
				break;
			case 5:
				$sql = sprintf("INSERT INTO tbl_film (`titreFilm`, `anneeFilm`, `nomMES`, `prenomMES`, `anneeNaissanceMES`) 
				VALUES ('%s', '%d', '%s', '%s', '%d')",
					addslashes(func_get_arg(0)),
					func_get_arg(1),
					addslashes(func_get_arg(2)),
					addslashes(func_get_arg(3)),
					func_get_arg(4)
				);
				$result = $pdo->exec($sql);
				$this->pk = $pdo->lastInsertId();
				$this->titre = func_get_arg(0);
				$this->annee = func_get_arg(1);
				$this->nomMES = func_get_arg(2);
				$this->prenomMES = func_get_arg(3);
				$this->anneeNaissanceMES = func_get_arg(4);
				break;
			case 6:
				$sql = sprintf("UPDATE tbl_film SET `titreFilm` = '%s', `anneeFilm` = '%d', `nomMES` = '%s', `prenomMES` = '%s', `anneeNaissanceMES` = '%d' 
				WHERE PK_film = '%d'",
					addslashes(func_get_arg(1)),
					func_get_arg(2),
					addslashes(func_get_arg(3)),
					addslashes(func_get_arg(4)),
					func_get_arg(5),
					func_get_arg(0)
				);
				$result = $pdo->exec($sql);
				$this->pk = func_get_arg(0);
				$this->titre = func_get_arg(1);
				$this->annee = func_get_arg(2);
				$this->nomMES = func_get_arg(3);
				$this->prenomMES = func_get_arg(4);
				$this->anneeNaissanceMES = func_get_arg(5);
				break;
		}
	}
	function getPK() {
		return $this->pk;
	}
	function updateAffiche() {
		$width = 200;
		$height = 300;
		$delta_x = 0;
		$delta_y = 0;
		//Récupérer les dimensions de l'image chargée
		list($width_orig, $height_orig) = getimagesize($_FILES['photoAffiche']['tmp_name']);
		echo "Le fichier ".$_FILES['photoAffiche']['name'];
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
		$affiche = imagecreatefromjpeg($_FILES['photoAffiche']['tmp_name']);
		//Redimensionnement de l'image
		if(imagecopyresampled($affiche_new, $affiche, 0, 0, $delta_x, $delta_y, $width, $height, $width_orig-2*$delta_x, $height_orig-2*$delta_y) ) {
			echo "image redimensionnée avec succès";
			// Enregistrement
			imagejpeg($affiche_new, "./affiches/{$this->pk}.jpg", 100);
			imagedestroy($affiche_new);
		}
	}
	
	function getEditForm() {
?>
	<form action="#" enctype="multipart/form-data" method="POST">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<input type="hidden" name="PK_film" value="<?php echo $this->pk;?>" /> 
		<p><label for="titreFilm">Titre&nbsp;:</label><input name="titreFilm" id="titreFilm" type="text" value="<?php echo $this->titre;?>"/></p>
		<p><label for="anneeFilm">Année&nbsp;:</label><input name="anneeFilm" id="anneeFilm" type="text" value="<?php echo $this->annee;?>"/></p>
		<p><input type="file" name="photoAffiche" /></p>
		<p><label for="nomMES">Nom MES&nbsp;:</label><input name="nomMES" id="nomMES" type="text" value="<?php echo $this->nomMES;?>"/></p>
		<p><label for="prenomMES">Prénom MES&nbsp;:</label><input name="prenomMES" id="prenomMES" type="text" value="<?php echo $this->prenomMES;?>"/></p>
		<p><label for="anneeNaissanceMES">Année de naissance MES&nbsp;:</label><input name="anneeNaissanceMES" id="anneeNaissanceMES" type="text" value="<?php echo $this->anneeNaissanceMES;?>"/></p>
		<p><input name="editMovie" id="editMovie" type="submit" value="Mettre à jour"/></p>
	</form>
<?php
		
	}
	function getFullDetail() {
?>
	<h1><?php echo $this->titre; ?></h1>
	<div id="description">
		<p><span class="legend">Année :</span><?php echo $this->annee; ?></p>
		<h2>Metteur en scène</h2>
		<p><span class="legend">Prénom :</span><?php echo $this->prenomMES; ?></p>
		<p><span class="legend">Nom :</span><?php echo $this->nomMES; ?></p>
		<p><span class="legend">Année :</span><?php echo $this->anneeNaissanceMES; ?></p>
		<h2>Votes</h2>
		<form action="#" method="POST">
		<p><span class="legend">Note :</span>
		<input type="hidden" name="PK_film" value="<?php echo $this->pk; ?>" />
		<select name="note">
		<?php 
			for($i=0;$i<=5; $i++) {
				printf('<option value="%d">%d</option>\n', $i, $i);
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
		<img src="affiches/<?php echo $this->pk; ?>.jpg" alt="<?php echo $this->titre; ?>" />
	</div>
<?php
	}
	
	function getDetail() {
		printf(
			"<li>%d:%s, paru en %d, réalisé par %s %s</li>\n",
			$this->pk, $this->titre, $this->annee, $this->prenomMES, $this->nomMES
		);
	}
	
	function getOption() {
?>
	<option value="<?php echo $this->pk;?>"><?php echo $this->titre;?></option>
<?php
	}
	
	function setVote($note) {
		$pdo = getConnexion();
		$sql = sprintf("INSERT INTO tbl_vote (`VNote`, `FK_NoFilm`) 
		VALUES ('%d', '%d')",
			$note,
			$this->pk
		);
		$result = $pdo->exec($sql);
	}
	
	function getVoteResult() {
		$pdo = getConnexion();
		$sql = "SELECT avg(VNote) AS Moyenne, count(VNote) as Nombre FROM `tbl_vote` WHERE `FK_NoFilm` = ".$this->pk;
		$result = $pdo->query($sql);
		$row = $result->fetch();
		return sprintf("%1.2f / %d", $row["Moyenne"], $row["Nombre"]);
	}
	function getVotePercent() {
		$pdo = getConnexion();
		$sql = "SELECT avg(VNote) AS Moyenne FROM `tbl_vote` WHERE `FK_NoFilm` = ".$this->pk;
		$result = $pdo->query($sql);
		$row = $result->fetch();
		return sprintf("%1.2f", $row["Moyenne"]*20);
	}
}
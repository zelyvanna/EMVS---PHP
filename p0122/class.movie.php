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
				$sql = "SELECT * FROM tblfilm WHERE filmId = ".func_get_arg(0);
				$result = $pdo->query($sql);
				$film = $result->fetch();
				$this->pk = $film["filmId"];
				$this->titre = $film["filmTitre"];
				$this->annee = $film["filmAnnee"];
				$this->nomMES = $film["filmNomMES"];
				$this->prenomMES = $film["filmPrenomMES"];
				$this->anneeNaissanceMES = $film["filmAnneeNaissanceMES"];				
				break;
			case 5:
				$sql = sprintf("INSERT INTO tblfilm (`filmTitre`, `filmAnnee`, `filmNomMES`, `filmPrenomMES`, `filmAnneeNaissanceMES`) 
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
				$sql = sprintf("UPDATE tblfilm SET `filmTitre` = '%s', `filmAnnee` = '%d', `filmNomMES` = '%s', `filmPrenomMES` = '%s', `filmAnneeNaissanceMES` = '%d' 
				WHERE filmId = '%d'",
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
	function getEditForm() {
?>
	<form action="#" method="POST">
		<input type="hidden" name="PK_film" value="<?php echo $this->pk;?>" /> 
		<p><label for="titreFilm">Titre&nbsp;:</label><input name="titreFilm" id="titreFilm" type="text" value="<?php echo $this->titre;?>"/></p>
		<p><label for="anneeFilm">Année&nbsp;:</label><input name="anneeFilm" id="anneeFilm" type="text" value="<?php echo $this->annee;?>"/></p>
		<p><label for="nomMES">Nom MES&nbsp;:</label><input name="nomMES" id="nomMES" type="text" value="<?php echo $this->nomMES;?>"/></p>
		<p><label for="prenomMES">Prénom MES&nbsp;:</label><input name="prenomMES" id="prenomMES" type="text" value="<?php echo $this->prenomMES;?>"/></p>
		<p><label for="anneeNaissanceMES">Année de naissance MES&nbsp;:</label><input name="anneeNaissanceMES" id="anneeNaissanceMES" type="text" value="<?php echo $this->anneeNaissanceMES;?>"/></p>
		<p><input name="editMovie" id="editMovie" type="submit" value="Mettre à jour"/></p>
	</form>
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
}
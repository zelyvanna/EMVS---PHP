<?php
class Movie {
	private $_pk;
	private $_titre;
	private $_annee;
	private $_nomMES;
	private $_prenomMES;
	private $_anneeNaissanceMES;

	function __construct() {
		$pdo = getConnexion();
		switch(func_num_args()) {
			case 1:
				//Recuperation du film
				$sql = "SELECT * FROM tblFilm WHERE filmId = ".func_get_arg(0);
				$result = $pdo->query($sql);
				$film = $result->fetch();
				$this->_pk = $film["filmId"];
				$this->_titre = $film["filmTitre"];
				$this->_annee = $film["filmAnnee"];
				$this->_nomMES = $film["filmNomMES"];
				$this->_prenomMES = $film["filmPrenomMES"];
				$this->_anneeNaissanceMES = $film["filmAnneeNaissanceMES"];				
				break;
			case 5:
				$sql = sprintf("INSERT INTO tblFilm (`filmTitre`, `filmAnnee`, `filmNomMES`, `filmPrenomMES`, `filmAnneeNaissanceMES`) 
				VALUES ('%s', '%d', '%s', '%s', '%d')",
					addslashes(func_get_arg(0)),
					func_get_arg(1),
					addslashes(func_get_arg(2)),
					addslashes(func_get_arg(3)),
					func_get_arg(4)
				);
				$result = $pdo->exec($sql);
				$this->_pk = $pdo->lastInsertId();
				$this->_titre = func_get_arg(0);
				$this->_annee = func_get_arg(1);
				$this->_nomMES = func_get_arg(2);
				$this->_prenomMES = func_get_arg(3);
				$this->_anneeNaissanceMES = func_get_arg(4);
				break;
			case 6:
				$sql = sprintf("UPDATE tblFilm SET `filmTitre` = '%s', `filmAnnee` = '%d', `filmNomMES` = '%s', `filmPrenomMES` = '%s', `filmAnneeNaissanceMES` = '%d' 
				WHERE filmId = '%d'",
					addslashes(func_get_arg(1)),
					func_get_arg(2),
					addslashes(func_get_arg(3)),
					addslashes(func_get_arg(4)),
					func_get_arg(5),
					func_get_arg(0)
				);
				$result = $pdo->exec($sql);
				$this->_pk = func_get_arg(0);
				$this->_titre = func_get_arg(1);
				$this->_annee = func_get_arg(2);
				$this->_nomMES = func_get_arg(3);
				$this->_prenomMES = func_get_arg(4);
				$this->_anneeNaissanceMES = func_get_arg(5);
				break;
		}
	}
	function getEditForm() {
?>
	<form action="#" method="POST">
		<input type="hidden" name="PK_film" value="<?php echo $this->_pk;?>" /> 
		<p><label for="titreFilm">Titre&nbsp;:</label><input name="titreFilm" id="titreFilm" type="text" value="<?php echo $this->_titre;?>"/></p>
		<p><label for="anneeFilm">Année&nbsp;:</label><input name="anneeFilm" id="anneeFilm" type="text" value="<?php echo $this->_annee;?>"/></p>
		<p><label for="nomMES">Nom MES&nbsp;:</label><input name="nomMES" id="nomMES" type="text" value="<?php echo $this->_nomMES;?>"/></p>
		<p><label for="prenomMES">Prénom MES&nbsp;:</label><input name="prenomMES" id="prenomMES" type="text" value="<?php echo $this->_prenomMES;?>"/></p>
		<p><label for="anneeNaissanceMES">Année de naissance MES&nbsp;:</label><input name="anneeNaissanceMES" id="anneeNaissanceMES" type="text" value="<?php echo $this->_anneeNaissanceMES;?>"/></p>
		<p><input name="editMovie" id="editMovie" type="submit" value="Mettre à jour"/></p>
	</form>
<?php
		
	}
	
	function getDetail() {
		printf(
			"<li>%d:%s, paru en %d, réalisé par %s %s</li>\n",
			$this->_pk, $this->_titre, $this->_annee, $this->_prenomMES, $this->_nomMES
		);
	}
	
	function getOption() {
		//printf('<option value="%d">%s</option>', $this->_pk, $this->_titre);
?>
	<option value="<?php echo $this->_pk;?>"><?php echo $this->_titre;?></option>
<?php
	}
}
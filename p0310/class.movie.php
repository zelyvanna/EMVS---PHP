<?php
class Movie {
	private $_pk;
	private $_titre;
	private $_annee;
	private $_filmNomMES;
	private $_filmPrenomMES;
	private $_filmAnneeNaissanceMES;

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
				$this->_filmNomMES = $film["filmNomMES"];
				$this->_filmPrenomMES = $film["filmPrenomMES"];
				$this->_filmAnneeNaissanceMES = $film["filmAnneeNaissanceMES"];				
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
				$this->_filmNomMES = func_get_arg(2);
				$this->_filmPrenomMES = func_get_arg(3);
				$this->_filmAnneeNaissanceMES = func_get_arg(4);
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
				$this->_filmNomMES = func_get_arg(3);
				$this->_filmPrenomMES = func_get_arg(4);
				$this->_filmAnneeNaissanceMES = func_get_arg(5);
				break;
		}
	}
	public function getPK() {
		return $this->_pk;
	}
	function getEditForm() {
?>
	<form action="#" enctype="multipart/form-data" method="POST" class="simpleForm">
		<input type="hidden" name="filmId" value="<?php echo $this->_pk;?>" /> 
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
		<p><label for="filmTitre">Titre&nbsp;:</label><input name="filmTitre" id="filmTitre" type="text" value="<?php echo $this->_titre;?>"/></p>
		<p><label for="filmAnnee">Année&nbsp;:</label><input name="filmAnnee" id="filmAnnee" type="text" value="<?php echo $this->_annee;?>"/></p>
		<p><label for="affiche">Affiche&nbsp;:</label><input name="affiche" id="affiche" type="file" /></p>
		<p><label for="filmNomMES">Nom MES&nbsp;:</label><input name="filmNomMES" id="filmNomMES" type="text" value="<?php echo $this->_filmNomMES;?>"/></p>
		<p><label for="filmPrenomMES">Prénom MES&nbsp;:</label><input name="filmPrenomMES" id="filmPrenomMES" type="text" value="<?php echo $this->_filmPrenomMES;?>"/></p>
		<p><label for="filmAnneeNaissanceMES">Année de naissance MES&nbsp;:</label><input name="filmAnneeNaissanceMES" id="filmAnneeNaissanceMES" type="text" value="<?php echo $this->_filmAnneeNaissanceMES;?>"/></p>
		<p><input name="editMovie" id="editMovie" type="submit" value="Mettre à jour"/></p>
	</form>
<?php
	}
	
	function getFullDetail() {
?>
	<div id="detail">
	<h1><?php echo $this->_titre; ?></h1>
	<div id="description">
		<p><span class="legend">Année :</span><?php echo $this->_annee; ?></p>
		<h2>Metteur en scène</h2>
		<p><span class="legend">Prénom :</span><?php echo $this->_filmPrenomMES; ?></p>
		<p><span class="legend">Nom :</span><?php echo $this->_filmNomMES; ?></p>
		<p><span class="legend">Année :</span><?php echo $this->_filmAnneeNaissanceMES; ?></p>
	</div>
	<div id="affiche">
		<img src="img/<?php echo $this->_pk; ?>.jpg" alt="affiche de '<?php echo $this->_titre; ?>'" />
	</div>
	</div>
<?php
	}
	
	
	function getDetail() {
		printf(
			"<li>%d:%s, paru en %d, réalisé par %s %s</li>\n",
			$this->_pk, $this->_titre, $this->_annee, $this->_filmPrenomMES, $this->_filmNomMES
		);
	}
	
	function getOption() {
		//printf('<option value="%d">%s</option>', $this->_pk, $this->_titre);
?>
	<option value="<?php echo $this->_pk;?>"><?php echo $this->_titre;?></option>
<?php
	}
}
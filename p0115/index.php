<?php
require('connect.inc.php');
require('movies.class.php');

//============
// Connexion
//============
getConnexion();
//==========================================
// Affichage liste films sous forme de texte
//==========================================

//$Movie = new Movie('Baptiste 2 le retour de la vengeance de ouai toi aussi',1800,'Poquelin','Jean-Baptiste',1700);
?>
<form method='GET' href='#'>
	<fieldset>
		<legend>Film</legend>
		Titre : <input name='filmTitre' type=text />
		Année de création : <input name='filmAnnee' type=text />
	</fieldset>
	<fieldset>
		<legend>Auteur</legend>
		Nom de famille : <input name='filmNomMES' type=text />
		Prénom : <input name='filmPrenomMES' type=text />
		Année de naissance : <input name='filmAnneeMES' type=text />
	</fieldset>
	
	<input name='create' type='submit' value = 'Ajout du film'/>
</form>

<?php

if(isset($_GET["create"])){
	echo "Film ".$_GET["filmTitre"]." Créé";
	$Movie= new Movie($_GET["filmTitre"],$_GET["filmAnnee"],$_GET["filmNomMES"],$_GET["filmPrenomMES"],$_GET["filmAnneeMES"]);
	echo"<br />";
}

$Movie= new Movie();
//$Movie->getMoviesList(getConnexion());

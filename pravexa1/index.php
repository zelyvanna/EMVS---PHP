<?php

include('connect.inc.php');
include('class.equipe.php');

$pdo = getConnexion();

?>


<html>
	<head>
		<title>Praz Vincent</title>
	<head>
	<body>
		<form action='#' method='POST'>
			<?php
				$equipe = new Equipe();
				$equipe->listEquipe();
			?>
			<input type='button' value='Ajouter une equipe' name='addEquipe' id='addEquipe'/>
			<?php
				if( isset($_POST["addEquipe"]) ) {
				//Récuperer ou créer un formulaire d'ajout d'équipe
									
				}
			?>
		</form>
	</body>


</html>
<?php
if( isset($_POST["deleteEquipe"]) ) {
		$equipe->deleteEquipe($_POST["equId"]);
		printf("<p>Le film avec le PK:%d a été supprimé</p>", $_POST["equId"]);
	}
	

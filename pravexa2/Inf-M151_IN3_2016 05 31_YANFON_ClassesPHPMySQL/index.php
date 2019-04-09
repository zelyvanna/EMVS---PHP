<?php
	//Include (bibliothèques)
	//Inclure le fichier de la classe
	include('class.espece.php');
	include('class.animal.php');
	//Connexion DB
	include('connect.inc.php');
	include('functions.php');
	getHeader();

	// Liste des animaux 
	echo '<h4>Mon zoo</h4>'.PHP_EOL;
	
	$pdo = getConnexion();

	// traitement des POST
	if (isset($_POST["hdAnimal"]))
	{
		$animal = new Animal();
		
		if ($_POST["hdAnimal"] == "add")
		{
			$animal->Ajoute($_POST["selEspece"], $_POST["txtNom"], $_POST["txtNomScient"], $_POST["txtNbPattes"]);
			echo "<div class='divMessage'>Animal ".$_POST["txtNom"]." ajouté avec succès</div>";
		}
	}
	
	if (isset($_POST["hdEspece"]))
	{
		$espece = new Espece();
		
		if ($_POST["hdEspece"] == "add")
		{
			$espece->Ajoute($_POST["txtNom"], $_POST["ckbEstActive"]);
			echo "<div class='divMessage'>Espèce ".$_POST["txtNom"]." ajouté avec succès</div>";
		}
	}
	
	// Traitement des formulaires
	if (isset($_GET["animal"]))
	{
		$animal = new Animal();
		
		if ($_GET["animal"] == "add")
		{
			echo '<h5>Ajout d\'un animal</h5>'.PHP_EOL;
			$animal->DisplayAddForm();
		}
		elseif ($_GET["animal"] == "del")
		{
			$animal->Supprime($_GET["id"]);
			echo '<div class="divMessage">Animal n°'.$_GET["id"].' supprimé avec succès</div>';
			echo '<br><div class="divMessage"><input type="button" id="btnCancel" name="btnCancel" value="Retour" onclick="window.location=\'index.php\';"></div>'.PHP_EOL;
		}
	}
	elseif (isset($_GET["espece"]))
	{
		$espece = new Espece();
		
		if ($_GET["espece"] == "add")
		{
			echo '<h5>Ajout d\'une espèce</h5>'.PHP_EOL;
			$espece->DisplayAddForm();
		}
		elseif ($_GET["espece"] == "del")
		{
			$espece->Supprime($_GET["id"]);
			echo '<div class="divMessage">Espèce n°'.$_GET["id"].' supprimé avec succès</div>';
			echo '<br><div class="divMessage"><input type="button" id="btnCancel" name="btnCancel" value="Retour" onclick="window.location=\'index.php\';"></div>'.PHP_EOL;
		}
	}
	else
	{
		// Affichage de la liste
		//////////////////////////////////////////
		// Exercice 1
		//////////////////////////////////////////

		//Requete de selection de tous les animaux
		?>
		<table>
			<tr>
				<th>Espèce</th><th>Nom</th><th>Nom Scientifique</th><th></th>
			</tr>

		<?php
		$sql = "SELECT * FROM tblanimal INNER JOIN tblespece ON tblespece_espId = espId;";
		$pdo = getConnexion();
		$resAnimaux = $pdo->query($sql);
		$couleur = 0;
		foreach ($resAnimaux as $row){
			$esp = $row["espNom"];
			$nomAnimal = $row["aniNom"];
			$nomScientifique = $row["aniNomScient"];
			$anId = $row["aniID"];
			if($couleur%2 != 0){
                echo"<tr style='background-color: #C0C0C0'>";
			}
			else{
			echo"<tr>";
			}
			$couleur++;


			//Suppression problème ?
			?>
				<td><?php echo $esp; ?></td><td><?php echo $nomAnimal ; ?></td><td><?php echo $nomScientifique; ?></td><td><a href="index.php?animal=del&id=<?php echo $anId ;?>">supprimer</a></td>
			</tr>
			<?php

		}

		
		echo '</table><br><br><a href="index.php?animal=add">Ajouter un animal</a>';
		echo '<br><a href="index.php?espece=add">Ajouter une espèce</a>';
	}
	
	getFooter();

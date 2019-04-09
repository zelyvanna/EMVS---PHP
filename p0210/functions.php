<?php
	/*
	Affiche le header
	*/
	function getHeader() {
?>
		<!DOCTYPE html>
		<html>
		<head>
		<title>Ajout de film</title>
		<meta charset="utf-8" />
		<style>
			#detail h1{
				text-align: center;
			}
			#detail #description {
				width:50%;
				float:left;
			}
			#detail #affiche {
				width:50%;
				float:left;
				clear:right;
			}
			#detail#affiche img {
				width:100%;
			}
			#detail .legend {
				font-weight:bold;
				width: 50%;
				display: inline-block
			}
			.simpleForm input[type=submit] {
				margin-left:200px;
			}
			label {
				text-align: right;
				margin-right: 20px;
				width: 180px;
				display: inline-block
			}
			.clear {
				clear:both;
			}
			#showMovie {
			  margin-right: 30px;
			}
		</style>
		</head>
		<body>
<?php		
	}
	/*
	Affiche le footer
	*/
	function getFooter() {
?>
		</body>
		</html>
<?php		
	}
	
	/*
	Affiche le formulaire de sélection de film
	*/
	function getForm() {
		global $cat;
?>
	<form action="#" method="POST">
	<p>
		<?php $cat->getMoviesSelect();?>
		<input name="showMovie" id="showMovie" type="submit" value="Afficher"/>
		<input name="chooseMovie" id="chooseMovie" type="submit" value="Modifier"/>
		<input name="deleteMovie" id="deleteMovie" type="submit" value="Supprimer"/>
	</p>
	<p>
		<input name="showAddForm" id="showAddForm" type="submit" value="Ajouter un film"/>
	</p>
	</form>
<?php
	}
	/* Upload de l'affiche*/
	function uploadAffiche($pk) {
		global $_FILES;
		if(is_uploaded_file($_FILES['affiche']['tmp_name'])) {
			print_r($_FILES['affiche']);
			//Vérification
			if($_FILES['affiche']['type'] == 'image/jpeg' && //est une image jpeg
			$_FILES['affiche']['size'] < 2000000) { // moins de 800 ko
			echo "Le fichier ".$_FILES['affiche']['name'];
			echo " chargé avec succès";
				copy($_FILES['affiche']['tmp_name'], "./img/$pk.jpg");
			}
		}
	}
	
	function checkFields($titre, $annee, $nomMES, $prenomMES, $anneeNaissanceMES) {
		if ( empty($titre) ) {
			return false;
		}
		if( empty($nomMES) || empty($prenomMES) ) {
			return false;
		}
		return true;
	}

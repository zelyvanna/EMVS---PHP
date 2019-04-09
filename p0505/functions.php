<?php
	// Affiche le header
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
			#voteResult {
			margin-left:90px;
			height:19px;
			width:100px;
			position:relative;
				background: url(images/star_empty.png) repeat-x;
			}
			#voteResult div {
				position:absolute;
				height:100%;
				background: url(images/star_full.png) repeat-x;
			}	
		</style>
	</head>
	<body>

<?php
	}

	// Affiche le footer
	function getFooter() {
?>
		</body>
		</html>
<?php
	}

	// Affiche le formulaire de sélection de film
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
			<input name="showSearchForm" id="showSearchForm" type="submit" value="Rechercher un film"/>
		</p>
	</form>


<?php
	}

	function checkFields($titre, $annee, $nomMES, $prenomMES, $anneeNaissanceMES) {
		if (empty($titre) ) {
			return false;
		}
		if(empty($nomMES) || empty($prenomMES)) {
			return false;
		}
		return true;
	}

	function getSearchStatement() {
		$pdo = getConnexion();
		$sql = "SELECT * FROM tblFilm WHERE filmTitre LIKE :filmTitre AND filmAnnee >= :filmAnneeDebut AND filmAnnee <= :filmAnneeFin ;";
		$stmt = $pdo->prepare($sql);

		return $stmt;
	}

<!doctype html>
<html>
<head>
	<title>P0312 - Liste d'articles</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	require('functions.php');
	session_start();
	
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
?>
	<table>
<?php
	foreach($_SESSION["catalogue"] as $article) {
		echo $article->rowDetail();
	}
?>
	</table>
	<p><a href="index.php">Retour au formulaire</a></p>
</body>
</html>
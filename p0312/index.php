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
	
	$_SESSION["catalogue"] = array();
	$_SESSION["catalogue"][] = new Article("crayon couleur", "0.5");
	$_SESSION["catalogue"][] = new Article("crayon papier", "0.4");
	$_SESSION["catalogue"][] = new Article("bloc note A4", "2");
	
?>
<a href="list.php">Liste</a>
</body>
</html>
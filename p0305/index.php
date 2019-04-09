<!doctype html>
<html>
<head>
	<title>P0305 - Liste d'articles</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	require('Article.class.php');
	
	$catalogue = array();
	$catalogue[] = new Article("crayon couleur", "0.5");
	$catalogue[] = new Article("crayon papier", "0.4");
	$catalogue[] = new Article("bloc note A4", "2");
	
	foreach($catalogue as $article) {
		echo $article->detail()."<br/>";
	}
?>
</body>
</html>
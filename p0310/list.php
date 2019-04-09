<?php
	require('Article.class.php');
	session_start();
?>
<!doctype html>
<html>
<head>
	<title>P0310 - Liste d'articles</title>
	<meta charset="utf-8">
</head>
<body>
<?php
	echo "<pre>";
	print_r($_SESSION);
	echo "</pre>";
	
	foreach($_SESSION["catalogue"] as $article) {
		echo $article->detail()."<br/>";
	}
?>
</body>
</html>
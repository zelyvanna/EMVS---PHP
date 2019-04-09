<?php
function getHeader() {
	header('Content-Type: text/html; charset=utf-8');
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>My Movies</title>
	<style>
		body {
			font-size:	small;
		}
		h1{
			text-align: center;
		}
		h2 {
			margin-bottom:0.0em;
		}
		#description {
			width:50%;
			float:left;
		}
		#affiche {
			width:50%;
			float:left;
			clear:right;
		}
		.legend {
			font-weight:bold;
			width:80px;
			display:inline-block;
			text-align:right;
			margin-right:10px;
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

function getFooter() {
?>
</body>
</html>
<?php
}
<?php
function getHeader() {
	header('Content-Type: text/html; charset=utf-8');

	echo '
		<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
			<title>Animaux</title>
			<style>
				* { font-size:16px; font-family:Verdana; }
				h4 { font-size:24px;  font-family:Verdana; font-weight:bold; }
				h5 { font-size:20px;  font-family:Verdana; text-decoration:underline; }
				divMessage { font-size:14px; color:#C0C0C0; }
			</style>
		</head>
		<body>
		<div style="margin:45px;">';
}

function getFooter() {
	echo '</div></body></html>';
}


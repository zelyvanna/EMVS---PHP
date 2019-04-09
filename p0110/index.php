<?php
require('connect.inc.php');
require('movies.class.php');

//============
// Connexion
//============
getConnexion();
//==========================================
// Affichage liste films sous forme de texte
//==========================================

//$Movie = new Movie('Baptiste 2 le retour de la vengeance de ouai toi aussi',1800,'Poquelin','Jean-Baptiste',1700);
$Movie= new Movie();
//$Movie->getMoviesList(getConnexion());

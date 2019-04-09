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
$Movie = new Movie();
$Movie->getMoviesList(getConnexion());



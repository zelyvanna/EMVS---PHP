<?php
function getConnexion() {
	//Connexion
	$dsn = "mysql:host=localhost;dbname=dbRomandie";
	return new PDO($dsn, "root", "");
}
function insert(){
	$pdo = getConnexion();
	$sql = "INSERT INTO tblEquipe (`equId`, `equNom`) VALUES (1, 'Movistar Team');
	INSERT INTO tblEquipe (equId, equNom) VALUES (2, 'Iam Cycling');
	INSERT INTO tblEquipe (equId, equNom) VALUES (3, 'Fdj');
	INSERT INTO tblEquipe (equId, equNom) VALUES (4, 'TeamSky');
	INSERT INTO tblEquipe (equId, equNom) VALUES (5, 'Bmc Racing Team');
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (1, 1, 'Delaloye', 'Pierre', '2002-02-02', 'France', 10);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (2, 1, 'Ducrey', 'Paul', '1990-01-01', 'Iraq', 43);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (3, 1, 'David', 'Joel', '1995-01-02', 'Portugal', 1);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (4, 2, 'Schmid', 'Golien', '1996-05-03', 'Pakistan', 4);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (5, 2, 'Saez', 'David', '1998-05-07', 'Mongolie', 28);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (6, 2, 'Karim', 'Flaction', '1947-05-16', 'Suisse', 87);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (7, 3, 'Favre', 'Stienba', '1988-02-06', 'Suisse', 69);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (8, 3, 'Bi', 'Gianni', '1997-05-03', 'Afrique', 66);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (9, 3, 'Berthe', 'Mael', '1999-05-08', 'Suisse', 25);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (10, 4, 'Desmangesse', 'Rimon', '1999-09-06', 'Mexique', 45);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (11, 4, 'Polo', 'Marco', '1700-01-01', 'Espagne', 2);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (12, 4, 'Furrer', 'Baptiste', '1998-05-06', 'Russie', 68);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (13, 5, 'Milosevic', 'Aleksander', '1990-04-04', 'Pologne', 46);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (14, 5, 'Rho', 'Roger', '1970-06-02', 'Allemagne', 54);
	INSERT INTO tblCycliste (cyclId, tblEquipe_equId, cyclNom, cyclPrenom, cyclDateNaissance, cyclNationalite, cyclDossard) VALUES (15, 5, 'Nicola', 'Chris', '1800-07-01', 'Egypte', 27);";
	$stmt = $pdo->query($sql);
}
insert();


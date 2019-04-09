<?php

class Espece 
{
	private $espID;
	private $espNom;
	private $espEstActive;

	function Espece() {
	
	}	
		
	function Ajoute($pNom, $pEstActive) {
		global $pdo;
		if($pEstActive == null){
			$pEstActive =0;
		}
		
		$this->espNom = $pNom;
		$this->espEstActive = $pEstActive;
		$sql = "insert into tblEspece (espNom, espEstActive) values (:espNom, :espEstActive);";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':espNom'=>$this->espNom, ':espEstActive'=>$this->espEstActive));
		$this->espID = $pdo->lastInsertId();
	}
	
	function Supprime($pID) {
		global $pdo;
		
		$this->espID = $pID;
		$sql = "delete from tblEspece where espID=:espID;";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':espID'=>$this->espID));
	}

	function DisplayAddForm() {
		global $pdo;
		
		echo '<form method="post" action="#">'.PHP_EOL;
		echo '<input type="hidden" id="hdEspece" name="hdEspece" value="add">'.PHP_EOL;
		echo '<label for="txtNom">Nom</label><br><input type="text" id="txtNom" name="txtNom" size="60"><br>'.PHP_EOL;
		echo '<br><input type="checkbox" id="ckbEstActive" name="ckbEstActive" value="1"><label for="ckbEstActive">espèce actuellement existente</label><br>'.PHP_EOL;
		echo '<br><input type="submit" id="btnSave" name="btnSave">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="btnCancel" name="btnCancel" value="Retour" onclick="window.location=\'index.php\';"><br>'.PHP_EOL;
		echo '</form>'.PHP_EOL;
	}
}
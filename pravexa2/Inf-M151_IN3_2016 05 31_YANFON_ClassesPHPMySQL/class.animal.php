<?php

class Animal 
{
	private $aniID;
	private $tblEspece_espID;
	private $aniNom;
	private $aniNomScient;
	private $aniNbPattes;

	function Animal() {

	}
	
	function Ajoute($pEspID, $pNom, $pNomScient, $pNbPattes) {
		global $pdo;
		
		$this->tblEspece_espID = $pEspID;
		$this->aniNom = $pNom;
		$this->aniNomScient = $pNomScient;
		$this->aniNbPattes = $pNbPattes;

		$sql = "insert into tblAnimal (tblEspece_espID, aniNom, aniNomScient, aniNbPattes) values (:espID, :aniNom, :aniNomScient, :aniNbPattes);";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':espID'=>$this->tblEspece_espID, ':aniNom'=>$this->aniNom, ':aniNomScient'=>$this->aniNomScient, ':aniNbPattes'=>$this->aniNbPattes));
		
		$this->aniID = $pdo->lastInsertId();
	}

	function Supprime($pID) {
		global $pdo;
	
		$this->aniID = $pID;
		$sql = "delete from tblAnimal where aniID=:aniID;";
		$stmt = $pdo->prepare($sql);
		$stmt->execute(array(':aniID' => $this->aniID ));
	}

	function DisplayAddForm() {
		global $pdo;
		echo '<form method="post" action="#">';
		echo '<input type="hidden" id="hdAnimal" name="hdAnimal" value="add">'.PHP_EOL;
		//Select especes selEspece
		$sql = "SELECT * FROM tblespece;";
		$result = $pdo->query($sql);
		echo "<label for='selEspece'>Espèce</label><br><select id='selEspece' name='selEspece'>";
		foreach($result as $row){
			$espId = $row["espID"];
			$espNom = $row["espNom"];
			echo"<option value='{$espId}'>{$espNom}</option>";
		}

		echo"</select><br>";
		echo '<label for="txtNom">Nom</label><br><input type="text" id="txtNom" name="txtNom" size="60"><br>'.PHP_EOL;
		echo '<label for="txtNomScient">Nom Scientifique</label><br><input type="text" id="txtNomScient" name="txtNomScient" size="60"><br>'.PHP_EOL;
		echo '<label for="txtNbPattes">Nombre de pattes</label><br><input type="text" id="txtNbPattes" name="txtNbPattes" size="5"><br>'.PHP_EOL;
		echo '<br><input type="submit" id="btnSave" name="btnSave">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="btnCancel" name="btnCancel" value="Retour" onclick="window.location=\'index.php\';"><br>'.PHP_EOL;
		echo '</form>'.PHP_EOL;
	}
}
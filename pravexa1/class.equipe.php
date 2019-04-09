<?php
class Equipe{
	private $equId;
	private $equNom;
	
	function __construct() {
		
	}
	
	function addEquipe(){
		
	}
	
	function deleteEquipe($equId){
		$sql = "DELETE FROM tblEquipe WHERE equId = $equId";
		$pdo = getConnexion();
		$pdo->exec($sql);
	}
	
	function listEquipe(){
		$sql = "SELECT * FROM tblEquipe";
		$pdo = getConnexion();
		$stmt = $pdo->query($sql);
		
		foreach($stmt as $row){
			echo "<input name ='equId' type='text' hidden='hidden' value = '".$row["equId"]."' />"."	".$row["equNom"]."<input name='deleteEquipe' id='deleteEquipe' type='submit' value='Supprimer'/><br />";
		}

	}
	function getCreationForm() {
?>
	<form action="#" method="POST">
		<input type="hidden" name="equId" value="<?php echo $this->$equId;?>" /> 
		<p><label for="equNom">Titre&nbsp;:</label><input name="titreFilm" id="titreFilm" type="text" value="<?php echo $this->_titre;?>"/></p>
		<p><input name="createEquipe" id="editMovie" type="submit" value="Mettre à jour"/></p>
	</form>
<?php
		
	}
}
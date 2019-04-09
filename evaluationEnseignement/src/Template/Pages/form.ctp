<?php
    $this->layout = false;
    include('connect.inc.php');
    $pdo = getConnexion();

/**
 * Page de participation au formulaire
 */
    //Récupération de toutes les informations sur l'évaluation nécessaires pour l'evaluation
    //Récupération de l'évaluation selon le code d'accès
    //La valeur du lien d'accès $evaCodeParticipant est renvoyée par le controlleur

    $sql = "SELECT * FROM tblEvaluation 
            INNER JOIN tblSection ON tblSection_secId = secId 
            INNER JOIN tblProfesseur ON tblProfesseur_proId = proId 
            INNER JOIN tblQuestionnaire ON tblQuestionnaire_qstId = qstId
            WHERE evaCodeAccesParticipant = '".$evaCodeParticipant."' ";
    $result = $pdo->query($sql);

    foreach($result as $row){
        $evaNom = $row["evaNom"]; //Nom de l'évaluation
		$evaId=$row["evaId"]; //Identifiant de l'évaluation
        $evaSection = $row["secNom"]; //Section
        $evaModule = $row["evaModule"]; //Module
        $evaClasse = $row["evaClasse"]; //Classe
        $evaProf = $row["proNom"]." ".$row["proPrenom"]; //Nom et prénom du professeur
        $evaQuestionnaireId = $row["qstId"]; //Récupération de l'id du questionnaire
    }

	//Si la requête ne retrouve pas d'évaluation correspondante au lien, la page erreur 400 est envoyée
	if(count($row)==0|| $row == null){
		$this->cakeError('error400.ctp');
	}


?>
<?= $this->Html->meta('icon') ?>
<?= $this->Html->css('form.css') ?>
<html>
    <head>
        <title><?php echo $evaNom ;?></title>
    </head>
    <body id="body">
        <div id="divPrincipal">
            <center><h1 id="evaNomTitre"><?php echo $evaNom; ?></h1></center>
            <hr>
            <form method="POST" action="">
                <p class="input">
					<span class="groupeQuestion">Généralités</span><br/>
					Section : <?php echo $evaSection; ?><br/>
                    Classe : <?php echo $evaClasse; ?><br/>
                    Nom du professeur : <?php echo $evaProf; ?><br/>
                    Module : <?php echo $evaModule; ?><br/>
                    Contact : <input title="Nom, prénom ou adresse mail" name="partContact" type="text" />
                </p>
                <hr>
				<br/>
				<table class='input'>
					<tr id="head">
						<td></td>
						<td class='th'>Totalement en accord</td>
						<td class='th'>Partiellement en accord</td>
						<td class='th'>Partiellement en désaccord</td>
						<td class='th'>Totalement en désaccord</td>
						<td class='th'>Impossible de répondre</td>
					</tr>
                <?php
                    //Question groupe
                    //question < questionlist < questionnaire < eva

                    //Récupération des information nécessaires pour les questions
                    $sql = "SELECT * FROM tblListeQuestion
                            INNER JOIN tblQuestionnaire ON tblQuestionnaire_qstId = qstId
                            INNER JOIN tblQuestion ON tblQuestion_quesId = quesId
                            INNER JOIN tblGroupe ON tblGroupe_groId = groId
                            INNER JOIN tblTypeQuestion ON tblTypeQuestion_typId = typId
                            WHERE tblQuestionnaire_qstId = ".$evaQuestionnaireId." ORDER BY groId";
                    $result = $pdo->query($sql);
					
					$grpQuestionPrecedante = null; //Variable utilisée pour éviter les doublons des groupes

                    foreach ($result as $row){
						$qstId = $row["quesId"];
						$grpQuestion = $row["groNom"]; //nom du groupe de question
						$question = $row["quesLibelle"];
						$typeQuestion = $row["typId"]; //1 = ouverte 2 = choix unique 3= choix multiple
						
						if($grpQuestionPrecedante != $grpQuestion){
							echo "<tr class='groupeQuestion'><td>".$grpQuestion."</td></tr>";
							$grpQuestionPrecedante = $grpQuestion;
						}
						
						switch ($typeQuestion){
							case 1: //ouverte : Les questions ouvertes seront toujours à la fin (ORDER BY)
								echo "<table class='input'><tr><td >$question</td></tr><tr><td><input type='radio' hidden checked value='6' name='".$qstId."[1]' /><textarea name='".$qstId."[2]'style='width:100%;'></textarea></td></tr>";
							break;
							case 2: //choix unique ?>
								<tr><td ><?php echo $question; ?></td>
									<td class='radio'><input type='radio' value='1' name='<?php echo $qstId; ?>[1]' required/></td>
									<td class='radio'><input type='radio' value='2' name='<?php echo $qstId; ?>[1]' required/></td>
									<td class='radio'><input type='radio' value='3' name='<?php echo $qstId; ?>[1]' required/></td>
									<td class='radio'><input type='radio' value='4' name='<?php echo $qstId; ?>[1]' required/></td>
									<td class='radio'><input type='radio' value='5' name='<?php echo $qstId; ?>[1]' required/></td></tr>

								<tr><td><textarea name='<?php echo $qstId; ?>[2]'></textarea></td></tr>
							
							<?php
							break;
							case 3: //choix multiple ne doit pas être codé
							break;
						}
                    }
                ?>
					</table>
				</table>
				<hr>
				<center><input name="sendingButton" id="sendingButton" type='submit' value='Envoyer' /></center><br/>
            </form>
        </div>
    </body>
</html>
<?php
if(isset($_POST["sendingButton"])){

	//Insertion dans la table Participation
	//Récupération de la date du jour
	$date = date("Y-m-d");
	//Récupération du Contact
	$contact = $_POST["partContact"];
	//Préparation de la requête
	$sqlInsertParticipation = "INSERT INTO tblParticipation (tblEvaluation_evaId,partContact,partDate) VALUES(".$evaId.",'".$contact."','".$date."');";
	//Exécution
	$pdo->query($sqlInsertParticipation);

	//Récupération idParticipant
	$idPart=$pdo->lastInsertId("partId");

	//Gestion de l'insertion dans la table tblResultat
	foreach($_POST as $key=>$value){ //$key = nom du champ dans la bdd, $value = valeur
		if($key != "partContact"){
			$idQuestion = $key; //Récupération de l'id de la question
			$idReponse = $value[1]; //Récupération de la valeur de la réponse
			$commentaire = $value[2]; //Récupération du commentaire

			//Préparation de la requête
			$sqlInsertResultat="INSERT INTO tblResultat (tblReponse_repId,tblQuestion_quesId,tblParticipation_partId,resCommentaire) VALUES(".$idReponse.",".$idQuestion.",".$idPart.",'".$commentaire."');";
			//Exécution
			$pdo->query($sqlInsertResultat);
		}
	}

	//Notification de l'envoi de l'évaluation
	?>
		<script language="javascript">alert("L'évaluation a bien été envoyée");</script>
	<?php
}
?>
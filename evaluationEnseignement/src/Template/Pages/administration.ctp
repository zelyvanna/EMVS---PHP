
<?= $this->Html->meta('icon') ?>
<?= $this->Html->css('form.css') ?>

<?php
/**
 * Page d'administration du formulaire
 */
    $this->layout = false;
    include('connect.inc.php');
    $pdo = getConnexion();

    //Récupération de toutes les informations sur l'évaluation nécessaires pour l'evaluation
    //Récupération de l'évaluation selon le code d'accès administratif (evaCodeAccesSynthese)

    //La valeur du code d'accès $evaCodeAdministration est renvoyée par le controlleur

//on vérifie si l'évaluation est en mode de création ou non
//Pour choisir quelle requete il faut exécuter pour récupérer les données
$sqlTest = "SELECT tblStatut_statId FROM tblEvaluation WHERE evaCodeAccesSynthese = '".$evaCodeAdministration."';";
$resutatTest = $pdo->query($sqlTest);

if($resutatTest->fetchColumn(0)== 1){
    $sql = "SELECT * FROM tblEvaluation 
            INNER JOIN tblQuestionnaire ON tblQuestionnaire_qstId = qstId
            INNER JOIN tblStatut ON tblStatut_statId = statId
            WHERE evaCodeAccesSynthese = '".$evaCodeAdministration."' ";
}else{
    $sql = "SELECT * FROM tblEvaluation
            INNER JOIN tblSection ON tblSection_secId = secId 
            INNER JOIN tblProfesseur ON tblProfesseur_proId = proId 
            INNER JOIN tblQuestionnaire ON tblQuestionnaire_qstId = qstId
            INNER JOIN tblStatut ON tblStatut_statId = statId
            WHERE evaCodeAccesSynthese = '".$evaCodeAdministration."' ";
}

    $result = $pdo->query($sql);
    foreach($result as $row){

        $evaNom = $row["evaNom"]; //Nom de l'évaluation
        $evaSection = $row["secNom"]; //Section
        $evaModule = $row["evaModule"]; //Module
        $evaClasse = $row["evaClasse"]; //Classe
        $evaProf = $row["proNom"] . " " . $row["proPrenom"]; //Nom et prénom du professeur
        $profMail = $row["proMail"]; //Email prof
        $evaCodeParticipant = $row["evaCodeAccesParticipant"]; //Récupération du code d'accès élèves
        $evaId=$row["evaId"]; //Identifiant de l'évaluation
        $evaQuestionnaireId = $row["qstId"]; //Récupération de l'id du questionnaire
        $statut = $row["statId"]; //Identifiant du statut
    }
//Récupération du nombre de participation
$sql = "SELECT COUNT(*) FROM tblParticipation WHERE tblEvaluation_evaId = {$evaId}";
$nbrParticipation = $pdo->query($sql)->fetchColumn();
if($nbrParticipation==null||$nbrParticipation==0){
    $nbrParticipation='0';
}

//Affichage de la version administrative de l'evaluation si l'evaluation est ouverte
if($statut == 2) {
    formAdmin($evaNom, $evaSection, $evaClasse, $evaProf, $evaCodeParticipant, $evaModule, $evaCodeAdministration, $nbrParticipation, $profMail);
}elseif ($statut==1){ //Si elle est en cours de création affichage du formulaire de création
    formCreation($evaCodeParticipant,$evaCodeAdministration,$evaId);
}
if(isset($_POST["createEval"])){
    //Ouverture d'évaluation => update de l'évaluation
    $sqlProf = "SELECT COUNT(*) FROM tblProfesseur WHERE proNom = '".$_POST["proNom"]."' AND proPrenom ='".$_POST["proPrenom"]."';";
    $profexiste=$pdo->query($sqlProf)->fetchColumn();

    if($profexiste==0){ //test de l'existance du professeur
        $sqlCreationProf = "INSERT INTO tblProfesseur (proNom,proPrenom,proMail) VALUE('".$_POST["proNom"]."','".$_POST["proPrenom"]."','".$_POST["proMail"]."')";
        $pdo->query($sqlCreationProf);
        $idProf = $pdo->lastInsertId();
    }else{ //si existant on recupere son id
        $sqlProf = "SELECT proId,proMail FROM tblProfesseur WHERE proNom = '".$_POST["proNom"]."' AND proPrenom ='".$_POST["proPrenom"]."';";
        $res = $pdo->query($sqlProf);
        foreach ($res as $profres){
            $idProf = $profres["proId"];
            $realProfMail = $profres["proMail"];
        }
        if($_POST["proMail"]!=$realProfMail){ //Modification du mail du professeur si pas identique à la bd
            $sqlMail = "UPDATE tblProfesseur SET proMail = '".$_POST["proMail"]."' WHERE proId=".$idProf.";";
            $pdo->query($sqlMail);
        }
    }

    //Modification de l'évaluation
    $sqlCreation = "UPDATE tblEvaluation 
    SET tblStatut_statId = 2,evaClasse='".$_POST["evaClasse"]."',evaModule='".$_POST["evaModule"]."', evaNom='".$_POST["evaNom"]."',tblSection_secId= ".$_POST["evaSection"].",tblProfesseur_proId=".$idProf." WHERE evaId=".$evaId.";";
    $pdo->query($sqlCreation);

    //Rafraichissement de la page pour affichage
    header("Refresh:0");

}

if(isset($_POST["sendingButton"])){

    require('fpdf.php'); //classe pour générer fichier pdf
    $date = date("Y-m-d");

    //Récupération des résultats et génération de la synthèse
    //création pdf
    //Recup resultat

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetMargins(21);
    $pdf->SetFont('Arial', 'B', 16);
    $titre="Synthèse de l'évaluation : ".$evaNom;
    //conversion du texte de UTF-8 vers windows-1252
    $titre= iconv('UTF-8', 'windows-1252', $titre);
    $pdf->SetX(21);
    $pdf->Cell(40, 10,$titre);
    $pdf->Ln(5);
    $pdf->Cell(40, 10, "Nombre de participations : ".$nbrParticipation); //liste question + quantité de chaque rep
    $pdf->Ln(10);

    $sql="SELECT tblQuestion_quesId,resCommentaire,quesId,quesLibelle,partId,partContact,repLibelle,tblTypeQuestion_typId FROM tblResultat 
    INNER JOIN tblReponse ON tblReponse_repId = repId 
    INNER JOIN tblParticipation ON tblParticipation_partId = partId 
    INNER JOIN tblEvaluation ON tblEvaluation_evaId = evaId 
    INNER JOIN tblQuestion ON tblQuestion_quesId=quesId WHERE evaId =".$evaId." ORDER BY quesId;";
    $res=$pdo->query($sql);

    $questionPrecedante = null;

    //Affichage entête pdf
    $pdf->SetX(150);
    $pdf->SetFont('times','B',6);
    $pdf->Cell(50, 4, "TA");
    $pdf->SetX(160);
    $pdf->Cell(50, 4, "PA");
    $pdf->SetX(170);
    $pdf->Cell(50, 4, "PD");
    $pdf->SetX(180);
    $pdf->Cell(50, 4, "TD ");
    $pdf->SetX(190);
    $pdf->Cell(50, 4, "IR ");
    $pdf->SetFont('times','',6);

    $i=0; //indexe de numérotation des questions
    foreach ($res as $part) {
        $questionLibelle = $part["quesLibelle"];
        $commentaire = $part["resCommentaire"];
        $quesType = $part["tblTypeQuestion_typId"];
        $quesId = $part["tblQuestion_quesId"];
        $participant=$part["partContact"];

        //Gestion des participans pour les commentaires
        if($participant==null){
            $participant="Anonyme : ";
        }else{
            $participant.=" : ";
        }
        //Affichage des questions dans le pdf
        if ($questionPrecedante != $questionLibelle) {
            $questionPrecedante = $questionLibelle;
            $i++;
            $questionLibelle = $i.". ".$questionLibelle;
            //Conversion vers le bon jeu de caractère
            $questionLibelle = iconv('UTF-8', 'windows-1252', $questionLibelle);
            $pdf->Ln(2.5);
            $pdf->MultiCell(100, 4, $questionLibelle);
            if($quesType != 1) {
                //code de récupération de chaque quantité de réponses pour chaque question

                $sqlRep = "SELECT tblReponse_repId,resId,resCommentaire,quesId,quesLibelle,partId,partContact,repLibelle,tblTypeQuestion_typId,COUNT(*) as reponse FROM tblResultat 
                INNER JOIN tblReponse ON tblReponse_repId = repId 
                INNER JOIN tblParticipation ON tblParticipation_partId = partId 
                INNER JOIN tblEvaluation ON tblEvaluation_evaId = evaId 
                INNER JOIN tblQuestion ON tblQuestion_quesId=quesId WHERE evaId =".$evaId." AND quesId = '".$quesId."'  GROUP BY quesId,repId ORDER BY quesId,repId;";
                $resreponse = $pdo->query($sqlRep);

                $txt = iconv('UTF-8', 'windows-1252', "Réponses : ");
                $pdf->Cell(50,4,$txt);
                //Affichage des réponses
                foreach ($resreponse as $resultReponse){
                    $repnbr=$resultReponse["reponse"];
                    $repId=$resultReponse["tblReponse_repId"];
                    switch ($repId){
                        case 1:
                            $pdf->SetX(150);
                            $pdf->Cell(50, 4, $repnbr);break;
                        case 2:
                            $pdf->SetX(160);
                            $pdf->Cell(50, 4, $repnbr);break;
                        case 3:
                            $pdf->SetX(170);
                            $pdf->Cell(50, 4, $repnbr);break;
                        case 4:
                            $pdf->SetX(180);
                            $pdf->Cell(50, 4, $repnbr);break;
                        case 5:
                            $pdf->SetX(190);
                            $pdf->Cell(50, 4, $repnbr);break;
                    }
                }


                $pdf->ln(2.5);
                $pdf->MultiCell(100, 4, "Commentaires : ");
            }
        }
        if($commentaire != null && $commentaire!=""){
            //Ajout d'une "puce" avant chaque commentaire pour les séparer
            $commentaire = "- ".$participant.$commentaire;
            $commentaire = iconv('UTF-8', 'windows-1252',$commentaire);
            $pdf->MultiCell(100, 4, $commentaire);
        }
    }

    //Sauvegarde Fichier dans : N:\xampp\htdocs\evaluationEnseignement\webroot\evaluation
    //Pour ensuite l'envoyer par mail et le supprimer
    $pdf->Output("f", "evaluation\\".$evaId.".pdf", false);

    //DELETE dans la table evaluation + resultat + participation
    $sqlDelete = "DELETE FROM tblEvaluation WHERE evaId = ".$evaId.";";
    $res = $pdo->query($sqlDelete);

    $boundary = "_".md5 (uniqid (rand())); //Variable de séparation du mail
    $file_name="evaluation\\".$evaId.".pdf";
    //Récupération du contenu du pdf
    $attached_file = file_get_contents($file_name); //file name ie: ./image.jpg
    //Encodage du fichier au bon format
    $attached_file = chunk_split(base64_encode($attached_file));
    $attached = "\n\n". "--" .$boundary . "\nContent-Type: application; name=\"$file_name\"\r\nContent-Transfer-Encoding: base64\r\nContent-Disposition: attachment; filename=\"$file_name\"\r\n\n".$attached_file . "--" . $boundary . "--";
    $headers .= "MIME-Version: 1.0 "."\r\n";
    $headers.="Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
    $headers .= "From: praz.test@gmail.com \r\n ";
    $message = "Bonjour, \r\nVous avez fermé une évaluation. \r\nCe message contient ci-joint la synthèse de votre évaluation au format pdf. \r\nBonne journée.";
    $msg = "--". $boundary ."\nContent-Type: text/plain; charset=ISO-8859-1\r\n\n".$message . $attached;
    mail("$profMail","Evaluation de l'enseignement : Votre évaluation a bien été fermée",$msg,$headers);
    //Suppression du pdf car aucune trace ne doit être gardée !!
    unlink("evaluation\\".$evaId.".pdf");

        ?>
        <script language="javascript">alert("Votre évaluation à bien été fermée \r\nVous allez recevoir un synthèse par email.");</script>
        <?php

}

function formAdmin($evaNom,$evaSection,$evaClasse,$evaProf,$evaCodeParticipant,$evaModule,$evaCodeAdministration,$nbrParticipation,$profMail)
{ echo"
    <html>
    <head>
        <title>$evaNom</title>
        <meta http-equiv='content-type'' content='text/html; charset=utf-8'/>
    </head>
    <body id='body'>
    <div id='divPrincipal'>
        <center><h1 id='evaNomTitre'>$evaNom</h1></center>
        <hr>
        <form method='POST' action=''>
            <p class='input''>
                <span class='groupeQuestion'>Généralités</span><br/>
                Section : $evaSection<br/>
                Classe : $evaClasse<br/>
                Nom du professeur : $evaProf<br/>
                Module : $evaModule<br/>
                Lien de participation :  <a href='http://localhost:8080/evaluationEnseignement/form/$evaCodeParticipant'>http://localhost:8080/evaluationEnseignement/form/$evaCodeParticipant</a><br/>
                Lien d'administration : <a href='http://localhost:8080/evaluationEnseignement/administration/$evaCodeAdministration'>http://localhost:8080/evaluationEnseignement/administration/$evaCodeAdministration</a><br/>
            </p>
            <hr>
            <p class='input'>
                <span class='groupeQuestion'>Résultats</span><br/>
                Participations :
                $nbrParticipation
                
            </p>
            <hr>
            <p class='input'>
                <span class='groupeQuestion'>Clôture</span><br/>
                Email où sera envoyé la synthèse pdf : $profMail<br/>
            </p>
            <hr>
            <center><input name='sendingButton' id='sendingButton' type='submit' value='Fermer et générer une synthèse'/></center>
            <br/>
        </form>
    </div>
    </body>
    </html>
    ";
}
function formCreation($evaCodeParticipant,$evaCodeAdministration,$evaId)
{
    $pdo=getConnexion();
    $sqlSection = "SELECT * FROM tblSection";
    $resSection = $pdo->query($sqlSection);
    echo"
    <html>
    <head>
        <title>Ouverture d'évaluation</title>
        <meta http-equiv='content-type'' content='text/html; charset=utf-8'/>
    </head>
    <body id='body'>
    <div id='divPrincipal'>
        <center><h1 id='evaNomTitre'>Ouverture d'une nouvelle évaluation</h1></center>
        <hr>
        <form method='POST' action=''>
            <p class='input''>
                <span class='groupeQuestion'>Généralités</span><br/><br/>
                Nom de l'évaluation : <input type='text' name='evaNom' required/><br/><br/>
                Section : <select name='evaSection'>";
                foreach ($resSection as $list){
                    $section = $list["secNom"];
                    $secId = $list["secId"];
                    echo"<option value='{$secId}'>{$section}</option>";
                }
                echo"</select><br/>
                <br/>
                
                Classe : <input type='text' name='evaClasse' required/><br/><br/>
                Nom du professeur : <input type='text' name='proNom' required/><br/><br/>
                Prénom du professeur : <input type='text' name='proPrenom' required/><br/><br/>
                Module : <input type='text' name='evaModule' required/><br/><br/>
                Email : <input type='text' name='proMail' required/><br/><br/>
                Lien de participation :  <a href='http://localhost:8080/evaluationEnseignement/form/$evaCodeParticipant'>http://localhost:8080/evaluationEnseignement/form/$evaCodeParticipant</a><br/>
                Lien d'administration : <a href='http://localhost:8080/evaluationEnseignement/administration/$evaCodeAdministration'>http://localhost:8080/evaluationEnseignement/administration/$evaCodeAdministration</a><br/>
            </p>
            <hr>
            <center><input name='createEval' id='createEval' type='submit' value='Ouvrir une évaluation'/></center>
            <br/>
        </form>
    </div>
    </body>
    </html>
    ";
}
?>
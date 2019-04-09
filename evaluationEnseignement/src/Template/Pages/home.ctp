<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Email\Email;

$this->layout = false;

/**
 * Page Principale servant à ouvrir une évaluation et envoyer un mail
 */
/*
if (!Configure::read('debug')):
    throw new NotFoundException('Please replace src/Template/Pages/home.ctp with your own version.');
endif;
*/
include ('connect.inc.php');
$description = "Évaluation de l'enseignement";

//Variable Du début du lien
//elle devra être changée si le site est mis en production
$debutLien = "http://localhost:8080/evaluationEnseignement/";
$lienForm = "form/";
$lienAdministration = "administration/";

//fonction servant à la génération aléatoire des liens
//$car = longueur de la chaine
function random($car) {
    $string = "";
    $chaine = "abcdefghijklmnpqrstuvwxy";
    srand((double)microtime()*1000000);
    for($i=0; $i<$car; $i++) {
        $string .= $chaine[rand()%strlen($chaine)];
    }
    return $string;
}

//Variable définissant le questionnaire de l'évaluation
//Il est attribué à 1 C'est à dire le formulaire actuel
$evaQstId  = 1;

if(isset ($_POST[proMail])) {

    $emailProf = $_POST[proMail];

    //Vérifie si la chaine ressemble à un email
    //Version modifiée pour adresse eptm ou eptsion.ch
    if (preg_match('#^[\w.-]+@eptsion\.ch$#', $emailProf)||preg_match('#^[\w.-]+@eptm\.ch$#', $emailProf) ||$emailProf == "praz.test@gmail.com") {
        ?> <script language="javascript">alert("L'adresse que vous avez entrée est valide.\nVous allez recevoir les liens nécessaires pour administrer et partager votre évaluation par email.");</script>
        <?php
            //Génération de liens
            //Lien d'administration de longueur 20 caractères
            $adminRandom = random(20);

            //Mise en forme pour le lien complet dans le mail
            $evaCodeAdministration = $debutLien.$lienAdministration.$adminRandom;

            //Lien de participations de longueur 10 caractères
            $formRandom = random(10);

            //Mise en forme pour le lien complet dans le mail
            $evaCodeParticipation = $debutLien.$lienForm.$formRandom;

           //echo $evaCodeAdministration."<br>";
            //echo $evaCodeParticipation;

            //Ouverture d'une evaluation
            //Le statut est mis à 1 => en cours de création
            $sqlInsert = "INSERT INTO tblEvaluation (tblQuestionnaire_qstId,tblStatut_statId,evaCodeAccesParticipant,evaCodeAccesSynthese) VALUES('".$evaQstId."',1,'".$formRandom."','".$adminRandom."');";
            $pdo = getConnexion();
            $pdo->query($sqlInsert);

            //Envoi mail
        $msg = "<p>Bonjour,</p> <p>Vous avez demandé à ouvrir une évaluation</p><p> Ce message contient le lien d'administration de l'évaluation ainsi que le lien participant </p>Voici votre lien d'administration : ".$evaCodeAdministration." <br> Ainsi que le lien de participation : ".$evaCodeParticipation."<br>Le lien de participation sera valide uniquement lorsque l'évaluation sera ouverte.<p>Bonne journée.</p>";
        $msg=wordwrap($msg,70);
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: praz.test@gmail.com \r\n ";

        
        mail($emailProf,"Evaluation de l'enseignement : Demande d'ouverture",$msg,$headers);


    } else {
        ?>
        <script language="javascript">alert("L'adresse que vous avez entrée est invalide");</script>
        <?php
        //Rien n'est envoyé si l'adresse n'est pas valide
    }


}
?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $description ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>
    <div style="height:50px">
    </div>
</head>
<body class="home">
<center><img src="webroot/img/iconeEptm.png" /></center>
    <header>

         <div class="header-image">
                    <h1>Évaluation de l'enseignement</h1>
                    <form method='POST' href="#">
                        <center>
                            <input type=text required value="<?php echo $_POST[proMail]; ?>" name="proMail" style="width:500px; text-align:center;"/>
                            <input type=submit value="Envoyer" />
                        </center>
                    </form>
         </div>
    </header>
</body>
</html>

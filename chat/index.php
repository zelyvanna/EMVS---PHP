<?php
include("connect.inc.php");

if(isset($_POST["userId"])) {
    $sql = "SELECT userName FROM tblUtilisateur WHERE userId = " . $_POST["userId"];
    $pdo = getConnexion();
    $userName = $pdo->query($sql)->fetchColumn(0);
    echo "Connecté en tant que : " . $userName;

}
if(!isset($_POST["destDiscussion"])&& !isset($_POST["userId"])){
    accueil();
}else if(!isset($_POST["destDiscussion"])){
    listeDiscussion($_POST["userId"]);
}else{
    //msg disc
    discussion($_POST["destDiscussion"],$_POST["userId"]);
}




function accueil()
{
    ?>
    <html>
    <head>
        <title>Chat du turfu</title>
    </head>
    <body>
    <div style="
            width:80%;
            border:10px;
            background-color:deeppink;
            margin:auto;
            margin-top:20px;
            border-radius: 15px;">

        <h1 style="text-align: center;">Bienvenue dans le chat du turfu</h1>
        <h2  style="text-align: center;">Connexion</h2>

    </div>
    <center>
        <div style="height:60px;
    width:80%;
    border:10px;
    background-color:cyan;
    margin:auto;
    margin-top:20px;
    border-radius: 15px;">
            <form action="" method="POST"><label for="userId"><b>N° d'utilisateur : </b></label><br><input type="text"
                                                                                                           id="userId"
                                                                                                           name="userId"/>
            </form>
        </div>
    </center>
    </body>
    </html><?php
}
function listeDiscussion($userId){
    $sql="SELECT * FROM tblUtilisateur WHERE userId !=".$userId.";";
    $pdo =getConnexion();
    $result = $pdo->query($sql);
    ?>
    <html>
        <head>
            <title>Chat du turfu</title>
        </head>
        <body>


        <div style="
            width:80%;
            border:10px;
            background-color:deeppink;
            margin:auto;
            margin-top:20px;
            border-radius: 15px;">
            <h1 style="text-align: center;">Chat du turfu</h1>
            <h2 style="text-align: center;">Liste des discussions</h2>
        </div>


<?php
    $couleur = 0;
    foreach ($result as $row){
        $userName = $row["userName"];
        $userIdDest = $row["userId"];
        echo"<form action='' method='POST' id='frmDiscussion".$userIdDest."' name='frmDiscussion'>";
        if($couleur %2 != 0){
            ?><div style=" height: 50px;
            width:80%;
            border:10px;
            background-color:yellow;
            margin:auto;
            text-align: center;
            padding-top: 20px;
            margin-top:20px;
            border-radius: 15px;" onclick="frmDiscussion<?php echo $userIdDest;?>.submit();">
                    <?php
        }else{
            ?><div style=" height: 50px;
            width:80%;
            border:10px;
            background-color:blueviolet;
            margin:auto;
            margin-top:20px;
            text-align: center;
            padding-top: 20px;
            border-radius: 15px;"onclick="frmDiscussion<?php echo $userIdDest;?>.submit();">
            <?php
        }
        echo $userName;
        echo"<input name='destDiscussion' type='text' hidden value='".$userIdDest."'/>";
        echo"<input name='userId' type='text' hidden value='".$userId."'/>";
        echo"</div></form>";
        $couleur ++;
    }
    echo"</body></html>";
}
function discussion($destId,$userId){
$sql = "SELECT * FROM tblMessage INNER JOIN tblUtilisateur ON tblUtilisateur_userId_destinataire = userId WHERE (tblUtilisateur_userId_destinataire=".$destId." AND tblUtilisatateur_userId_envoyeur = ".$userId.") OR (tblUtilisateur_userId_destinataire=".$userId." AND tblUtilisatateur_userId_envoyeur = ".$destId.")ORDER BY msgId;";
$pdo=getConnexion();
$result=$pdo->query($sql);
?>
    <html>
    <head>
        <title>Chat du turfu</title>
    </head>
    <body>
    <div style="
            width:80%;
            border:10px;
            background-color:deeppink;
            margin:auto;
            margin-top:20px;
            border-radius: 15px;">

        <h1 style="text-align: center;">Chat du turfu</h1>
        <?php

        foreach ($result as $row){
            $destNom = $row["userName"];
        }

        ?>

        <h2  style="text-align: center;">Discussion avec <?php echo $destNom ;?></h2>
    </div>
    <center>
    <?php
        $result=$pdo->query($sql);
        foreach ($result as $message){
         //Test pour savoir si recoit ou nvoie mesage
          if($userId == $message["userId"]){
               ?><div style="height:60px;
    width:51%;
    border:10px;
    background-color:lime;
    float: left;
    margin:auto;
    margin-top:20px;
    padding-top: 20px;
    border-radius: 15px;">

        <?php echo $message["msgMessage"];?>
        </div><?php
          }else{?>
          <div style="height:60px;
    width:51%;
    border:10px;
    background-color:red;
    float: right;
    margin:auto;
    padding-top: 20px;
    margin-top:20px;
    border-radius: 15px;">
        <?php echo $message["msgMessage"];?>
        </div><?php

          }
        }
 ?>

    </center>
    </body>
    </html><?php

}
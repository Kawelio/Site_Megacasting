<?php session_start(); ?>
<?php
require_once 'connexion.php';

$req = $bdd->query("UPDATE information SET tel_fixe_information = '" . $_POST['telfixe'] . "', tel_port_information = '" . $_POST['telport'] . "', rue_information = '" . $_POST['rue'] . "', ville_information = '" . $_POST['ville'] . "', cp_information = '" . $_POST['cp'] . "', pays_information = '" . $_POST['pays'] . "', mail_information = '" . $_POST['login'] . "' WHERE mail_information = '" . $_SESSION['Auth']['login'] . "' AND password_information = '" . $_SESSION['Auth']['password'] . "' AND validation_information = '1'");
if(!$req){
//requete echoue
    echo 'Il y a eu un problème avec la modifications de vos informations';
    header( "refresh:5;url=private.php" );
}else{
    echo 'La modification de vos informations a été un succés';
}
?>
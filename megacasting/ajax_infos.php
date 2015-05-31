<?php
session_start();
if($_POST){	
	//check if its an ajax request, exit if not
	if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest'){
		$output = json_encode(array( //create JSON data
		'type'=>'error', 
		'text' => 'Sorry Request must be Ajax POST'
		));
		die($output); //exit script outputting json data
	} 

	// connection database
	require_once "connexion.php";
		
	//Sanitize input data using PHP filter_var().
    $telfixe		= filter_var($_POST["telfixe"], FILTER_SANITIZE_NUMBER_INT);
	$telport		= filter_var($_POST["telport"], FILTER_SANITIZE_NUMBER_INT);
	$rue	= filter_var($_POST["rue"], FILTER_SANITIZE_STRING);
	$ville	= filter_var($_POST["ville"], FILTER_SANITIZE_STRING);
	$cp		= filter_var($_POST["cp"], FILTER_SANITIZE_NUMBER_INT);
	$pays		= filter_var($_POST["pays"], FILTER_SANITIZE_STRING);
	$login		= filter_var($_POST["login"], FILTER_SANITIZE_EMAIL);

	//additional php validation
	if(!filter_var($login, FILTER_VALIDATE_EMAIL)){ //email validation
		$output = json_encode(array('type'=>'error', 'text' => 'Entrer un email valide !'));
		die($output);
	}
	if(!filter_var($telfixe, FILTER_SANITIZE_NUMBER_FLOAT)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Numéro de téléphone invalide !'));
		die($output);
	}
	if(!filter_var($telport, FILTER_SANITIZE_NUMBER_FLOAT)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Numéro de téléphone invalide !'));
		die($output);
	}
	if(strlen($rue)<1){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Nom de rue invalide !'));
		die($output);
	}
	if(strlen($ville)<1){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Nom de ville invalide !'));
		die($output);
	}
	if(!filter_var($cp, FILTER_SANITIZE_NUMBER_FLOAT)==5){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Code postal invalide !'));
		die($output);
	}
	if(strlen($pays)<1){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Pays invalide !'));
		die($output);
	}

	$sql = "UPDATE information SET tel_fixe_information = :telfixe, tel_port_information = :telport, rue_information = :rue, ville_information = :ville, cp_information = :cp, pays_information = :pays, mail_information = :login WHERE id_information = :id";

	$req_modif = $bdd->prepare($sql);
	
	$req_modif->execute(array(':telfixe' => $telfixe,':telport' => $telport,':rue' => $rue,':ville' => $ville,':cp' => $cp,':pays' => $pays,':login' => $login,':id' => $_SESSION['Auth']['id_information']));

	$req_modif->closeCursor();
       
	if(!$req_modif){
		$output = json_encode(array('type'=>'error', 'text' => 'La modification a échoué ! S\'il vous plaît vérifiez les valeurs saisies !'));
		die($output);
	}else{
		$output = json_encode(array('type'=>'message', 'text' => 'Vos informations ont été mises à jour !'));
		die($output);
	}
}
?>
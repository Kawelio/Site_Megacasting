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
	$serveur ='127.0.0.1';
	$login ='root';
	$mdp ='';
	$nom_bdd='megacasting';
	try{
		$bdd = new PDO('mysql:host='.$serveur.';dbname='.$nom_bdd.'', $login, $mdp);
	}
	catch(Exception $output){
		//If database couldn't be connected output error.
	    $output = json_encode(array('type'=>'error', 'text' => 'Il y a eu un problème avec la base de donnée !'));
		die($output);
	}
		
	//Sanitize input data using PHP filter_var().
	$mail		= filter_var($_POST["mail"], FILTER_SANITIZE_EMAIL);
	$tel_fixe		= filter_var($_POST["tel_fixe"], FILTER_SANITIZE_NUMBER_INT);
	$tel_port		= filter_var($_POST["tel_port"], FILTER_SANITIZE_NUMBER_INT);
	$rue		= filter_var($_POST["rue"], FILTER_SANITIZE_STRING);
	$ville		= filter_var($_POST["ville"], FILTER_SANITIZE_STRING);
	$code		= filter_var($_POST["code"], FILTER_SANITIZE_NUMBER_INT);
	$pays		= filter_var($_POST["pays"], FILTER_SANITIZE_STRING);
	$password		= filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	$password_verif		= filter_var($_POST["password_verif"], FILTER_SANITIZE_STRING);
	$level		= filter_var($_POST["level"], FILTER_SANITIZE_NUMBER_INT);

	//additional php validation
	if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){ //email validation
		$output = json_encode(array('type'=>'error', 'text' => 'Entrer un email valide !'));
		die($output);
	}
	if(!filter_var($tel_fixe, FILTER_SANITIZE_NUMBER_FLOAT)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Numéro de téléphone invalide !'));
		die($output);
	}
	if(!filter_var($tel_port, FILTER_SANITIZE_NUMBER_FLOAT)){ //check for valid numbers in phone number field
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
	if(!filter_var($code, FILTER_SANITIZE_NUMBER_FLOAT)==5){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Code postal invalide !'));
		die($output);
	}
	if(strlen($pays)<1){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Pays invalide !'));
		die($output);
	}
	if($password_verif != $password){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'La confirmation de mot de passe est invalide !'));
		die($output);
	}
	if(!filter_var($level, FILTER_SANITIZE_NUMBER_FLOAT)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Type de compte invalide !'));
		die($output);
	}
	                  
	// requete sql 
	$req = $bdd->prepare('INSERT INTO information(mail_information, tel_fixe_information, tel_port_information, rue_information, ville_information, cp_information, pays_information, password_information, level_information)
	VALUES(:mail_information,:tel_fixe_information,:tel_port_information,:rue_information,:ville_information,:cp_information,:pays_information,:password_information,:level_information)')
	or exit(print_r($bdd->errorInfo()));
	
	$req->execute(array('mail_information' => $mail,'tel_fixe_information' => $tel_fixe,'tel_port_information' => $tel_port,'rue_information' => $rue,'ville_information' => $ville,'cp_information' => $code,'pays_information' => $pays,'password_information' => $password,'level_information' => $level));

	$req->closeCursor();

	if(!$req){
		//requete echoue
		$output = json_encode(array('type'=>'error', 'text' => 'La création a échoué ! S\'il vous plaît vérifiez les valeurs saisies !'));
		die($output);
	}else{
		$output = json_encode(array('type'=>'message', 'text' => 'Votre compte a bien été créer, vous allez recevoir une confirmation !'));
		die($output);
	}
}
?>
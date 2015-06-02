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
    $password		= sha1($_POST["password"]);
	$password_validation		= sha1($_POST["password_validation"]);

	//additional php validation
	if($_POST["password"] == null){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Le mot de passe doit contenir 6 caractères au minimum !'));
		die($output);
	}

	if($password_validation != $password){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'La confirmation de mot de passe est invalide !'));
		die($output);
	}

	$sql = "UPDATE information SET password_information = :password WHERE id_information = :id";

	$req_modif = $bdd->prepare($sql);
	
	$req_modif->execute(array(':password' => $password,':id' => $_SESSION['Auth']['id_information']));

	$req_modif->closeCursor();
       
	if(!$req_modif){
		$output = json_encode(array('type'=>'error', 'text' => 'La modification a échoué ! S\'il vous plaît vérifiez les valeurs saisies !'));
		die($output);
	}else{
		$output = json_encode(array('type'=>'message', 'text' => 'Votre mot de passe a été mis à jour !'));
		die($output);
	}
}
?>
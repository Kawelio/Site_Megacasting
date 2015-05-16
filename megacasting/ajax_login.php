<?php
session_start();
if($_POST)
{	
	//check if its an ajax request, exit if not
    if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
		
		$output = json_encode(array( //create JSON data
			'type'=>'error', 
			'text' => 'Sorry Request must be Ajax POST'
		));
		die($output); //exit script outputting json data
    } 

    // connection database
	require_once "connexion.php";
	
	//Sanitize input data using PHP filter_var().
	$login		= filter_var($_POST["login"], FILTER_VALIDATE_EMAIL);
	$password		= sha1($_POST["password"]);
	
	//additional php validation
	if(strlen($login)<2){ // If length is less than 4 it will output JSON error.
		$output = json_encode(array('type'=>'error', 'text' => 'L\'identifiant n\'a pas été rempli !'));
		die($output);
	}
	if(strlen($password)<2){ // If length is less than 4 it will output JSON error.
		$output = json_encode(array('type'=>'error', 'text' => 'Le mot de passe n\'a pas été rempli !'));
		die($output);
	}
	                  
	$req_connection = $bdd->query("SELECT mail_information, password_information, validation_information FROM information WHERE mail_information ='" . $login . "' AND password_information = '" .  $password . "' AND validation_information = '1'");
        
    if($req_connection->rowCount() == 1){
        $_SESSION['Auth'] = array(
        'login' => $login,
        'password' => $password                         
        );
        $output = json_encode(array('type'=>'message', 'text' => 'Connexion réussi, vous allez être rediriger !'));
		die($output);
		header('Location: private_auth.php');
    }else{
        $output = json_encode(array('type'=>'error', 'text' => 'Votre compte n\'est pas actif ! Verifier vos mails pour activer votre compte !'));
	    die($output);
    }
    // fermeture de la requête
	$req_connection->closeCursor();
}
?>
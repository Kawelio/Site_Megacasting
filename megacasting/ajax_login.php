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
	$login		= filter_var($_POST["login"], FILTER_SANITIZE_STRING);
	$password		= filter_var($_POST["password"], FILTER_SANITIZE_STRING);
	
	//additional php validation
	if(strlen($login)<4){ // If length is less than 4 it will output JSON error.
		$output = json_encode(array('type'=>'error', 'text' => 'L\'identifiant n\'a pas été rempli !'));
		die($output);
	}
	if(strlen($password)<2){ // If length is less than 4 it will output JSON error.
		$output = json_encode(array('type'=>'error', 'text' => 'Le mot de passe n\'a pas été rempli !'));
		die($output);
	}
	                  
	$req_connection = $bdd->query("SELECT mail_information, password_information FROM information WHERE mail_information ='" . $login . "' AND password_information = '" .  $password . "'");
        
        if($req_connection->rowCount() > 0){
            
            $_SESSION['user'] = array(
            'login' => $login,
            'password' => $password,                          
            ); 
        }else{
            $output = json_encode(array('type'=>'error', 'text' => 'Il y a eu un problème avec la connection !'));
	    die($output);
        }
        
	// fermeture de la requête
	$req_connection->closeCursor();
}
?>
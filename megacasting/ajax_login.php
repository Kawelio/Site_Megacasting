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
	                  
	$req_connection = $bdd->query("SELECT id_information, mail_information, password_information, validation_information, level_information FROM information WHERE mail_information ='" . $login . "' AND password_information = '" .  $password . "' AND validation_information = '1'");
            $req_connection->setFetchMode(PDO::FETCH_OBJ);
                  while( $resultat = $req_connection->fetch() )
                  {     
                    $id_information = $resultat->id_information;
                    $level_information = $resultat->level_information;
                  }
    // fermeture de la requête
	$req_connection->closeCursor();
        
        if($level_information == 3){
            $req_id_artiste = $bdd->query("SELECT id_artiste FROM artiste WHERE id_information ='" . $id_information ."'");
            $req_id_artiste->setFetchMode(PDO::FETCH_OBJ);
              while( $resultat = $req_id_artiste->fetch() )
              {     
                $id_artiste = $resultat->id_artiste;              
              }
            // fermeture de la requête
            $req_id_artiste->closeCursor();
            if($req_connection->rowCount() == 1){
            $_SESSION['Auth'] = array(
                'login' => $login,
                'password' => $password,
                'id_information' => $id_information,
                'id_artiste' => $id_artiste,
                'level_information' => $level_information
                );
            $output = json_encode(array('type'=>'message', 'text' => 'Connexion réussi, vous allez être rediriger !'));
                        die($output);
            }else{
                 $output = json_encode(array('type'=>'error', 'text' => 'Votre compte n\'est pas actif ! Verifier vos mails pour activer votre compte !'));
                    die($output);
            }
            
        }else{
            if($req_connection->rowCount() == 1){
                $_SESSION['Auth'] = array(
                'login' => $login,
                'password' => $password,
                'id_information' => $id_information,
                'level_information' => $level_information
                );
                $output = json_encode(array('type'=>'message', 'text' => 'Connexion réussi, vous allez être rediriger !'));
                        die($output);
            }else{
                $output = json_encode(array('type'=>'error', 'text' => 'Votre compte n\'est pas actif ! Verifier vos mails pour activer votre compte !'));
                    die($output);
            }
        }
}?>
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
	$intitule		= filter_var($_POST["intitule"], FILTER_SANITIZE_STRING);
	$reference		= filter_var($_POST["reference"], FILTER_SANITIZE_STRING);
	$date                   = filter_var($_POST["date"], FILTER_SANITIZE_STRING);
	$duree                  = filter_var($_POST["duree"], FILTER_SANITIZE_NUMBER_INT);
	$date_debut		= filter_var($_POST["date_debut"], FILTER_SANITIZE_STRING);
	$localisation		= filter_var($_POST["localisation"], FILTER_SANITIZE_STRING);
	$type_contrat		= filter_var($_POST["type_contrat"], FILTER_SANITIZE_STRING);
	$metier         	= filter_var($_POST["metier"], FILTER_SANITIZE_STRING);
	$domaine		= filter_var($_POST["domaine"], FILTER_SANITIZE_STRING);
        $description            = filter_var($_POST["description"], FILTER_SANITIZE_STRING);

	//additional php validation
	if(!filter_var($intitule, FILTER_SANITIZE_STRING)){ //email validation
		$output = json_encode(array('type'=>'error', 'text' => 'Entrer un intitulé valide !'));
		die($output);
	}
	if(!filter_var($reference, FILTER_SANITIZE_STRING)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Entrer une référence valide !'));
		die($output);
	}
	if(!filter_var($date, FILTER_SANITIZE_STRING)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Date invalide !'));
		die($output);
	}
	if(strlen($duree)<1){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Durée invalide !'));
		die($output);
	}
	if(!filter_var($date_debut, FILTER_SANITIZE_STRING)){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Date invalide !'));
		die($output);
	}
	if(!filter_var($localisation, FILTER_SANITIZE_STRING)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Entrer une localisation valide !'));
		die($output);
	}
	if(!filter_var($description, FILTER_SANITIZE_STRING)){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Entrer une description valide !'));
		die($output);
	}
	if(!filter_var($type_contrat, FILTER_SANITIZE_NUMBER_INT)){ //check emtpy message
		$output = json_encode(array('type'=>'error', 'text' => 'Type de contrat invalide !'));
		die($output);
	}
	if(!filter_var($metier, FILTER_SANITIZE_NUMBER_INT)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Métier invalide !'));
		die($output);
	}
        if(!filter_var($domaine, FILTER_SANITIZE_NUMBER_INT)){ //check for valid numbers in phone number field
		$output = json_encode(array('type'=>'error', 'text' => 'Domaine invalide !'));
		die($output);
	}
	
        // Validation_offre correspond à l'état d'une offre.
        $validation_offre = 0;
        //Récupération de l'id de l'annonceur grâce a une variable session.
        $id_annonceur = 11;
        
	// requete sql 
	$req = $bdd->prepare('INSERT INTO offre(int_offre, ref_offre, date_offre, duree_offre, date_deb_offre, loc_offre, desc_offre, validation_offre, id_annonceur, id_contrat, id_metier, id_domaine)
	VALUES(:int_offre,:ref_offre,:date_offre,:duree_offre,:date_deb_offre,:loc_offre,:desc_offre,:validation_offre,:id_annonceur,:id_contrat,:id_metier,:id_domaine)')
	or exit(print_r($bdd->errorInfo()));
	
	$req->execute(array('int_offre' => $intitule,'ref_offre' => $reference,'date_offre' => $date,'duree_offre' => $duree,'date_deb_offre' => $date_debut,'loc_offre' => $localisation,'desc_offre' => $description, 'validation_offre' => $validation_offre,'id_annonceur' => $id_annonceur,'id_contrat' => $type_contrat, 'id_metier' => $metier, 'id_domaine' => $domaine));

	$req->closeCursor();

	if(!$req){
		//requete echoue
		$output = json_encode(array('type'=>'error', 'text' => 'Le dépot d\'annonce a échoué ! S\'il vous plaît vérifiez les valeurs saisies !'));
		die($output);
	}else{
		$output = json_encode(array('type'=>'message', 'text' => 'Votre annonce à bien été déposé, notre équipe l\'analyse avant de la mettre en ligne !'));
		die($output);
	}
}
?>
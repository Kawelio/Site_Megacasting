<?php
	// connection database
	$serveur ='127.0.0.1';
	$login ='root';
	$mdp ='not24get';
	$nom_bdd='megacasting';
	try{
		$bdd = new PDO('mysql:host='.$serveur.';dbname='.$nom_bdd.'', $login, $mdp);
	}
	catch(Exception $output){
		//If database couldn't be connected output error.
	    $output = json_encode(array('type'=>'error', 'text' => 'Il y a eu un problème avec la base de donnée !'));
		die($output);
	}
?>
<?php

Class Client{
    
    static function estloger(){
        if (isset($_SESSION['user']) && isset($_SESSION['user']['login']) && isset($_SESSION['user']['password'])){
            extract($_SESSION['user']);
            $serveur ='127.0.0.1';
            $login ='root';
            $mdp ='';
            $nom_bdd='megacasting';
            try{
		$bdd = new PDO('mysql:host='.$serveur.';dbname='.$nom_bdd.'', $login, $mdp);
		var_dump($bdd);
            }
            catch(Exception $output){
                    //If database couldn't be connected output error.
                $output = json_encode(array('type'=>'error', 'text' => 'Il y a eu un problème avec la base de donnée !'));
                    die($output);
            }
            $rep = $bdd->query("SELECT mail_information, password_information FROM information WHERE mail_information ='" . $login . "' AND password_information = '" .  $password . "'") or die(mysql_error());       
            if(mysqli_num_rows($rep) > 0){
                 return true;
             }else{
                 return false;
             }
        }else{
            return false;
        }
    }
}

?>
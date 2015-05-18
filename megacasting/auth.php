<?php
require_once 'connexion.php';

Class Auth{
    
    static function islog(){
        global $bdd;
        if (isset($_SESSION['Auth']) && isset($_SESSION['Auth']['login']) && isset($_SESSION['Auth']['password'])){
            $q = array('login' => $_SESSION['Auth']['login'], 'password' => $_SESSION['Auth']['password']);
            $sql = "SELECT mail_information, password_information, validation_information FROM information WHERE mail_information = :login AND password_information = :password AND validation_information = '1'";
            $req = $bdd->prepare($sql);
            $req->execute($q);
            $count = $req->rowCount($sql);

            if($count == 1){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>
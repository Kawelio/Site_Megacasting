<?php
session_start();

if($_SESSION['offre']){	
    
    // connection database
    require_once "connexion.php";
        
$id_offre = $_SESSION['offre']['identifiant'];
$id_artiste = $_SESSION['Auth']['id_artiste'];

//vérification si aps déja inscrit.
$req = $bdd->query("SELECT id_artiste, id_offre FROM artiste_offre WHERE id_artiste = " . $id_artiste . " AND id_offre= " . $id_offre);
$count = $req->rowCount();
     
    if ($count > 0){
         echo 'Déjà inscrit a ce casting';
    }else{
            // requete sql insertion artiste_offre. 
            $req = $bdd->prepare('INSERT INTO artiste_offre(id_artiste, id_offre)
            VALUES(:id_artiste,:id_offre)')
            or exit(print_r($bdd->errorInfo()));

            $req->execute(array('id_artiste' => $id_artiste,'id_offre' => $id_offre));       
            $req->closeCursor(); 
            echo 'Vous avez été inscrit à ce casting';
    }
}
?>
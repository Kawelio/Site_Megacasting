<?php
session_start();
$id = $_GET["id"];
 
if ($id == 2){
     if($_SESSION['offre']){	

            // connection database
            require_once "connexion.php";

            //Sanitize input data using PHP filter_var().
            $intitule  = $_SESSION['offre']['intitule'];
            $reference = $_SESSION['offre']['reference'];
            $date  = $_SESSION['offre']['date'];
            $duree = $_SESSION['offre']['duree'];
            $date_debut  = $_SESSION['offre']['date_debut'];
            $localisation = $_SESSION['offre']['localisation'];
            $description  = $_SESSION['offre']['description'];
            $annonceur = $_SESSION['offre']['annonceur'];
            $contrat  = $_SESSION['offre']['contrat'];
            $domaine = $_SESSION['offre']['domaine'];
            $metier = $_SESSION['offre']['metier'];


             $fp = fopen('XML/offre.xml', 'w'); 
                        ftruncate($fp,0);
                         $resultat = '<offre> 
    <intitule>' . $intitule . '</intitule> 
    <reference>' . $reference . '</reference> 
    <date>' . $date . '</date>
    <duree>' . $duree . '</duree> 
    <date_debut>' . $date_debut . '</date_debut> 
    <localisation>' . $localisation . '</localisation> 
    <description>' . $description . '</description> 
    <annonceur>' . $annonceur . '</annonceur> 
    <contrat>' . $contrat . '</contrat>          
    <metier>' . $metier . '</metier> 
    <domaine>' . $domaine . '</domaine> 
</offre>'; 

                        fwrite($fp, $resultat);      
                        fclose($fp);   

                        // désactive le temps max d'exécution
                        set_time_limit(0);

                        // envoi le contenu du fichier
                        $file = 'XML/offre.xml'; 


                            //echo "*" . $uploadfile . "*<br>"; 

                            $file = "XML/offre.xml" ;
                            header('Content-Type: application/octet-stream; name='. basename($file) .''); 
                            header('Content-Disposition: attachment; filename='. basename($file) .''); 
                            header('Accept-Ranges: bytes'); 
                            header('Pragma: no-cache'); 
                            header('Expires: 0'); 
                            header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
                            header('Content-transfer-encoding: binary'); 
                            header('Content-length: ' . filesize($file)); 
                            readfile($file); 
    }
} else if($id == 1){
    
     // connection database
     require_once "connexion.php";
     
    $fp = fopen('XML/liste_offre.xml', 'w'); 
    ftruncate($fp,0);
    $text = '<liste_offre>';
    $req=$bdd->query("SELECT int_offre, ref_offre, date_offre, duree_offre, date_deb_offre, loc_offre, desc_offre, nom_annonceur, lib_contrat, lib_domaine, lib_metier FROM offre INNER JOIN metier ON metier.id_metier=offre.id_metier INNER JOIN contrat ON contrat.id_contrat=offre.id_contrat INNER JOIN domaine ON domaine.id_domaine=offre.id_domaine INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur");
    $req->setFetchMode(PDO::FETCH_OBJ);
    while( $resultat = $req->fetch() ) {
        $text .= '  
    <offre> 
        <intitule>' . $resultat->int_offre . '</intitule> 
        <reference>' . $resultat->ref_offre . '</reference> 
        <date>' . $resultat->date_offre . '</date>
        <duree>' . $resultat->duree_offre . '</duree> 
        <date_debut>' . $resultat->date_deb_offre . '</date_debut> 
        <localisation>' . $resultat->loc_offre . '</localisation> 
        <description>' . $resultat->desc_offre . '</description> 
        <annonceur>' . $resultat->nom_annonceur . '</annonceur> 
        <contrat>' . $resultat->lib_contrat . '</contrat>          
        <metier>' . $resultat->lib_metier . '</metier> 
        <domaine>' . $resultat->lib_domaine . '</domaine> 
    </offre>'
            ; 
    }
    $text .= '<liste_offre>';
    fwrite($fp, $text);      
    fclose($fp);   

    // désactive le temps max d'exécution
    set_time_limit(0);
    
    $req->closeCursor();  
    
    // envoi le contenu du fichier
    $file = 'XML/liste_offre.xml'; 

    header('Content-Type: application/octet-stream; name='. basename($file) .''); 
    header('Content-Disposition: attachment; filename='. basename($file) .''); 
    header('Accept-Ranges: bytes'); 
    header('Pragma: no-cache'); 
    header('Expires: 0'); 
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0'); 
    header('Content-transfer-encoding: binary'); 
    header('Content-length: ' . filesize($file)); 
    readfile($file); 
}
   
?>
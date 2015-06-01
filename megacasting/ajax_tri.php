<?php
if(isset($_GET["tri"])){
     
    $tri = $_GET["tri"];
     
    include_once("connexion.php"); 
     
    if($tri == 1){
        $resultats=$bdd->query("SELECT id_offre, desc_offre, int_offre, date_offre, nom_annonceur, lib_domaine FROM offre INNER JOIN domaine ON domaine.id_domaine=offre.id_domaine INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur");
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        if($resultats->rowCount() == 0){
            echo "Aucun résultats";
        }
        while( $resultat = $resultats->fetch()){
            echo "<a href='personnal.php?id_offre=" . $resultat->id_offre . "'><div class='container_annonce'><header class='post_annonce'><span class='post_dom'>";
            if($resultat->lib_domaine == 'Chant'){ echo "<img src='images/domaine/chant.jpg'"; } else if($resultat->lib_domaine == 'Musicien'){ echo "<img src='images/domaine/music.jpg'"; } else { echo "<img src='images/domaine/notfound.png'"; }
            echo "</span><span id='post_title'>\"".$resultat->int_offre."\"</span><span id='post_dom'></span><span id='post_by'>Posté par ".$resultat->nom_annonceur."</span><span id='post_date'>".$resultat->date_offre."</span></header><article>".$resultat->desc_offre."</article></div></a>";
        }
        $resultats->closeCursor();
    }

    if($tri == 2){
        $resultats=$bdd->query("SELECT id_offre, desc_offre, int_offre, date_offre, nom_annonceur, lib_domaine FROM offre INNER JOIN domaine ON domaine.id_domaine=offre.id_domaine INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur WHERE lib_domaine = 'Chant'");
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        if($resultats->rowCount() == 0){
            echo "Aucun résultats";
        }
        while( $resultat = $resultats->fetch()){
            echo "<a href='personnal.php?id_offre=" . $resultat->id_offre . "'><div class='container_annonce'><header class='post_annonce'><span class='post_dom'>";
            if($resultat->lib_domaine == 'Chant'){ echo "<img src='images/domaine/chant.jpg'"; } else if($resultat->lib_domaine == 'Musicien'){ echo "<img src='images/domaine/music.jpg'"; } else { echo "<img src='images/domaine/notfound.png'"; }
            echo "</span><span id='post_title'>\"".$resultat->int_offre."\"</span><span id='post_dom'></span><span id='post_by'>Posté par ".$resultat->nom_annonceur."</span><span id='post_date'>".$resultat->date_offre."</span></header><article>".$resultat->desc_offre."</article></div></a>";
        }
        $resultats->closeCursor();
    }

    if($tri == 3){
        $resultats=$bdd->query("SELECT id_offre, desc_offre, int_offre, date_offre, nom_annonceur, lib_domaine FROM offre INNER JOIN domaine ON domaine.id_domaine=offre.id_domaine INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur WHERE lib_domaine = 'Musicien'");
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        if($resultats->rowCount() == 0){
            echo "Aucun résultats";
        }
        while( $resultat = $resultats->fetch()){
            echo "<a href='personnal.php?id_offre=" . $resultat->id_offre . "'><div class='container_annonce'><header class='post_annonce'><span class='post_dom'>";
            if($resultat->lib_domaine == 'Chant'){ echo "<img src='images/domaine/chant.jpg'"; } else if($resultat->lib_domaine == 'Musicien'){ echo "<img src='images/domaine/music.jpg'"; } else { echo "<img src='images/domaine/notfound.png'"; }
            echo "</span><span id='post_title'>\"".$resultat->int_offre."\"</span><span id='post_dom'></span><span id='post_by'>Posté par ".$resultat->nom_annonceur."</span><span id='post_date'>".$resultat->date_offre."</span></header><article>".$resultat->desc_offre."</article></div></a>";
        }
        $resultats->closeCursor();
    }

    if($tri == 4){
        $resultats=$bdd->query("SELECT id_offre, desc_offre, int_offre, date_offre, nom_annonceur, lib_domaine FROM offre INNER JOIN domaine ON domaine.id_domaine=offre.id_domaine INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur WHERE lib_domaine = 'Chorégraphe'");
        $resultats->setFetchMode(PDO::FETCH_OBJ);
        if($resultats->rowCount() == 0){
            echo "Aucun résultats";
        }
        while( $resultat = $resultats->fetch()){
            echo "<a href='personnal.php?id_offre=" . $resultat->id_offre . "'><div class='container_annonce'><header class='post_annonce'><span class='post_dom'>";
            if($resultat->lib_domaine == 'Chant'){ echo "<img src='images/domaine/chant.jpg'"; } else if($resultat->lib_domaine == 'Musicien'){ echo "<img src='images/domaine/music.jpg'"; } else { echo "<img src='images/domaine/notfound.png'"; }
            echo "</span><span id='post_title'>\"".$resultat->int_offre."\"</span><span id='post_dom'></span><span id='post_by'>Posté par ".$resultat->nom_annonceur."</span><span id='post_date'>".$resultat->date_offre."</span></header><article>".$resultat->desc_offre."</article></div></a>";
        }
        $resultats->closeCursor();
    }
}
?>
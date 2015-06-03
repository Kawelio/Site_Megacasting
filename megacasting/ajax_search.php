<?php
if(isset($_GET["search"])){
     
    $search = $_GET["search"];
     
    include_once("connexion.php"); 
     
    
        $req=$bdd->query("SELECT id_offre, desc_offre, int_offre, date_offre, nom_annonceur, lib_domaine FROM offre INNER JOIN domaine ON domaine.id_domaine=offre.id_domaine INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur WHERE int_offre LIKE '%$search%'");
        $req->setFetchMode(PDO::FETCH_OBJ);
        if($req->rowCount() == 0){
            echo "Aucun résultats";
        }
        while( $resultat = $req->fetch()){
            echo "<a href='personnal.php?id_offre=" . $resultat->id_offre . "'><div class='container_annonce'><header class='post_annonce'><span class='post_dom'>";
            if($resultat->lib_domaine == 'Musique'){ echo "<img src='images/domaine/music.jpg'"; } else if($resultat->lib_domaine == 'Cinema'){ echo "<img src='images/domaine/cinema.jpg'"; } else if($resultat->lib_domaine == 'Theatre'){ echo "<img src='images/domaine/theatre.jpg'"; } else if($resultat->lib_domaine == 'Dance'){ echo "<img src='images/domaine/dance.jpg'"; } else if($resultat->lib_domaine == 'Spectacle'){ echo "<img src='images/domaine/spectacle.jpg'"; } else { echo "<img src='images/domaine/notfound.png'"; }
            echo "</span><span id='post_title'>\"".$resultat->int_offre."\"</span><span id='post_dom'></span><span id='post_by'>Posté par ".$resultat->nom_annonceur."</span><span id='post_date'>".$resultat->date_offre."</span></header><article>".$resultat->desc_offre."</article></div></a>";
        }
        $req->closeCursor(); 
}
?>
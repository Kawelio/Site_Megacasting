<?php session_start(); ?>
<?php require_once 'connexion.php'; 
if(isset($_SESSION['Auth']['level_information'])){
    $level_information = $_SESSION['Auth']['level_information'];
}else{
    $level_information = 0;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Megacasting | Votre aventure commence ici</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/megacasting.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
    //Login form
    $(document).ready(function() {
        $("#cancel_personnal").click(function() { 
            setTimeout("window.location.href='index.php' ", 1000);
        });
    });
    </script>   
</head><!--/head-->

<body class="homepage">
    <!-- MASQUE -->
    <div id="mask"></div>
    <header id="header">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-4">
                        <div class="top-number"><p><i class="fa fa-phone-square"></i>  +0123 456 70 90</p></div>
                    </div>
                    <div class="col-sm-6 col-xs-8">
                        <div class="social">
                            <?php
                                require('auth.php');
                                if(Auth::islog()){
                                    echo '<a href="private.php">Mon compte</a>';
                                }else{
                                    echo '<a href="login.php">Se connecter</a>';
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div><!--/.container-->
        </div><!--/.top-bar-->

        <nav class="navbar navbar-inverse" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><images src="images/logo.png" alt="logo"></a>
                </div>
				
                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Accueil</a></li>
                        <li><a href="services.php">Déposer offre</a></li>
                        <li><a href="contact-us.php">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="feature" >
        <div class="container">
            <?php
                $id_offre = $_GET['id_offre'];
                  
                $resultats=$bdd->query("SELECT int_offre, ref_offre, date_offre, duree_offre, date_deb_offre, loc_offre, desc_offre, nom_annonceur, lib_contrat, lib_domaine, lib_metier FROM offre INNER JOIN metier ON metier.id_metier=offre.id_metier INNER JOIN contrat ON contrat.id_contrat=offre.id_contrat INNER JOIN domaine ON domaine.id_domaine=offre.id_domaine INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur WHERE id_offre='" . $id_offre . "'");
                $resultats->setFetchMode(PDO::FETCH_OBJ);
                while( $resultat = $resultats->fetch() )
                {
                      $intitule = $resultat->int_offre;
                      $reference = $resultat->ref_offre;
                      $date = $resultat->date_offre;
                      $duree = $resultat->duree_offre;
                      $date_debut = $resultat->date_deb_offre;
                      $localisation = $resultat->loc_offre;
                      $description = $resultat->desc_offre;
                      $annonceur = $resultat->nom_annonceur;
                      $contrat = $resultat->lib_contrat;
                      $domaine = $resultat->lib_domaine;
                      $metier = $resultat->lib_metier;
                  } 
                  
                  $_SESSION["offre"] = array(
                      'identifiant' => $id_offre,
                      'intitule' => $intitule,
                      'reference' => $reference,
                      'date' => $date,
                      'duree' => $duree,
                      'date_debut' => $date_debut,
                      'localisation' => $localisation,
                      'description' => $description,
                      'annonceur' => $annonceur,
                      'contrat' => $contrat,
                      'domaine' => $domaine,
                      'metier' => $metier
                  );
            ?>  
                  <div class='container_annonce'>
                       <section id="feature" >
                            <div class="container">
                               <div class="center wow fadeInDown">
                                   <h2 id="intitule"><?php echo $intitule ?></h2>
                                   <p class="lead" id="description"><?php echo $description ?></p>
                                </div>

                                <div class="row">
                                    
                                    <div class="row">
		
					<div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="joomla-skill">                                   
								<p><em>Lieu</em></p>
								<p><?php echo $localisation ?></p>
							</div>
						</div>
					</div>
					
					 <div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="html-skill">                                  
								<p><em>Contrat</em></p>
								<p><?php echo $contrat ?></p>
							</div>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
							<div class="css-skill">                                    
								<p><em>Durée</em></p>
								<p><?php echo $duree ?> jours</p>
							</div>
						</div>
					</div>
					
					 <div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
							<div class="wp-skill">
								<p><em>Métier</em></p>
								<p><?php echo $metier ?></p>                                     
							</div>
						</div>
					</div>
					
                                    </div>
                                    <div class="features">
                                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <div class="feature-wrap">
                                                <h2>Référence du casting</h2>
                                                <h3><?php echo $reference ?></h3>
                                            </div>
                                        </div><!--/.col-md-4-->
                                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <div class="feature-wrap">
                                                <h2>Date du casting</h2>
                                                <h3><?php echo $date ?></h3>
                                            </div>
                                        </div><!--/.col-md-4-->
                                      
                                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <div class="feature-wrap">
                                                <h2>Domaine</h2>
                                                <h3><?php echo $domaine ?></h3>
                                            </div>
                                        </div><!--/.col-md-4-->                                     
                                    </div><!--/.services-->
                                </div><!--/.row-->    
                            </div><!--/.container-->
                        </section><!--/#feature-->
                        <div class="row wowload fadeInLeftBig" style="text-align: center;">
                            <?php if ($level_information == 2) { ?>
                                 <a href="download.php?id=2">
                                     <input type="button" id="download_xml" class="btn btn-primary" value="Récupérer l'offre en XML">
                                 </a>
                            <?php } ?>
                            <?php if ($level_information == 3) { ?>
                                 <a href="inscription.php">
                                     <input type="button" id="inscription" class="btn btn-primary" value="S'inscrire à ce casting">
                                 </a>
                            <?php } ?>
                            <input type="button" id="cancel_personnal" class="btn btn-primary" value="Retour">
                        </div>
                    </div>        
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="post">
        <div class="container_post">
        </div>
    </section><!--/#middle-->
    </br>
    
    <footer id="footer" class="midnight-blue">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    &copy; 2015 <a target="_blank" href="#" title="Megacasting, votre réussite, notre plus belle aventure">MegaCasting</a>. All Rights Reserved.
                </div>
                <div class="col-sm-6">
                    <ul class="pull-right">
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="contact-us.php">Contactez nous</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer><!--/#footer-->

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/wow.min.js"></script>
</body>
</html>
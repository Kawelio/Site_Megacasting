<?php session_start(); ?>
<?php require_once 'connexion.php'; ?>
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
</head><!--/head-->

<body class="homepage">
    <!-- MASQUE -->
    <div id="mask"></div>²
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
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" id="search" autocomplete="off" placeholder="Search" required="true">
                                    <input type="button" id="search_index" class="fa fa-search">
                                </form>
                           </div>
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
                        <li><a href="about-us.php">A propos</a></li>
                        <li><a href="services.php">Services</a></li>
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
                ?>
                  <div class='container_annonce'>
                       <section id="feature" >
                            <div class="container">
                               <div class="center wow fadeInDown">
                                    <h2><?php echo $resultat->int_offre ?></h2>
                                    <p class="lead"><?php echo $resultat->desc_offre ?></p>
                                </div>

                                <div class="row">
                                    
                                    <div class="row">
		
					<div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
							<div class="joomla-skill">                                   
								<p><em>Lieu</em></p>
								<p><?php echo $resultat->loc_offre ?></p>
							</div>
						</div>
					</div>
					
					 <div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="html-skill">                                  
								<p><em>Contrat</em></p>
								<p><?php echo $resultat->lib_contrat ?></p>
							</div>
						</div>
					</div>
					
					<div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="900ms">
							<div class="css-skill">                                    
								<p><em>Durée</em></p>
								<p><?php echo $resultat->duree_offre ?> jours</p>
							</div>
						</div>
					</div>
					
					 <div class="col-sm-3">
						<div class="sinlge-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
							<div class="wp-skill">
								<p><em>Métier</em></p>
								<p><?php echo $resultat->lib_metier ?></p>                                     
							</div>
						</div>
					</div>
					
                                    </div>
                                    <div class="features">
                                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <div class="feature-wrap">
                                                <h2>Référence du casting</h2>
                                                <h3><?php echo $resultat->ref_offre ?></h3>
                                            </div>
                                        </div><!--/.col-md-4-->
                                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <div class="feature-wrap">
                                                <h2>Date du casting</h2>
                                                <h3><?php echo $resultat->date_offre ?></h3>
                                            </div>
                                        </div><!--/.col-md-4-->
                                      
                                        <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                                            <div class="feature-wrap">
                                                <h2>Domaine</h2>
                                                <h3><?php echo $resultat->lib_domaine ?></h3>
                                            </div>
                                        </div><!--/.col-md-4-->                                     
                                    </div><!--/.services-->
                                </div><!--/.row-->    
                            </div><!--/.container-->
                        </section><!--/#feature-->
                    </div>
                  <?php 
                  } 
                  ?>
                
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
                        <li><a href="#">Accueil</a></li>
                        <li><a href="#">A propos</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Contactez nous</a></li>
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
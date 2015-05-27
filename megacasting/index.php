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
                            <div class="search">
                                <form role="form">
                                    <input type="text" class="search-form" autocomplete="off" placeholder="Search">
                                    <i class="fa fa-search"></i>
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Casting <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog-item.php">Spectacle</a></li>
                                <li><a href="pricing.php">Image</a></li>
                                <li><a href="404.php">Musique</a></li>
                                <li><a href="shortcodes.php">Shortcodes</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.php">Blog</a></li> 
                        <li><a href="contact-us.php">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
		
    </header><!--/header-->

    <section id="feature" >
        <div class="container">
           <div class="center wow fadeInDown">
                <h2>Megacasting</h2>
                <p class="lead">MegaCasting vous accompagne et vous apporte un soutien en administration, en diffusion, vous met à disposition du matériel et des outils de travail, vous accompagne sur les dates de tournées, gère vos diffusions et vos communications. MegaCasting est devenu un véritable partenaire pour ces compagnies et ces artistes.</p>
            </div>

            <div class="row">
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-bullhorn"></i>
                            <h2>Annonce en temps réel</h2>
                            <h3>Des offres pourront vous correspondre</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-comments"></i>
                            <h2>Discutez avec des professionels</h2>
                            <h3>Toutes offres sont vérifiés et validés</h3>
                        </div>
                    </div><!--/.col-md-4-->

                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa fa-cogs"></i>
                            <h2>Customisation personnalisé</h2>
                            <h3>Profitez d'une expérience intuitive</h3>
                        </div>
                    </div><!--/.col-md-4-->
                </div><!--/.services-->
            </div><!--/.row-->    
        </div><!--/.container-->
    </section><!--/#feature-->

    <section id="post">
        <div class="container_post">
            <?php
              $resultats=$bdd->query("SELECT desc_offre, int_offre, date_offre, nom_annonceur FROM offre INNER JOIN annonceur ON annonceur.id_annonceur=offre.id_annonceur");
              $resultats->setFetchMode(PDO::FETCH_OBJ);
              while( $resultat = $resultats->fetch() )
              {
                echo "<header><span id='post_title'>".$resultat->int_offre."</span><span id='post_by'>".$resultat->nom_annonceur."</span><span id='post_date'>".$resultat->date_offre."</span></header><article>".$resultat->desc_offre."</article>";
              }
              $resultats->closeCursor();
            ?>
        </div>
    </section><!--/#middle-->

    <section id="conatcat-info">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="media contact-info wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="pull-left">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="media-body">
                            <h2>Vous avez des questions ou besoin d'aide ?</h2>
                            <p>Nous pouvons surement vous aidez et sommes à votre disposition, contactez nous via le formulaire de contact ou au +0123 456 70 80</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/.container-->    
    </section><!--/#conatcat-info-->

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
    <script type="text/javascript">
        $(function(){
            $(".connexion").click(function(){
                if($("#mask").is(':visible'))
                {
                    $("#mask").fadeOut();
                    $("#login-box").fadeOut();
                    $("#register-box").fadeOut();
                }
                else
                {
                    $("#mask").fadeIn();
                    $("#login-box").fadeIn();
                }
            });

            $(".inscription").click(function(){
                if($("#mask").is(':visible'))
                {
                    $("#mask").fadeOut();
                    $("#login-box").fadeOut();
                    $("#register-box").fadeOut();
                }
                else
                {
                    $("#mask").fadeIn();
                    $("#register-box").fadeIn();
                }
            });
            
            $(".compte").click(function(){
                if($("#mask").is(':visible'))
                {
                    $("#mask").fadeOut();
                    $("#login-box").fadeOut();
                    $("#account-box").fadeOut();
                }
                else
                {
                    $("#mask").fadeIn();
                    $("#account-box").fadeIn();
                }
            });

            $(".login-box-lien-register").click(function(){
                $("#register-box").fadeOut();
                $("#account-box").fadeOut();
                $("#band .inscription").hide();
                $("#band .compte").hide();
                $("#login-box").fadeIn();
                $("#band .connexion").show();
            });
        
            $(".register-box-lien-register").click(function(){
                $("#login-box").fadeOut();
                $("#band .connexion").hide();
                $("#register-box").fadeIn();
                $("#band .inscription").show();
            });
            
            $(".account-box-lien-register").click(function(){
                $("#login-box").fadeOut();
                $("#band .connexion").hide();
                $("#account-box").fadeIn();
                $("#band .compte").show();
            });
            
            $(".deconnect").click(function(){
                $("#register-box").fadeOut();
                $("#account-box").fadeOut();
                $("#mask").fadeOut();
                $("#band .inscription").hide();
                $("#band .compte").hide();
                $("#band .connexion").show();
            });

            $("#mask").click(function(){
                $("#mask").fadeOut();
                $("#login-box").fadeOut();
                $("#register-box").fadeOut();
                $("#account-box").fadeOut();
            });
        });
    </script>
</body>
</html>
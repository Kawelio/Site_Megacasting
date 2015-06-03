<?php
require_once 'connexion.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Megacasting | Activation</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/megacasting.css" rel="stylesheet">
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
    //Activate form
    </script>
</head><!--/head-->
<body>

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
                        <li><a href="contact-us.php">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <div id="login" class="spacer form-style">
        <div class="center">
        <h2>Activation de votre compte</h2>
        <?php
        	$token = $_GET['token'];
			$mail = $_GET['mail'];
			if(!empty($_GET)){
			    $q = array('mail' => $mail, 'token' => $token);
			    $sql = 'SELECT token_information, mail_information FROM information WHERE mail_information = :mail AND token_information = :token';
			    $req = $bdd->prepare($sql);
			    $req->execute($q);
			    $count = $req->rowCount($sql);
			    if($count == 1){
			        $v = array('mail' => $mail, 'validation' => '1');
			        //Verifier si l'utilisateur est actif
			        $sql = 'SELECT token_information, validation_information FROM information WHERE mail_information = :mail AND validation_information = :validation';
			        $req = $bdd->prepare($sql);
			        $req->execute($v);
			        $dejactif = $req->rowCount($sql);
			        if($dejactif == 1){
			            echo 'Utilisateur déjà actif !';
			        } else {
			            //Sinon on active l'utilisateur
			            $u = array('mail' => $mail, 'validation' => '1');
			            $sql = 'UPDATE information SET validation_information = :validation WHERE mail_information = :mail';
			            $req = $bdd->prepare($sql);
			            $req->execute($u);
			            echo 'Votre compte est desormais actif !';
			        }
			    } else {
			       echo 'La validation a échoué, le token est invalide !';
			    }
			}
		?>
        </div>
    </div>
    <br/>
    </div>
<!--Contact Ends-->

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
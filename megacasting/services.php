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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            //Login form
            $("#connection_services").click(function() { 
                   
                var proceed = true;
                $("#registers input[required=true], #registers textarea[required=true]").each(function(){
                    $(this).css('border-color',''); 
                    if(!$.trim($(this).val())){
                        $(this).css('border-color','red');
                        proceed = false;
                    }
                    //check invalid email
                    var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                    if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                        $(this).css('border-color','red');  
                        proceed = false;       
                    } 
                });
                if(proceed){
                    post_data = {
                        'intitule'   : $('input[name=intitule]').val(), 
                        'reference'  : $('input[name=reference]').val(), 
                        'date'  : $('input[name=date]').val(), 
                        'duree'  : $('input[name=duree]').val(), 
                        'date_debut'  : $('input[name=date_debut]').val(), 
                        'localisation'  : $('input[name=localisation]').val(), 
                        'description'  : $('input[name=description]').val(), 
                        'type_contrat'  : $('select[name=type_contrat]').val(), 
                        'metier'  : $('select[name=metier]').val(), 
                        'domaine'  : $('select[name=domaine]').val() 
                    };
                        
                    //Ajax post data to server
                    $.post('ajax_services.php', post_data, function(response){  
                    if(response.type == 'error'){ 
                      output = '<div class="error">'+response.text+'</div>';
                    }else{
                        output = '<div class="success">'+response.text+'</div>';
                        setTimeout("window.location.href='index.php' ", 4000);
                      //reset values in all input fields
                      $("#registers  input[required=true], #registers textarea[required=true]").val(''); 
                    }
                    $("#results").hide().html(output).slideDown();}, 'json');
                }
            });
                
            $("#registers input[required=true], #registers textarea[required=true]").keyup(function() { 
                $(this).css('border-color',''); 
                $("#results").slideUp();
            });
        });
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
                        <li><a href="index.php">Accueil</a></li>
                        <li class="active"><a href="services.php">Déposer offre</a></li>
                        <li><a href="contact-us.php">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

  
 <!-- Dépot annonce -->

 <div id="registers" class="spacer form-style">
        <div class="container registerform center">
            <h2 class="text-center wowload fadeInUp title_b">Déposer une offre</h2>
            <div id="register_body" class="row wowload fadeInLeftBig">      
                <div class="col-sm-6 col-sm-offset-3 col-xs-12">  
                 <?php
                    if(Auth::islog()){
                        $req = $bdd->query("SELECT mail_information, password_information, level_information FROM information WHERE mail_information = '" . $_SESSION['Auth']['login'] . "' AND password_information = '" . $_SESSION['Auth']['password'] . "' AND validation_information = '1'");
                        $row = $req->fetch();
                        if($row['level_information'] == '1'){
                            echo '<p>Intitulé : <input class="login_body" type="text" required="true" placeholder="Intitule" id="intitule" name="intitule"></p>';
                            echo '<p>Référence : <input class="login_body" type="text" required="true" placeholder="Reference" id="reference" name="reference"></p>';
                            echo '<p>Date : <input class="login_body" type="date" required="true" placeholder="Date" id="date" name="date"></p>';
                            echo '<p>Durée : <input class="login_body" type="number" required="true" placeholder="Duree" id="duree" name="duree"> jours</p>';
                            echo '<p>Date début : <input class="login_body" type="date" required="true" placeholder="Date debut" id="date_debut" name="date_debut"></p>';
                            echo '<p>Ville : <input class="login_body" type="text" required="true" placeholder="Localisation" id="localisation" name="localisation"></p>';
                            echo '<p>Description : <input class="login_body" type="text" required="true" placeholder="Description" id="description" name="description"></p>';
                            echo '<p>Type de contrat : <select class="login_body" name="type_contrat" id="type_contrat">';                        
                                $resultats=$bdd->query("SELECT id_contrat, lib_contrat FROM contrat ");
                                $resultats->setFetchMode(PDO::FETCH_OBJ);
                                while( $resultat = $resultats->fetch())
                                {
                                    echo "<option value=".$resultat->id_contrat.">".$resultat->lib_contrat."</option>" ;  
                                }
                                $resultats->closeCursor();                   
                            echo '</select></p>';
                            
                            echo '<p>Métier : <select class="login_body" name="metier" id="metier">';                         
                                $resultats=$bdd->query("SELECT id_metier, lib_metier FROM metier ");
                                $resultats->setFetchMode(PDO::FETCH_OBJ);
                                while( $resultat = $resultats->fetch())
                                {
                                    echo "<option value=".$resultat->id_metier.">".$resultat->lib_metier."</option>" ;  
                                }
                                $resultats->closeCursor();                    
                            echo '</select></p>';
                            
                            echo '<p>Domaine : <select class="login_body" name="domaine" id="domaine">';                         
                                $resultats=$bdd->query("SELECT id_domaine, lib_domaine FROM domaine ");
                                $resultats->setFetchMode(PDO::FETCH_OBJ);
                                while( $resultat = $resultats->fetch())
                                {
                                    echo "<option value=".$resultat->id_domaine.">".$resultat->lib_domaine."</option>" ;  
                                }
                                $resultats->closeCursor();                     
                            echo '</select></p>';
                            echo "<button id='connection_services' class='btn btn-primary'>Déposer l\'offre</button>";
                        } else {
                            header( "refresh:5;url=index.php" ); 
                            echo '<p>Vous n\'avez pas le type de compte pour déposer une annonce ! Vous allez être rediriger</p>';
                        }

                    }else{
                        header( "refresh:5;url=login.php" ); 
                        echo '<p>Vous n\'êtes pas connecter ! Vous allez être rediriger</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
        <br/>
        <div id="results"></div>
        <br/>
    </div>
    
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
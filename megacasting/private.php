<?php session_start(); ?>
<?php
require('auth.php');
if(Auth::islog()){
}else{
	header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Megacasting | Private</title>
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
    //Login form
    $(document).ready(function() {
        // Login form
        $("#button_infos").click(function() { 
            $("#affichage_infos").fadeOut();
            $("#modif_infos").fadeIn();
        });

        $("#button_modif_password").click(function() { 
            $("#affichage_infos").fadeOut();
            $("#modif_password").fadeIn();
        });

        $("#cancel_modif").click(function() { 
            $("#modif_infos").fadeOut();
            $("#affichage_infos").fadeIn();
        });

         $("#cancel_modif_bis").click(function() { 
            $("#modif_password").fadeOut();
            $("#affichage_infos").fadeIn();
        });

        $("#button_valid_infos").click(function() { 

            var proceed = true;
            $("#modif_infos input[required=true]").each(function(){
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
                    'telfixe'   : $('input[name=telfixe]').val(), 
                    'telport'   : $('input[name=telport]').val(), 
                    'rue'  : $('input[name=rue]').val(), 
                    'ville'  : $('input[name=ville]').val(), 
                    'cp'  : $('input[name=cp]').val(), 
                    'pays'  : $('input[name=pays]').val(), 
                    'login'  : $('input[name=login]').val()
                };
                      
                //Ajax post data to server
                $.post('ajax_infos.php', post_data, function(response){  
                if(response.type == 'error'){ 
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#modif_infos  input[required=true]"); 
                    setTimeout("window.location.href='index.php' ", 4000);
                }
                $("#results_infos").hide().html(output).slideDown();}, 'json');
                }
        });

        $("#button_valid_password").click(function() { 

            var proceed = true;
            $("#modif_infos input[required=true]").each(function(){
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
                    'password'   : $('input[name=password]').val(), 
                    'password_validation'   : $('input[name=password_validation]').val()
                };
                      
                //Ajax post data to server
                $.post('ajax_password.php', post_data, function(response){  
                if(response.type == 'error'){ 
                    output = '<div class="error">'+response.text+'</div>';
                }else{
                    output = '<div class="success">'+response.text+'</div>';
                    //reset values in all input fields
                    $("#modif_infos  input[required=true]"); 
                    setTimeout("window.location.href='private.php' ", 4000);
                }
                $("#results_infos").hide().html(output).slideDown();}, 'json');
                }
        });
                
        $("#modif_infos input[required=true]").keyup(function() { 
            $(this).css('border-color',''); 
            $("#results_infos").slideUp();
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
                        <li><a href="services.php">Services</a></li>
                        <li><a href="contact-us.php">Contact</a></li>                        
                    </ul>
                </div>
            </div><!--/.container-->
        </nav><!--/nav-->
        
    </header><!--/header-->

    <div id="login" class="spacer form-style">
        <div class="container contactform center" id="contact_body">
            <h2 class="text-center wowload fadeInUp title_b">Gestion du compte</h2>
            <div id="infos_account">
                <div id="affichage_infos">
                <?php 
                        require_once 'connexion.php';
                        $req = $bdd->query("SELECT tel_fixe_information, tel_port_information, rue_information, ville_information, cp_information, pays_information, level_information, mail_information, password_information, validation_information FROM information WHERE mail_information = '" . $_SESSION['Auth']['login'] . "' AND password_information = '" . $_SESSION['Auth']['password'] . "' AND validation_information = '1'");
                        $row = $req->fetch();
                        if($row['level_information'] == '3'){
                            $level = 'Artiste';
                        } else if($row['level_information'] == '2'){
                            $level = 'Diffuseur';
                        } else if($row['level_information'] == '1'){
                            $level = 'Annonceur';
                        } else {
                            $level = 'Type de compte invalide';
                        }
                        echo '</br>Vos informations : </br>Identifiant : ' . $_SESSION['Auth']['login'] . '</br>Téléphone fixe : ' . $row['tel_fixe_information'] . '</br>Téléphone portable : ' . $row['tel_port_information'] . '</br>Rue : ' . $row['rue_information'] . '</br>Ville : ' . $row['ville_information'] . '</br>Code postal : ' . $row['cp_information'] . '</br>Pays : ' . $row['pays_information'] . '</br>Type de compte : ' . $level . '</br><button id="button_infos" class="btn btn-primary">Modifier mes informations</button></br>';
                        echo '<button id="button_modif_password" class="btn btn-primary">Modifier mon mot de passe</button></br>'; 
                ?>
                </div>
                <div id="modif_infos">
                <?php 
                        require_once 'connexion.php';
                        $req = $bdd->query("SELECT tel_fixe_information, tel_port_information, rue_information, ville_information, cp_information, pays_information, level_information, mail_information, password_information, validation_information FROM information WHERE mail_information = '" . $_SESSION['Auth']['login'] . "' AND password_information = '" . $_SESSION['Auth']['password'] . "' AND validation_information = '1'");
                        $row = $req->fetch();
                        if($row['level_information'] == '3'){
                            $level = 'Artiste';
                        } else if($row['level_information'] == '2'){
                            $level = 'Diffuseur';
                        } else if($row['level_information'] == '1'){
                            $level = 'Annonceur';
                        } else {
                            $level = 'Type de compte invalide';
                        }
                        echo '</br>Vos informations : <p>Identifiant : <input required="true" name="login" type="email" value="' . $_SESSION['Auth']['login'] . '"></p><p>Téléphone fixe : <input required="true" type="text" name="telfixe" value="' . $row['tel_fixe_information'] . '"></p><p>Téléphone portable : <input required="true" type="text" name="telport" value="' . $row['tel_port_information'] . '"></p><p>Rue : <input required="true" type="text" name="rue" value="' . $row['rue_information'] . '"></p><p>Ville : <input required="true" type="text" name="ville" value="' . $row['ville_information'] . '"></p><p>Code postal : <input required="true" type="text" name="cp" value="' . $row['cp_information'] . '"></p><p>Pays : <input required="true" type="text" name="pays" value="' . $row['pays_information'] . '"></p><button id="button_valid_infos" class="btn btn-primary">Valider mes informations</button></br><button id="cancel_modif" class="btn btn-primary">Annuler</button></br>'; 
                ?>
                </div>
                <div id="modif_password">
                <?php 
                        require_once 'connexion.php';
                        $req = $bdd->query("SELECT level_information, password_information, validation_information FROM information WHERE mail_information = '" . $_SESSION['Auth']['login'] . "' AND password_information = '" . $_SESSION['Auth']['password'] . "' AND validation_information = '1'");
                        $row = $req->fetch();
                        if($row['level_information'] == '3'){
                            $level = 'Artiste';
                        } else if($row['level_information'] == '2'){
                            $level = 'Diffuseur';
                        } else if($row['level_information'] == '1'){
                            $level = 'Annonceur';
                        } else {
                            $level = 'Type de compte invalide';
                        }
                        echo '<p>Nouveau mot de passe : <input required="true" name="password" type="password" value=""></p><p>Confirmation du mot de passe : <input required="true" type="password" name="password_validation" value=""></p><button id="button_valid_password" class="btn btn-primary">Valider mon mot de passe</button></br><button id="cancel_modif_bis" class="btn btn-primary">Annuler</button></br>';
                ?>
                </div>
                <button onclick="window.location.href = 'logout.php';" class="btn btn-primary">Se déconnecter</button>
            </div>
        </div>
        <br/>
        <div id="results_infos"></div>
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
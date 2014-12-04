<?php

define('BASEURL', dirname($_SERVER['SCRIPT_NAME']));
define('BASEPATH', dirname($_SERVER['SCRIPT_FILENAME']));

?>

<!DOCTYPE html>
<html>
<head>
	<title>Humanity</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="<?=BASEURL?>//bootstrap-3.3.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASEURL?>/style.css" type="text/css">
	<script src="<?=BASEURL?>/jquery-2.1.1/jquery.min.js"></script>
	<script src="<?=BASEURL?>/bootstrap-3.3.0/js/bootstrap.min.js"></script>
</head>
<body>

<header>
	
	<nav class="navbar navbar-default navbar-inverse" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=BASEURL?>"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Trocteur</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Objets <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=BASEURL?>/index.php/trocobj/listerBiens">Liste des objets</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=BASEURL?>/index.php/bien/maliste">Mes objets</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Services <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?=BASEURL?>/index.php/trocobj/listerServices">Liste des services</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=BASEURL?>/index.php/bien/maliste">Mes services</a></li>
                        </ul>
                    </li>

                    <li><a href="<?=BASEURL?>/index.php/trocobj/proposerBien">Proposer</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-sort" aria-hidden="true"></span> Troquer</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="<?=BASEURL?>/index.php/user/modification">
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                        </a>
                    </li>
                    <li><a href="<?=BASEURL?>/index.php/user/deconnexion">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        Déconnexion
                    </a></li>
                    <li><a href="<?=BASEURL?>/index.php/user/inscription">S'inscrire</a></li>
                    <li><a href="<?=BASEURL?>/index.php/user/connexion">Se connecter</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</header>

</body>
</html>
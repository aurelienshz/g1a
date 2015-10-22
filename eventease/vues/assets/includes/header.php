<?php
/* HEADER PARTAGE ENTRE LES PAGES
A venir : distinction header connecté / non connecté (comment ? contrôleur ou vue ? Suggestions & discussions bienvenues) -- Aurélien
*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $title; ?> | EventEase</title>
    <link rel="stylesheet" href="<?php echo CSS.'style.css' ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>
    <header class="">
        <h1>
            <a href="#">
                <img src="<?php echo IMAGES . 'logo.jpg'; ?>" alt="EventEase" />
            </a>
        </h1>
        <nav>
          <ul id="raccourcis">
            <li><a href="#"><i class="fa fa-home fa-fw"></i>&nbsp;Accueil</a></li>
            <li><a href="#"><i class="fa fa-plus"></i>&nbsp;Créer</a></li>
            <li><a href="#"><i class="fa fa-search"></i>&nbsp;Chercher</a></li>
          </ul>
          <ul id="membre">
            <li><a href="#"><i class="fa fa-sign-in"></i>&nbsp;Connexion</a></li>
            <li><a href="#"><i class="fa fa-pencil-square-o"></i>&nbsp;Inscription</a></li>
          </ul>
        </nav>
    </header>
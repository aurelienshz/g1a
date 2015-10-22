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
            <li><a href="#">Accueil</a></li>
            <li><a href="#">Créer</a></li>
            <li><a href="#">Chercher</a></li>
          </ul>
          <ul id="membre">
            <li><a href="#">Connexion</a></li>
            <li><a href="#">Inscription</a></li>
          </ul>
        </nav>
    </header>
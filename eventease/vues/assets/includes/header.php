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
    
<?php
    foreach($styles as $style) {
        echo '    <link rel="stylesheet" href="' . CSS . $style . '" type="text/css" media="all" />'."\n";
    }
?>
    <link rel="stylesheet" href="<?php echo CSS.'eventease.css' ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

</head>
<body>
    <header class="">
        <h1>
            <a href="#"><img src="<?php echo IMAGES . 'logo.jpg'; ?>" alt="EventEase" /></a>
        </h1>
        <nav>
          <ul id="raccourcis">
            <li><a href="#"><span class="fa fa-home"></span>&nbsp;Accueil</a></li>
            <li><a href="#"><span class="fa fa-plus"></span>&nbsp;Créer</a></li>
            <li><a href="#"><span class="fa fa-search"></span>&nbsp;Chercher</a></li>
          </ul>
          <ul id="membre">
            <li><a href="#"><span class="fa fa-sign-in"></span>&nbsp;Connexion</a></li>
            <li><a href="#"><span class="fa fa-pencil-square-o"></span>&nbsp;Inscription</a></li>
          </ul>
        </nav>
    </header>
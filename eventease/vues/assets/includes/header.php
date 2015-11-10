<?php /* HEADER PARTAGE ENTRE LES PAGES */ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php if(isset($title)) { echo $title.' | ';}; ?>EventEase</title>

    <link rel="stylesheet" href="<?php echo CSS.'eventease.css' ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?php echo CSS.'font-awesome.min.css'?>">
    <?php
    if(isset($styles)) {
        foreach($styles as $style) {
            echo '    <link rel="stylesheet" href="' . CSS . $style . '" type="text/css" media="all" />'."\n";
        }
    }
    ?>

</head>
<body>

<?php
/* Barre de debug : */
if(isset($_SESSION['debug']) AND $_SESSION['debug']) {
    displayDebug();
}
?>
    <header class="">
        <h1>
            <a href="<?php echo getLink('home'); ?>"><img src="<?php echo IMAGES . 'logo.jpg'; ?>" alt="EventEase" /></a>
        </h1>
        <nav>
            <ul id="raccourcis">
            <li><a href="<?php echo getLink('accueil');?>"><span class="fa fa-home"></span>&nbsp;Accueil</a></li>
            <li><a href="<?php echo getLink('createEvent');?>"><span class="fa fa-plus"></span>&nbsp;Créer</a></li>
            <li><a href="#"><span class="fa fa-search"></span>&nbsp;Chercher</a></li>
            </ul>
<?php
if(isset($_SESSION['connected']) AND $_SESSION['connected']) {?>
            <ul id="membre">
                <li dir="rtl"><a href="<?php echo getLink('deconnexion'); ?>" id="pseudo"><span class="fa fa-user"></span>&nbsp;<?php echo $_SESSION['username'];?> - Déconnexion</a></li>
                <li dir="rtl"><a href="#"><span class="fa fa-bell"></span>&nbsp;Alertes</a></li>
            </ul>
<?php }
else { //Si pas d'user connecté ?>
            <ul id="membre">
                <li dir="rtl"><a href="<?php echo getLink('connexion'); ?>"><span class="fa fa-sign-in"></span>&nbsp;Connexion</a></li>
                <li dir="rtl"><a href="<?php echo getLink('inscription'); ?>"><span class="fa fa-pencil-square-o"></span>&nbsp;Inscription</a></li>
            </ul>
<?php } ?>
        </nav>
    </header>
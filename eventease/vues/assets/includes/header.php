<?php
/* HEADER PARTAGE ENTRE LES PAGES */ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php if(isset($title)) { echo $title.' | ';}; ?>EventEase</title>
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo IMAGES.'favicon-96x96.png'; ?>">
	
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

    <header>
        <h1>
            <a href="<?php echo getLink(); ?>"><img src="<?php echo IMAGES.'logo2.png'; ?>" alt="EventEase" /></a>
        </h1>
        <nav>
            <ul id="raccourcis">
                <li><a href="<?php echo getLink();?>"><span class="fa fa-home"></span>&nbsp;Accueil</a></li>
                <li><a href="<?php echo getLink(['events','create']);?>"><span class="fa fa-plus"></span>&nbsp;Créer</a></li>
                <li><a href="<?php echo getLink(['events','search']); ?>"><span class="fa fa-search"></span>&nbsp;Chercher</a></li>
            </ul>
<?php
/* SI USER CONNECTÉ : */
if(connected()) {?>
            <ul id="membre">
                <li dir="rtl" id="actionsMembre" class="menuTrigger">
                    <a href="#" id="pseudo"><span class="fa fa-user"></span>&nbsp;<?php echo $_SESSION['username'];?></a>
                    <ul class="menuDeroulant">
                        <li><a href="<?php echo getLink(['membres','messages']); ?>">       Messages</a></li>
                        <li><a href="<?php echo getLink(['membres','profil']); ?>">         Mon compte</a></li>
                        <li><a href="<?php echo getLink(['membres','deconnexion']); ?>">    Déconnexion</a></li>
                    </ul>
                </li>
                <li dir="rtl" id="alertes" class="menuTrigger">
                    <a href="#"><span class="fa fa-bell"></span>&nbsp;Alertes</a>
                    <ul class="menuDeroulant">
                        <li><a href="<?php echo getLink(['membres','messages',666]); ?>">Nouveau message de Kevin</a></li>
                        <li><a href="<?php echo getLink(['events']); ?>">Kevin vous a invité à son évènement</a></li>
                    </ul>
                </li>
            </ul>
<?php
}

/* SI USER DÉCONNECTÉ : */
else { ?>
            <ul id="membre">
                <li dir="rtl"><a href="<?php echo getLink(['membres','connexion']); ?>"><span class="fa fa-sign-in"></span>&nbsp;Connexion</a></li>
                <li dir="rtl"><a href="<?php echo getLink(['membres','inscription']); ?>"><span class="fa fa-pencil-square-o"></span>&nbsp;Inscription</a></li>
            </ul>
<?php } ?>
        </nav>
    </header>

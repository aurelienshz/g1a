<?php
/*** CONTROLEUR EVENEMENTS PROFIL ***/

/**** Préparation des contenus ****/

require MODELES.'membres/getUserDetails.php';

//if(isset($_GET['id'])) {
    $contents['pseudo'] = getUserDetails($_SESSION['id'])['pseudo'];
//}
/**** Affichage de la page ****/

$contents['ongletActif'] = 'evenements';

$title = 'Evenements de '.$contents['pseudo'];
$styles = ['onglets_compte.css'];
$blocks = ['onglets_compte', 'evenements'];
//Appels des vues :
vue($blocks,$styles,$title,$contents);

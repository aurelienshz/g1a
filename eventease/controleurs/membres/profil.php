<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/

require MODELES.'membres/getUserDetails.php';

//if(isset($_GET['id'])) {
    $user = getUserDetails('j\'aime les chats');
//}
/**** Affichage de la page ****/

$title = 'Profil de '.$user['pseudo'];
$styles = ['onglets_compte.css','membres.css'];
$blocks = ['onglets_compte', 'profil'];

$contents['ongletActif'] = 'profil';
//Appels des vues :
vue($blocks,$styles,$title, $contents);

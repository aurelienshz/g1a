<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/

require MODELES.'membres/getPrivateMessages.php';
require MODELES.'membres/getUserName.php';

if(!connected()) {
    alert('error', 'Vous devez vous connecter pour voir cette page');
    header("Location: ".getLink(['membres','connexion']));
    exit();
}
else {
    $contents['messages'] = getPrivateMessages($_SESSION['id']);
}

$contents['ongletActif'] = 'messages';

$title = 'Messages privés';
$styles = ['onglets_compte.css','membres.css'];
$blocks = ['onglets_compte', 'messages'];
//Appels des vues :
vue($blocks,$styles,$title,$contents);

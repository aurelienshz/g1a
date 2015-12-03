<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/

require MODELES.'membres/getUserDetails.php';
require MODELES.'membres/connected.php';

/* Condition d'affichage de *mon* profil :
- id défini :
    - je suis connecté :
        - c'est le mien : on affiche "mon compte"
        - ce n'est pas le mien : on affiche le profil avec les bon params
- pas d'id défini :
    - connecté : on affiche mon profil
    - déconnecté : on affiche une erreur (vous devez vous connecter)

*/

print_r($_SESSION);

if(isset($_GET['id'])) {
    if($_GET['id']==$_SESSION['id']) {
        // 
        $blocks = ['onglets_compte','profil'];
    }
    else {
        $blocks = ['profil'];
    }
}
else {
    if()
}

/**** Affichage de la page ****/

$title = 'Profil de pseudo';
$styles = ['onglets_compte.css','membres.css'];
$blocks = ['onglets_compte', 'profil'];

$contents['ongletActif'] = 'profil';
//Appels des vues :
vue($blocks,$styles,$title, $contents);

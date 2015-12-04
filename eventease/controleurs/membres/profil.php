<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/

require MODELES.'membres/getUserDetails.php';

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
    if(connected() && $_GET['id']==$_SESSION['id']) {
        $title = 'Mon profil';
        $contents['pseudo'] = '### Mon profil ###';
        $contents['ongletActif'] = 'profil';
        $styles = ['onglets_compte.css','membres.css'];
        $blocks = ['onglets_compte','profil'];
    }
    else {
        // Profil de quelqu'un d'autre :
        //
        // ... requête à la BDD ...
        //
        $title = 'Profil de ##';
        $contents['ongletActif'] = 'profil';
        $contents['pseudo'] = '###';
        $styles = ['membres.css'];
        $blocks = ['profil'];
    }
}
else {  // (!isset($_GET['id']))
    if(connected()) {
        // on affiche mon profil :
        $title = 'Mon profil';
        $styles = ['onglets_compte.css','membres.css'];
        $blocks = ['onglets_compte', 'profil'];
        $contents['ongletActif'] = 'profil';
    }
    else {
        // Erreur : t'as pas le droit (bâtard).
        alert('error', 'Vous devez être connecté pour accéder à cette page !');
        header('Location: '.getLink(['membres','connexion']));
        exit();
    }
}

/**** Affichage de la page ****/
vue($blocks,$styles,$title, $contents);

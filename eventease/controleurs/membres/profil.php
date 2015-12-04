<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/

/* Condition d'affichage de *mon* profil :
- id défini :
    - je suis connecté :
        - c'est le mien : on affiche "mon compte"
        - ce n'est pas le mien : on affiche le profil avec les bon params
- pas d'id défini :
    - connecté : on affiche mon profil
    - déconnecté : on affiche une erreur (vous devez vous connecter)

*/

require MODELES.'membres/getUserDetails.php';

if(isset($_GET['id'])) {
    // Si je suis en train d'afficher mon profil :
    if(connected() && $_GET['id']==$_SESSION['id']) {
        // On affichera les onglets :
        $styles = ['onglets_compte.css'];
        $blocks = ['onglets_compte'];
        $contents['ongletActif'] = 'profil';

        $details = getUserDetails($_SESSION['id']);
        echo '<pre>';
        var_dump($details);
        echo '</pre>';

        $title = 'Mon profil';

        $contents['pseudo'] = $_SESSION['username'];
        $contents['general'] = array_merge($contents, [
            'pseudo' => $details['pseudo'],
            'mail' => $details['mail'],
            'statut' => ($details['moderateur']) ? 'Modérateur' : 'Membre',
// /* fac */   'id_photo' => isset($details['id_photo'])?'usermedia/'.$details['id_photo'],IMAGES/'photo_profil_defaut.png';
/* fac */   'nom' => isset($details['nom'])?'':'Nom : '.$details['nom'],
/* fac */   'prenom' => isset($details['prenom'])?'':'Prénom : '.$details['prenom'],
/* fac */   'ddn' => isset($details['ddn'])?'':'Date de naissance : '.$details['ddn'],
/* fac */   'description' => isset($details['description'])?'Description':' : '.$details['description'],
/* fac */   'langue' => isset($details['langue'])?'':'Langue : '.$details['langue'],
            // 'adresse' => $details[''],
            ]);
        echo '<pre>';
        var_dump($contents);
        echo '</pre>';
    }
    else {
        // Profil de quelqu'un d'autre :
        //
        // ... requête à la BDD ...
        //
        $title = 'Profil de ##';
        $contents['pseudo'] = '###';
            }
}
else {  // (empty($_GET['id']))
    if(connected()) {
        // on affiche mon profil :
        $contents['pseudo'] = $_SESSION['username'];
        $title = 'Mon profil';
        $styles = ['onglets_compte.css','membres.css'];
        $blocks = ['onglets_compte', 'profil'];
    }
    else {
        // Erreur : t'as pas le droit (bâtard).
        alert('error', 'Vous devez être connecté pour accéder à cette page !');
        header('Location: '.getLink(['membres','connexion']));
        exit();
    }
}

$styles[] = 'membres.css';
$blocks[] = 'profil';

/**** Affichage de la page ****/
vue($blocks,$styles,$title, $contents);

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
$contents = [];

function loadContents($details) {
    global $contents;

    $contents = array_merge($contents, [
                'pseudo' => $details['pseudo'],
                'mail' => $details['mail'],
                'statut' => ($details['moderateur']) ? 'Statut : Modérateur' : 'Statut : Membre',
    /* fac */   'photo' => isset($details['id_photo'])?'usermedia/'.$details['id_photo']:IMAGES.'photo_profil_defaut.jpg',
    /* fac */   'nom' => isset($details['nom'])?'Nom : '.$details['nom']:'',
    /* fac */   'prenom' => isset($details['prenom'])?'Prénom : '.$details['prenom']:'',
    /* fac */   'ddn' => isset($details['ddn'])?'Date de naissance : '.$details['ddn']:'',
    /* fac */   'description' => isset($details['description'])?'Description : '.$details['description']:'',
    /* fac */   'langue' => isset($details['langue'])?'Langue : '.$details['langue']:NULL,
             // 'adresse' => $details[''],
        ]);
    echo '<pre>';
        var_dump($contents);
    echo '</pre>';
    return True;
}

if(isset($_GET['id'])) {
    // Si je suis en train d'afficher mon profil :
    if(connected() && $_GET['id']==$_SESSION['id']) {
        // On affichera les onglets :
        $styles = ['onglets_compte.css'];
        $blocks = ['onglets_compte'];
        $contents['ongletActif'] = 'profil';

        $title = 'Mon profil';

        $details = getUserDetails($_SESSION['id']);
        loadContents($details);
    }
    else {
        $details = getUserDetails($_GET['id']);
        loadContents($details);

        $title = 'Profil de '.$contents['pseudo'];
    }
}
else {  // (empty($_GET['id']))
    if(connected()) {
        // on affiche mon profil :
        $contents['pseudo'] = $_SESSION['username'];
        $title = 'Mon profil';
        $styles = ['onglets_compte.css'];
        $blocks = ['onglets_compte'];
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

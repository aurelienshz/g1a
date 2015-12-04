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
                'statut' => ($details['moderateur']) ? 'Modérateur' : 'Membre',
    /* fac */   'photo' => isset($details['id_photo']) && $details['id_photo']!=0?'usermedia/'.$details['id_photo']:IMAGES.'photo_profil_defaut.jpg',
    /* fac */   'nom' => isset($details['nom'])?$details['nom']:'Non renseigné',
    /* fac */   'prenom' => isset($details['prenom'])?$details['prenom']:'Non reseigné',
    /* fac */   'ddn' => isset($details['ddn'])?$details['ddn']:'Non renseignée',
    /* fac */   'description' => isset($details['description'])?$details['description']:'Pas de description',
    /* fac */   'langue' => (isset($details['langue'])?($details['langue']?'Anglais':'Français'):'Non renseignée')
             // 'adresse' => $details[''],
        ]);
    return True;
}

function monProfil() {
    // ToDo : ajouter les options de modification
    // Attention : lors de la modification il faut vérifier les droits de l'utilisateur ! (car pas de vérif de privilèges dans cette page)
    // Rq: Il faut faire de même pour les messages privés (ou alors membres -> messages ne peut pointer QUE sur MES messages)
    // Pour les événents : si c'est mon profil on affiche tout, si c'est celui de qqun d'autre on affiche seulement les events publics, et les events privés auxquels je participe aussi.

    global $title;
    global $styles;
    global $blocks;
    global $contents;

    // On affichera les onglets :
    $styles = ['onglets_compte.css'];
    $blocks = ['onglets_compte'];
    $contents['ongletActif'] = 'profil';
    $contents['monProfil'] = True;

    $title = 'Mon profil';

    $details = getUserDetails($_SESSION['id']);
    loadContents($details);

    return True;
}

if(isset($_GET['id'])) {
    // Si je suis en train d'afficher mon profil :
    if(connected() && $_GET['id']==$_SESSION['id']) {
        monProfil();
    }
    else {
        if($details = getUserDetails($_GET['id'])) {
            loadContents($details);
        }
        else {
            alert('error','La page demandée n\'a pas été trouvée. Vous avez été redirigé vers l\'accueil.');
            header('Location: '.getLink(['accueil']));
            exit();
        }

        $title = 'Profil de '.$contents['pseudo'];
    }
}
else {  // (empty($_GET['id']))
    if(connected()) {
        monProfil();
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

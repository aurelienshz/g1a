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

require MODELES.'membres/getMemberDetails.php';

if(!empty($_GET['id'])) {
    // Si je suis en train d'afficher mon profil :
    if(connected() && $_GET['id']==$_SESSION['id']) {
        // On affichera les onglets :
        $styles = ['onglets_compte.css'];
        $blocks = ['onglets_compte'];
        $contents['ongletActif'] = 'profil';

        $details = getMemberDetails($_SESSION['id']);
        var_dump($details);

        $title = 'Mon profil';

        $contents['pseudo'] = $_SESSION['username'];
        $contents = array_merge($contents,[
            'pseudo' => $details['pseudo'],
            'nom' => $details['nom'],
            'prenom' => $details['prenom'],
            'ddn' => $details['ddn'],
            'mail' => $details['mail'],
            'description' => $details['description'],
            'statut' => $details['moderateur']?'Modérateur':'Membre',
            'langue' => $details['langue'],
            'id_photo' => $details['id_photo'],
            'adresse' => $details[''],
            '' => $details[''],
            ]);
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

$styles[] = ['membres.css'];
$blocks[] = ['profil'];

/**** Affichage de la page ****/
vue($blocks,$styles,$title, $contents);

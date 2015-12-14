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
                'tel' => isset($details['tel'])?$details['tel']:'Non renseigné',
                'civilite' => isset($details['civilite'])?($details['civilite']?'Mme':'M.'):'',
                'adresse_condensee' => isset($details['adresse_condensee'])?$details['adresse_condensee']:'Non renseignée',
    /* fac */   'photo' => isset($details['id_photo']) && $details['id_photo']!=0?PHOTO_PROFIL.$details['lien_photo']:IMAGES.'photo_profil_defaut.jpg',
    /* fac */   'nom' => isset($details['nom'])?$details['nom']:'',
    /* fac */   'prenom' => isset($details['prenom'])?$details['prenom']:'',
    /* fac */   'ddn' => isset($details['ddn'])?$details['ddn']:'Non renseignée',
    /* fac */   'description' => isset($details['description'])?$details['description']:'Pas de description',
    /* fac */   'langue' => isset($details['langue'])?($details['langue']?'Anglais':'Français'):'Non renseignée',
        ]);
    switch($details['niveau']==1) {
        case 1:
            $contents['statut'] = 'Membre';
            break;
        case 2:
            $contents['statut'] = 'Modérateur';
            break;
        case 3:
            $contents['statut'] = 'Administrateur';
            break;
        case 0:
        default:
            $contents['statut'] = 'Non validé';
            break;
    }

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
/*    echo '<pre>';
    var_dump($details);
    echo '</pre>';*/
    loadContents($detaifls);

    return True;
}

if(isset($_GET['id'])) {
    if(connected() && $_GET['id']==$_SESSION['id']) {  // Si je suis en train d'afficher mon profil :
        monProfil();
    }
    else {
        $contents['monProfil'] = False;
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

/**** Enlève la civilité si le nom est absent ****/
if ($contents['nom']==='') {
    $contents['civilite']='';
}
if ($contents['prenom']==='' AND $contents['nom']==='') {
    $contents['civilite']='Non renseigné';
}
/**** Fonction affichage mois en FR ****/
function date_mois_fr($mois_num){
    $mois_fr = ['01'=>'Janvier','02'=>'Février','03'=>'Mars','04'=>'Avril','05'=>'Mai','06'=>'Juin','07'=>'Juillet','08'=>'Août','09'=>'Septembre','10'=>'Octobre','11'=>'Novembre','12'=>'Décembre'];
    return $mois_fr[$mois_num];
}
$contents['ddn']= date('j m o',strtotime($contents['ddn']));
$contents['ddn']=explode(' ',$contents['ddn']) ;
$contents['ddn'][1]=date_mois_fr($contents['ddn'][1]);
$contents['ddn']=implode(' ',$contents['ddn']) ;
/**** Affichage de la page ****/
vue($blocks,$styles,$title, $contents);

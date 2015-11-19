<?php
/*** CONTROLEUR PROFIL ***/

/**** Préparation des contenus ****/

function getUserDetails($id) {
    $bddUser = array(
        'civilite' => 'M.',
        'prenom' => 'Kevin',
        'nom'=> 'Trente-Huit',
        'pseudo' => 'KevinDu38',
        'ddn' => '17.10.2011',
        'mail' => 'kevindu38@hotmail.fr',
        'tel' => '0772sevran',
        'description' => 'Je m\'appelle Kevin. Quand je suis content, je vomis.',
        'privilege' => '0',
        'langue' => 'FR'
    );
    return $bddUser;
}

//if(isset($_GET['id'])) {
    $contents['pseudo'] = getUserDetails('j\'aime les chats')['pseudo'];
//}
/**** Affichage de la page ****/

$contents['ongletActif'] = 'messages';

$title = 'Evenements de '.$contents['pseudo'];
$styles = ['onglets_compte.css','membres.css'];
$blocks = ['onglets_compte', 'messages'];
//Appels des vues :
vue($blocks,$styles,$title,$contents);

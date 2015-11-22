<?php
/*
Fonction : Récupération des mesages privés REÇUS par le membre dont l'id est passé en paramètre

Facultatif / A réfléchir :
- arguments facultatifs : offsets et nombre de mesages souhaités.
- choix du mode de tri (date, expéditeur...)
Exemples de comportements pour les points facultatifs :
- getMessages(56, 10, 10) => retourne 10 messages à partir du n°10 (ie les messages n° 10 à 19)
- getMessages(56, 'expediteur') => retourne les messages du membre n°56 en les triant par expéditeur

*/

function getMessages($id) {
    $messages = [
    ['expediteur'=>'Kevin','sujet'=>'Je n\'arrive pas à me connecter', 'date'=>'Hier à 03:28', 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
    ['expediteur'=>'Kevin','sujet'=>'Je n\'arrive pas à me connecter', 'date'=>'Hier à 03:28', 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
    ['expediteur'=>'Kevin','sujet'=>'Je n\'arrive pas à me connecter', 'date'=>'Hier à 03:28', 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
    ['expediteur'=>'Kevin','sujet'=>'Je n\'arrive pas à me connecter', 'date'=>'Hier à 03:28', 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
    ['expediteur'=>'Kevin','sujet'=>'Je n\'arrive pas à me connecter', 'date'=>'Hier à 03:28', 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
    ['expediteur'=>'Kevin','sujet'=>'Je n\'arrive pas à me connecter', 'date'=>'Hier à 03:28', 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
    ['expediteur'=>'Kevin','sujet'=>'Je n\'arrive pas à me connecter', 'date'=>'Hier à 03:28', 'texte' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'],
    ];
    return $messages;
}

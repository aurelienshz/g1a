<?php
// controleurs/membres/actions.php

$actions = [
'profil',
'evenements',
'messages',
'connexion',
'deconnexion',
'inscription',
'modification_profil',
'modification_mdp',
'modification_mail',
'confirm',
'delete',
'promote'
];

$parametres = [
    'profil' => ['id'],
    'confirm' => ['token'],
    'messages' => ['pseudo_destinataire'],
    'promote' => ['id']
];

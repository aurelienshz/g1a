<?php
// controleurs/membres/actions.php

$actions = [
'profil',
'evenements',
'messages',
'connexion',
'deconnexion',
'inscription',
'invitation',
'modification_profil',
'modification_mdp',
'modification_mail',
'confirm',
'delete',
'promote',
'search'
];

$parametres = [
    'profil' => ['id'],
    'confirm' => ['token'],
    'messages' => ['pseudo_destinataire'],
    'promote' => ['id']
    ];

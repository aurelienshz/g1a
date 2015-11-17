<?php

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

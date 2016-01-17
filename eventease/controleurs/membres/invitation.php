<?php

/*** CONTROLEUR INVITATION ***/

/**** Préparation des contenus ****/

$contents['ongletActif'] = 'invitation';
$styles = ['form.css'];
$title = 'Inviter ce membre';
$blocks = ['invitation'];

// Appel des vues
vue($blocks,$styles,$title, $contents);
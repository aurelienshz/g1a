<?php
// controleurs/forum/actions.php
$actions =[
    'index',
    'sujet',
    'creation_topic',
    'suppression',
];
$parametres = [
	'sujet' => ['id'],
	'suppression' => ['id_topic','id_what']
	//id_what donne la fonction à faire :
	//1->supprimer topic
	//2->supprimer modifier topic
];

<?php
// controleurs/forum/actions.php
$actions =[
    'index',
    'sujet',
    'creation_topic',
    'suppression',
];
$parametres = [
	'sujet' => ['id','id_what','id_comment'],
	//id_comment : id du commentaire qu'on souhaiterais modifier/supprimer
	'suppression' => ['id_topic','id_what','id_comment'],
	//id_what donne la fonction à faire :
	//0->Rien du tout
	//1->supprimer topic
	//2->modifier topic
	//3->supprimer un commentaire
	//4->modifier un commentaire
];

<?php

require MODELES.'membres/token.php';

if(verifyToken($_GET['token'])) {
	if (connected()){
	    alert('ok', 'Votre nouvelle adresse mail a été validée ! Vous pouvez désormais l\'utiliser.');
		header('Location: '.getLink(['membres','profil']));
		exit();
	}else{
		alert('ok', 'Votre adresse mail a été validée ! Vous pouvez désormais vous connecter.');
    	header('Location: '.getLink(['membres','connexion']));
    	exit();
	}
}
else {
    alert('error','Une erreur s\'est produite. Si vous êtes un méchant hacker, sachez que ce que vous étiez en train d\'essayer de faire ne va pas fonctionner.');
    header('Location: '.getLink(['accueil']));
    exit;
}

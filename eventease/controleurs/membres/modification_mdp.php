<?php
require MODELES.'membres/getUserAuth.php';
require MODELES.'membres/updatePass.php';

if(!connected()) {
    alert("error","Vous devez être connecté !");
	header("Location: ".getLink(["membres","connexion"]));
	exit();
}

$errorMessage = '';

if(!empty($_POST)) {        // Formulaire envoyé
    if($_POST['old_password'] && $_POST['password'] && $_POST['confirm-password']) { 
    // Les champs sont remplis
        $auth = getUserAuth($_SESSION['username']);

        if(is_array($auth) && password_verify($_POST['old_password'], $auth['mdp'])) {
        // L'ancien mot de passe est bien le bon

        	if(True){
        	// Le nouveau mot de passe est assez fort.

	        	if($_POST['password'] === $_POST['confirm-password']) {
	        	// Les mots de passe correspondent.

		            // Changement du mdp.
	        		if(updatePass ($_SESSION['id'], password_hash($_POST['password'],PASSWORD_DEFAULT) )) {
	        			// Sortie du script et redirection vers la page de profil :
	                	alert('info', 'Vous avez bien changé votre mot de passe.');
	                	// header('Location: '.getLink(['membres','profil']));
	                	// exit();
	        		}else{
	        			$errorMessage = "Une erreur est survenue dans la requête. Merci de réessayer !";
	        		}

	        	}else{
	        		$errorMessage = "Les mots de passes ne correspondent pas. Merci de réessayer !";
	        	}
    		}else{
    			$errorMessage = "Le nouveau mot de passe n'est pas assez fort. Merci de réessayer !";
    		}
    	}else{
            $errorMessage = "Une erreur s'est produite. Merci de réessayer !";
        }
    }else{
        $errorMessage = 'Merci de renseigner tous les champs.';
    }
}


$contents['errorMessage'] = $errorMessage;



$title = 'Changer son mot de passe';
$styles = ['form.css'];
$blocks = ['modification_mdp'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title, $contents);
?>
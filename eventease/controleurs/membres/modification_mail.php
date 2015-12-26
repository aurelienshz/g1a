<?php
require MODELES.'membres/getUserDetails.php';
require MODELES.'membres/getUserAuth.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'membres/updateMail.php';

if(!connected()) {
    alert("error","Vous devez être connecté !");
	header("Location: ".getLink(["membres","connexion"]));
	exit();
}

$errorMessage = '';

if(!empty($_POST)) {        // Formulaire envoyé
    if($_POST['password'] && $_POST['mail'] && $_POST['confirm-mail']) { 
    // Les champs sont remplis
        $auth = getUserAuth($_SESSION['username']);

        if(is_array($auth) && password_verify($_POST['password'], $auth['mdp'])) {
        // Le mot de passe est bien le bon

        	if(filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
        	// Le nouveau mail est du bon format.

        		if(!checkUsed($_POST['mail'], 'mail')){
        		// Le nouveau mail n'est pas déjà utilisé.
		        	
		        	if($_POST['mail'] === $_POST['confirm-mail']) {
		        	// Les mails correspondent.

			            // Changement du mail.
	        			if(updateMail($_SESSION['id'], $_POST['mail'], $auth['mdp'])) {
		        			// Sortie du script et redirection vers la page de profil :
		                	alert('info', 'Vous avez bien changé votre adresse mail. Veuillez l\'activer.');
		                	header('Location: '.getLink(['membres','profil']));
		                	exit();
		        		}else{
		        			$errorMessage = "Une erreur est survenue dans la requête. Merci de réessayer !";
		        		}
		        	}else{
		        		$errorMessage = "Les mots de passes ne correspondent pas. Merci de réessayer !";
		        	}
		        }else{
		        	$errorMessage = "L'adresse mail saisie est déjà utilisée. Merci d'en prendre une autre.";
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

$title = 'Changer son adresse mail';
$styles = ['form.css'];
$blocks = ['modification_mail'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title, $contents);
?>
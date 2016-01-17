<?php
require_once MODELES.'membres/getUserDetails.php';
require_once MODELES.'membres/getUserAuth.php';
require_once MODELES.'membres/checkUsed.php';
require_once MODELES.'membres/updateMail.php';
require_once MODELES.'membres/sendToken.php';
require_once MODELES.'membres/token.php';

if(!connected()) {
    alert("error","Vous devez être connecté !");
	header("Location: ".getLink(["membres","connexion"]));
	exit();
}

$errorMessage = '';

if(!empty($_POST)) {        // Formulaire envoyé
    // Vérifie qu'il n'y a pas des champs en trop ou en moins.
    $champsAttendus = array('mail','password','confirm-mail');
    foreach($_POST as $cle => $valeur){
        if(!in_array($cle, $champsAttendus)){
            unset($_POST[$cle]);
        }elseif (!isset($_POST[$cle])) {
            $_POST[$cle]="";
        }else{
            $_POST[$cle] = htmlspecialchars($_POST[$cle]);
        }
    }
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
                        $userD = getUserDetails($_SESSION['id']);
	        			if(sendTokenChange($_POST['mail'], $userD['pseudo'], $userD['mail'])) {
		        			// Sortie du script et redirection vers la page de profil :
		                	alert('info', 'Vous avez bien changé votre adresse mail. Veuillez l\'activer pour valider le changement.');
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
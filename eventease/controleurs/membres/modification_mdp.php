<?php
require MODELES.'membres/getUserAuth.php';
require MODELES.'membres/updateOneUserField.php';
require MODELES.'functions/form.php';

if(!connected()) {
    alert("error","Vous devez être connecté !");
	header("Location: ".getLink(["membres","connexion"]));
	exit();
}

$errorMessage = '';

if(!empty($_POST)) {        // Formulaire envoyé

    // Vérifie qu'il n'y a pas des champs en trop ou en moins.
    $champsAttendus = array('password','old_password','confirm-password');
    foreach($_POST as $cle => $valeur){
        if(!in_array($cle, $champsAttendus)){
            unset($_POST[$cle]);
        }elseif (!isset($_POST[$cle])) {
            $_POST[$cle]="";
        }else{
            $_POST[$cle] = htmlspecialchars($_POST[$cle]);
        }
    }
    if($_POST['old_password'] && $_POST['password'] && $_POST['confirm-password']) { 
    // Les champs sont remplis
        $auth = getUserAuth($_SESSION['username']);

        if(is_array($auth) && password_verify($_POST['old_password'], $auth['mdp'])) {
        // L'ancien mot de passe est bien le bon

        	if(checkTextInput($_POST['password'],"/^((?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9]).{6,})\S$/")){
        	// Le nouveau mot de passe est assez fort.

	        	if($_POST['password'] === $_POST['confirm-password']) {
	        	// Les mots de passe correspondent.

		            // Changement du mdp.
	        		if(updateOneUserField($_SESSION['id'],'mdp',password_hash($_POST['password'],PASSWORD_DEFAULT) )) {
	        			// Sortie du script et redirection vers la page de profil :
	                	alert('info', 'Vous avez bien changé votre mot de passe.');
	                	// mail($_POST['email'],
                  //       'Modification Mot de Passe sur EventEase',
                  //       "Salutations !\n"
                  //       ."Le mot de passe de votre compte à été modifié. Si vous n'avez pas effectué ce changement, contactez immédiatement le support EventEase.\n-- L'équipe EventEase",
                  //       'From: no-reply@eventease.com'); 
	                	header('Location: '.getLink(['membres','profil']));
	                	exit();
	        		}else{
	        			$errorMessage = "Une erreur est survenue dans la requête. Merci de réessayer !";
	        		}
	        	}else{
	        		$errorMessage = "Les mots de passes ne correspondent pas. Merci de réessayer !";
	        	}
    		}else{
    			$errorMessage = 'Le mot de passe doit contenir au moins 6 caractères dont au moins une majuscule, une minuscule, un chiffre sans espace.';
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
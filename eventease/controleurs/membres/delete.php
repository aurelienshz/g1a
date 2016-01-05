<?php
require MODELES.'membres/getUserAuth.php';
require MODELES.'membres/deleteUser.php';

if(!connected()) {
    alert("error","Vous devez être connecté !");
	header("Location: ".getLink(["membres","connexion"]));
	exit();
}

$errorMessage = '';

if(!empty($_POST)) {        // Formulaire envoyé
    // Vérifie qu'il n'y a pas des champs en trop ou en moins.
    $champsAttendus = array('password');
    foreach($_POST as $cle => $valeur){
        if(!in_array($cle, $champsAttendus)){
            unset($_POST[$cle]);
        }elseif (!isset($_POST[$cle])) {
            $_POST[$cle]="";
        }else{
            $_POST[$cle] = htmlspecialchars($_POST[$cle]);
        }
    }
    if($_POST['password']) { // Le champ est rempli
        $auth = getUserAuth($_SESSION['username']);

        if(is_array($auth) && password_verify($_POST['password'], $auth['mdp'])) {

            // Destruction de l'utilisateur

        	if(deleteUser($_SESSION['id'])) {
        		
        	}else{
        		$errorMessage = "Une erreur s'est produite dans la suppression de l'utilisateur. Merci de réessayer !";
        	}

            // Si le message d'erreur est resté vide
            if(!$errorMessage) {
                // Destruction de la session :
                session_destroy();
				session_start();
				$_SESSION['connected'] = False;

                // Sortie du script et redirection vers la page précédant la connexion :
                 alert('info', 'Vous êtes bien désinscrit, on espère vous revoir bientôt.');
                header('Location: '.getLink(['accueil']));
                exit();
            }

        }
        else {
            $errorMessage = "Une erreur s'est produite. Merci de réessayer !";
        }
    }
    else {
        $errorMessage = 'Merci de renseigner votre mot de passe.';
    }
}


$contents['errorMessage'] = $errorMessage;

$title = 'Supprimer son profil';
$styles = ['form.css'];
$blocks = ['delete'];

/****Affichage de la page *****/
//Appel de la vue :
vue($blocks, $styles, $title, $contents);

?>
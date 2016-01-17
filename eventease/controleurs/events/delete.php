<?php
require MODELES.'events/checkOrganiser.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'membres/getUserDetails.php';
require MODELES.'membres/getUserAuth.php';
require MODELES.'events/getEventDetails.php';
require MODELES.'events/deleteEvent.php';


//Si il n'y a pas d'eventID dans le GET
if(!isset($_GET['id']) ){
	alert("error","Vous n'avez pas précisé quel évènement vous vouliez !");
    header("Location: ".getLink(["accueil","404"]));
    exit();
}
$_GET['id'] = htmlspecialchars($_GET['id']);

//Si le EventID dans le GET n'est pas attribué.
$contents['values'] = getEvents($_GET['id']);
if (empty($contents["values"])){
	alert("error","Cet évènement n'existe pas !");
    header("Location: ".getLink(["accueil","404"]));
    exit();
}
// Fonction qui check s'il a le droit de modifier.
if( connected() && (checkOrganiser($_SESSION['id'],$_GET['id']) OR $_SESSION['niveau'] == 2 OR $_SESSION['niveau'] == 3 ) ) {
    
}else{
	if (!connected()){
		alert("error","Vous devez être connecté !");
    	header("Location: ".getLink(["membres","connexion"]));
    	exit();
	}else{
		alert("error","Vous n'avez pas le droit de modifier cet évènement!");
    	header("Location: ".getLink(["accueil"]));
    	exit();
	}
}
$errorMessage = '';

if(!empty($_POST)) {        // Formulaire envoyé
    // Vérifie qu'il n'y a pas des champs en trop ou en moins.
    $champsAttendus = array('titre');
    foreach($_POST as $cle => $valeur){
        if(!in_array($cle, $champsAttendus)){
            unset($_POST[$cle]);
        }elseif (!isset($_POST[$cle])) {
            $_POST[$cle]="";
        }else{
            $_POST[$cle] = htmlspecialchars($_POST[$cle]);
        }
    }
    if($_POST['titre']) { // Le champ est rempli
        

        if($_POST['titre'] == $contents['values']['titre']) {

            // Destruction de l'event

        	if(deleteEvent($_GET['id'])) {
        		
        	}else{
        		$errorMessage = "Une erreur s'est produite dans la suppression de l'évènement. Merci de réessayer !";
        	}

            // Si le message d'erreur est resté vide
            if(!$errorMessage) {
                // Sortie du script et redirection vers la page précédant la connexion :
                alert('info', 'Vous avez bien supprimé cet évènement.');
                header('Location: '.getLink(['accueil']));
                exit();
            }

        }
        else {
            $errorMessage = "Le titre saisi est incorrect !";
        }
    }
    else {
        $errorMessage = 'Merci de renseigner le nom de l\'évènement.';
    }
}

$contents['errorMessage'] = $errorMessage;
// Verifier qu'il est activé


// /**** préparation de la vue ****/

$title = 'Supprimer l\'évènement';
$styles = ['form.css','accueil.css', 'search.css', 'prettyform.css', 'modify.css'];
$blocks = ['delete'];

// /****Affichage de la page *****/
// //Appel de la vue :
vue($blocks, $styles, $title, $contents);

?>
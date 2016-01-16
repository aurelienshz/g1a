<?php
require MODELES.'events/checkOrganiser.php';
require MODELES.'events/getEventDetails.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'membres/getUserDetails.php';
require MODELES.'membres/getUserAuth.php';
require MODELES.'events/deleteModo.php';


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
if( connected() && checkOrganiser($_SESSION['id'],$_GET['id']) ) {
    
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
$contents['errorMessage'] = '';
$contents['modos'] = getCreators($_GET['id']);
$contents['creator'] = getCreator($_GET['id']);
if(!empty($_POST)){
	if(!checkUsed($_POST['pseudo'], NULL, False) ){ ///si le pseudo n'existe pas///
		$contents['errorMessage'] .= 'Le pseudo renseigné n\'existe pas ! ';
	}
	$orga_id = getUserAuth($_POST['pseudo'], False)['id'];
	if(!checkOrganiser($orga_id,$_GET['id'])){
		$contents['errorMessage'] .= 'Le pseudo renseigné n\'est pas organisateur de cet évènement ! ';
	}

	if(getUserDetails($orga_id)['niveau'] <= 0){
		$contents['errorMessage'] .= 'Le pseudo renseigné n\'est pas activé ! ';
	}
	if (strtolower($contents['creator'][0][0]) == strtolower($_POST['pseudo'])){
		$contents['errorMessage'] .= 'Vous ne pouvez pas supprimer le créateur !';
	}
	if(empty($contents['errorMessage']) ){
		if(deleteModo($_GET['id'], $orga_id)){
			alert("ok","Le modérateur a bien été supprimé !");
		}
	}
}
// Verifier qu'il est activé


// /**** préparation de la vue ****/

$title = 'Supprimer un Modérateur';
$styles = ['form.css','accueil.css', 'search.css', 'prettyform.css', 'modify.css'];
$blocks = ['deleteModo'];

// /****Affichage de la page *****/
// //Appel de la vue :
vue($blocks, $styles, $title, $contents);

?>
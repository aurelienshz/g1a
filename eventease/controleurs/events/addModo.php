<?php
require MODELES.'events/checkOrganiser.php';
require MODELES.'events/getEventDetails.php';
require MODELES.'membres/checkUsed.php';
require MODELES.'membres/getUserDetails.php';
require MODELES.'membres/getUserAuth.php';
require MODELES.'events/insertModo.php';
require MODELES.'events/insertInvite.php';


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
$contents['modos'] = array_merge(getCreator($_GET["id"]),getCreators($_GET['id']));
$contents['errorMessage'] = '';
if(!empty($_POST['pseudo'])){
	if(!checkUsed($_POST['pseudo'], NULL, False) ){ ///si le pseudo n'existe pas///
		$contents['errorMessage'] .= 'Le pseudo renseigné n\'existe pas ! ';
	}
	$orga_id = getUserAuth($_POST['pseudo'], False)['id'];
	if(checkOrganiser($orga_id,$_GET['id'])){
		$contents['errorMessage'] .= 'Le pseudo renseigné est déja organisateur de cet évènement ! ';
	}

	if(getUserDetails($orga_id)['niveau'] <= 0){
		$contents['errorMessage'] .= 'Le pseudo renseigné n\'est pas activé ! ';
	}

	if(empty($contents['errorMessage']) ){
		if(insertModo($_GET['id'], $orga_id)){
			insertInvite($_SESSION['id'],$_GET['id'],$orga_id);
			alert("ok","Le modérateur a bien été ajouté !");
			header("Location: ".getLink(["events" ,"modify", $_GET["id"]]));
			exit();
		}
	}
}
// Verifier qu'il est activé


// /**** préparation de la vue ****/

$title = 'Ajouter un Modérateur';
$styles = ['form.css','accueil.css', 'search.css', 'prettyform.css', 'modify.css'];
$blocks = ['addModo'];

// /****Affichage de la page *****/
// //Appel de la vue :
vue($blocks, $styles, $title, $contents);

?>
<?php
require MODELES.'events/checkOrganiser.php';
require MODELES.'events/getEventDetails.php';
require MODELES.'functions/form.php';
require MODELES.'functions/insertMedia.php';
require MODELES.'functions/removeMedia.php';
require MODELES.'events/insertEventMedia.php';
require MODELES.'events/removeEventMedia.php';

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
$contents["images"] = getImagesAndId($_GET['id']);
foreach ($contents['images'] as $key => $value) {
    $contents['images'][$key] =  [$contents['images'][$key][0],$contents['images'][$key][1]] ;
}
$contents['img_number'] = count($contents["images"]);

    $validExtensions = array(".jpg", ".png", ".jpeg");
    $maxsize = 2097152;
    $max_height = 2000;
    $max_width = $max_height;
    $count = 0;
    $contents['errorMessage'] = '';

//Suppression d'image
if(!empty($_POST) && $contents['img_number'] > 0){
    foreach ($_POST as $key => $value) {
        if(removeEventMedia($_GET['id'],$contents['images'][$key][0])){
            unlink(PHOTO_EVENT.$contents['images'][$key][1]);
            unset($contents['images'][$key]);
            $contents['img_number']--;
        }
    }
}
if(!empty($_FILES["photos"]["name"][0]) && $contents['img_number'] < 4){
    // Boucle sur $_FILES pour passer sur tous les fichiers
    $photoLeft = 4 - $contents['img_number'];
    foreach ($_FILES['photos']['name'] as $f => $name) {
        if ($photoLeft <= 0) break; 
        $check = checkOnePhotos("photos",$f ,$maxsize, $max_height, $max_width, $validExtensions,NULL, PHOTO_EVENT);
        if ($check[0]){
            if (uploadOnePhotos("photos",$f , NULL, PHOTO_EVENT, $check[1])) {
                $media_id = insertMedia($check[1]);
                if(insertEventMedia($_GET['id'],$media_id)) {
                    $contents['images'][$f]=[$media_id,$check[1]];
                    $contents['img_number']++; // Nombre d'images uploadés avec succès.
                    $photoLeft--; //Nombre de photos restantes.
                }
            }
        }else{
            $contents['errorMessage'] .= '('.$name.')'.$check[1];
        }
    }
}
if (empty($contents['errorMessage']) && (!empty($_POST) OR !empty($_FILES))){
    alert("ok","Les images on bien été modifiées");
    header("Location: ".getLink(["events","modify",$_GET['id']]));
    exit();
}

$title = 'Ajouter des images à l\'évènement';
$styles = ['form.css','accueil.css', 'search.css', 'prettyform.css', 'modify.css'];
$blocks = ['extra-media'];

// /****Affichage de la page *****/
// //Appel de la vue :
vue($blocks, $styles, $title, $contents);
?>
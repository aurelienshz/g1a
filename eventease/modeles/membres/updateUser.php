<?php
/* modeles/membres/updateUser.php*/
// Attention à bien passer l'ID de l'utilisateur
// Mets tout à jour pour le moment, à rendre sélectif dans le futur.
function updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description) {
	$extraID = getUserDetails($id);
	$output = googleAddressToCoord(googleCorrectAddress($adresse));

	
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('UPDATE membre
							SET civilite=:civilite,
								nom=:nom, 
								prenom=:prenom, 
								ddn=:ddn, 
								tel=:tel, 
								langue=:langue, 
								description=:description
							WHERE id=:id;
							UPDATE adresse
						    SET adresse_condensee=:adresse,
						    	coordonnee_lat=:lat,
						    	coordonnee_lng=:lng
						    WHERE id=:id_adresse;
							UPDATE media
						    SET lien=:photo
						    WHERE id=:id_photo;
							');
    $query -> execute([
    	':civilite'=>$civilite,
    	':nom'=>$nom,
        ':prenom'=>$prenom,
        ':ddn'=>$ddn,
        ':tel'=>$tel,
        ':langue'=>$langue,
        ':description'=>$description,
        ':id'=>$id,
        ':adresse'=>$adresse,
        ':lat'=>$output[0],
        ':lng'=>$output[1],
        ':id_adresse'=>$extraID['id_adresse'],
        ':photo'=>$photo,
        ':id_photo'=>$extraID['id_photo']
        ]);
}
<?php
/* modeles/membres/updateUser.php*/
// Attention à bien passer l'ID de l'utilisateur
// Mets tout à jour pour le moment, à rendre sélectif dans le futur.
function updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description,$id_adresse = -1,$id_photo = -1) {
	$output = googleAddressToCoord($adresse);
	if($output = False){
		$output[0] = 0.0;
		$output[1] = 0.0;
		echo "Google a fail.";
	}
	$updateMember = 'UPDATE membre
					SET civilite=:civilite,
						nom=:nom, 
						prenom=:prenom, 
						ddn=:ddn, 
						tel=:tel, 
						langue=:langue, 
						description=:description
					WHERE id=:id;';


	$updateAddress = 'UPDATE adresse
					  SET adresse_condensee = :adresse,
					  	  coordonnee_lat = :lat,
					  	  coordonnee_lng = :lng
					  WHERE id = :id_adresse;'; 

	$insertAddress = 'INSERT INTO adresse(adresse_condensee, coordonnee_lat, coordonnee_lng)
						    VALUES(:adresse, :lat, :lng);
						  	SET @adresse_id = LAST_INSERT_ID();';
	// SET @var_name = expr;


	$updateMedia = 'UPDATE media
					  SET lien = :photo
					  WHERE id = :id_photo;';

	$insertMedia = 'INSERT INTO media(lien)
							VALUES (:photo);
					SET @photo_id = LAST_INSERT_ID();';

	function generateUpdateMember($photo_id, $adresse_id) {
		return "UPDATE membre
					SET civilite=:civilite,
						nom=:nom, 
						prenom=:prenom, 
						ddn=:ddn, 
						tel=:tel, 
						langue=:langue, 
						description=:description
						id_photo= $photo_id,
					    id_adresse= $adresse_id,
					WHERE id=:id;"

	}
	// Finir la fonction generation de update membre
	// Faire la variablilisatin de la requete
	// Faire sa construction
	// virer la variable $updateUser (inutile maintaneant)

	$requete = '';
	// Construction de requête : 
	 if ($id_adresse == -1 && $id_photo == -1) {
	 	$requete .= $insertAddress;
	 	$requete .= $insertMedia;

	 }else{

	 }

	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('');


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
        ':id_adresse'=>$id_adresse,
        ':photo'=>$photo,
        ':id_photo'=>$id_photo
        ]);
}
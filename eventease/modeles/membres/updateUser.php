<?php
/* modeles/membres/updateUser.php*/
// Attention à bien passer l'ID de l'utilisateur
// Mets tout à jour pour le moment, à rendre sélectif dans le futur.
function generateUpdateMember($photo_id, $adresse_id) {
	return "UPDATE membre
				SET civilite=:civilite,
					nom=:nom, 
					prenom=:prenom, 
					ddn=:ddn, 
					tel=:tel, 
					langue=:langue, 
					description=:description,
					id_photo= $photo_id,
				    id_adresse= $adresse_id
				WHERE id=:id;";

}

function updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description,$id_adresse = -1,$id_photo = -1) {
	$adresse = str_replace(",","", $adresse);
	$output = googleAddressToCoord($adresse);
		?> <pre> <?php
    var_dump($adresse);
    var_dump($output[0]);   
?> </pre> <?php
	if($output == False){
		$output[0] = 0.0;
		$output[1] = 0.0;
		echo "Google a fail.<br />";
	}

	$updateAddress = 'UPDATE adresse
					  SET adresse_condensee = :adresse,
					  	  coordonnee_lat = :lat,
					  	  coordonnee_long = :lng
					  WHERE id = :id_adresse;'; 

	$insertAddress = 'INSERT INTO adresse(adresse_condensee, coordonnee_lat, coordonnee_lng)
						    VALUES(:adresse, :lat, :lng);
						  	SET @adresse_id = LAST_INSERT_ID();';

	$updateMedia = 'UPDATE media
					  SET lien = :photo
					  WHERE id = :id_photo;';

	$insertMedia = 'INSERT INTO media(lien)
							VALUES (:photo);
					SET @photo_id = LAST_INSERT_ID();';

	$requete = '';
	$execution = array(":lat"=>$output[0],":lng"=>$output[1]);
	// Construction de requête : 
	 if ($id_adresse == -1 && $id_photo == -1) {
	 	$requete .= $insertAddress;
	 	$requete .= $insertMedia;
	 	$requete .= generateUpdateMember('@photo_id','@adresse_id');

	 }elseif ($id_adresse == -1 && $id_photo != -1) {
	 	$requete .= $insertAddress;
	 	$requete .= $updateMedia;
	 	$requete .= generateUpdateMember(':id_photo','@adresse_id');
	 	$execution = array_merge([":id_photo"=>$id_photo],$execution);

	 }elseif ($id_adresse != -1 && $id_photo == -1) {
	 	$requete .= $updateAddress;
	 	$requete .= $insertMedia;
	 	$requete .= generateUpdateMember('@photo_id',':id_adresse');
	 	$execution = array_merge([":id_adresse"=>$id_adresse],$execution);
	 }else{
	 	$requete .= $updateAddress;
	 	$requete .= $updateMedia;
	 	$requete .= generateUpdateMember(':id_photo',':id_adresse');
	 	$execution = array_merge([":id_adresse"=>$id_adresse],[":id_photo"=>$id_photo], $execution);
	 }
	?> <pre> <?php
	var_dump($requete);
	echo "<br /><br /><br /><br /><br />";
	var_dump($execution);
	echo "<br /><br /><br /><br /><br />";
	?> </pre> <?php
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare("$requete");

    $customExec= array_merge([ 
    	':civilite'=>$civilite,
    	':nom'=>$nom,
        ':prenom'=>$prenom,
        ':ddn'=>$ddn,
        ':tel'=>$tel,
        ':langue'=>$langue,
        ':description'=>$description,
        ':id'=>$id,
        ':adresse'=>$adresse,
        ':photo'=>$photo],
        $execution);

    	?> <pre> <?php
    var_dump($customExec);   
?> </pre> <?php
    if($query -> execute($customExec)){
    	return True;
    }	
		else {
			var_dump($query -> errorInfo());
			return False;
		}
}
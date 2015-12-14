<?php
/* modeles/membres/updateUser.php*/
// Attention à bien passer l'ID de l'utilisateur
// Mets tout à jour pour le moment, à rendre sélectif dans le futur.
function generateUpdateMember($photo_id, $adresse_id) {
	$insert = 'UPDATE membre
				SET civilite=:civilite,
					nom=:nom, 
					prenom=:prenom, 
					ddn=:ddn, 
					tel=:tel, 
					langue=:langue, 
					description=:description';

	if (!empty($photo_id) && !empty($adresse_id)){
		$insert .= ",id_photo=$photo_id,id_adresse=$adresse_id";
	}elseif (!empty($photo_id)){
		$insert .= ",id_photo=$photo_id";
	}elseif (!empty($adresse_id)) {
		$insert .= ",id_adresse=$adresse_id";
	}else{
		$insert .= "";
	}
	$insert .= ' WHERE id=:id;';

	return $insert;

}

function updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description,$id_adresse,$id_photo) {
	if(!empty($adresse))	{
		$output = googleAddressToCoord($adresse);
		if($output == False){
			$output= array(0.0,0.0);
		}
	}
	$updateAddress = 'UPDATE adresse
					  SET adresse_condensee = :adresse,
					  	  coordonnee_lat = :lat,
					  	  coordonnee_long = :lng
					  WHERE id = :id_adresse;'; 

	$insertAddress = 'INSERT INTO adresse(adresse_condensee, coordonnee_lat, coordonnee_long)
						    VALUES(:adresse, :lat, :lng);
						  	SET @adresse_id = LAST_INSERT_ID();';

	$updateMedia = 'UPDATE media
					  SET lien = :photo
					  WHERE id = :id_photo;';

	$insertMedia = 'INSERT INTO media(lien)
							VALUES (:photo);
					SET @photo_id = LAST_INSERT_ID();';

	$requete = '';
	$execution = array();
	// Construction de requête :
// $photo isset && address isset
// 		Faire ce qui est ci-dessous
// $photo isset
// 		A faire mais on insère que ce qui concerne la photo
// $adress isset
// 		A faire mais on insère que ce qui concerne l'adresse
// else 
// 	 	A faire, on ne modifie que la table membre.
	if (!empty($photo) && !empty($adresse)){

		 $latlng = array(":lat"=>$output[0],":lng"=>$output[1]);
		 $execution = array_merge([':adresse'=>$adresse],[':photo'=>$photo], $latlng,$execution);
		 if (empty($id_adresse) && empty($id_photo)) {
		 	$requete .= $insertAddress;
		 	$requete .= $insertMedia;
		 	$requete .= generateUpdateMember('@photo_id','@adresse_id');
		 }elseif (empty($id_adresse) && !empty($id_photo)) {
		 	$requete .= $insertAddress;
		 	$requete .= $updateMedia;
		 	$requete .= generateUpdateMember(':id_photo','@adresse_id');
		 	$execution = array_merge([":id_photo"=>$id_photo],$execution);
		 }elseif (!empty($id_adresse) && empty($id_photo)) {
		 	$requete .= $updateAddress;
		 	$requete .= $insertMedia;
		 	$requete .= generateUpdateMember('@photo_id',':id_adresse');
		 	$execution = array_merge([":id_adresse"=>$id_adresse],$execution);
		 }else{
		 	$requete .= $updateAddress;
		 	$requete .= $updateMedia;
		 	$requete .= generateUpdateMember(':photo_id',':id_adresse');
		 	$execution = array_merge([":id_adresse"=>$id_adresse],[":id_photo"=>$id_photo], $execution);
		 }

	}elseif (!empty($photo)) {

		 $execution = array_merge([':photo'=>$photo], $execution);
		 if (empty($id_photo)) {
		 	$requete .= $insertMedia;
		 	$requete .= generateUpdateMember('@photo_id','');
		 }else{
		 	$requete .= $updateMedia;
		 	$requete .= generateUpdateMember(':id_photo','');
		 	$execution = [":id_photo"=>$id_photo];
		 }
		
	}elseif(!empty($adresse)) {

		$latlng = array(":lat"=>$output[0],":lng"=>$output[1]);
		$execution = array_merge([':adresse'=>$adresse], $latlng,$execution);
		if (empty($id_adresse)) {
		 	$requete .= $insertAddress;
		 	$requete .= generateUpdateMember('','@adresse_id');
		 }else{
		 	$requete .= $updateAddress;
		 	$requete .= generateUpdateMember('',':id_adresse');
		 	$execution = array_merge([":id_adresse"=>$id_adresse], $execution);
		 }

	}else{
		$requete .= generateUpdateMember('','');
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
        ':id'=>$id],
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
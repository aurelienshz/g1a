<?php
require_once MODELES.'events/getEventDetails.php';
require MODELES.'events/removeEventMedia.php';

function deleteEvent($id){

	$details = getEvents($id);
	
	if($details){


		$requete = 'DELETE FROM evenement WHERE id = :id;
					DELETE FROM invitation WHERE id_evenement= :id;
					DELETE FROM commentaire WHERE id_evenement= :id;
					DELETE FROM modere WHERE id_evenement = :id;';

		$execution = [':id'=>$id];

		// Supprime les Images
		if ($details["id_media_principal"]){
			unlink(PHOTO_EVENT.$details['id_media_principal']);
		}

		$images = getImagesAndId($id);

		if (isset($images[0][0])){
			foreach ($images as $key => $value) {
				removeEventMedia($id, $images[$key][0]);
				unlink(PHOTO_EVENT.$images[$key][1]);
			}
		}

		$bdd = new PDO(DSN, DBUSER, DBPASS);
	    $query = $bdd->prepare($requete);
	    
	    if($query -> execute($execution)){
	    	return True;
	    }	
			else {
				var_dump($query -> errorInfo());
				return False;
			}
	}else{
		return False;
	}
}

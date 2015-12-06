<?php
/* modeles/membres/updateUser.php*/
// Attention à bien passer l'ID de l'utilisateur
// Mets tout à jour pour le moment, à rendre sélectif dans le futur.
function updateUser($id, $civilite, $nom, $prenom, $ddn, $tel, $adresse, $langue, $photo, $description) {
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
							-- UPDATE adresse
							-- SET 
							');
    // Oublie pas l'addresse et la photo.
    $query -> execute([
    	':civilite'=>$civilite,
    	':nom'=>$nom,
        ':prenom'=>$prenom,
        ':ddn'=>$ddn,
        ':tel'=>$tel,
        ':langue'=>$langue,
        ':description'=>$description
        ]);
}
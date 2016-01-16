<?php
function sendPrivateMessage($message_prive, $id_destinataire, $id_auteur) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	$query = $bdd->prepare('INSERT INTO
		message_prive (contenu, id_auteur, date_publication, id_destinataire)
    	VALUES (:contenu, :id_auteur, NOW(), :id_destinataire);');
    $execute = ['contenu' => $message_prive, 'id_auteur'=>$id_auteur, 'id_destinataire' => $id_destinataire];

    if($query -> execute($execute)){
      return True;
    }
	else{
      var_dump($query -> errorInfo());
      return False;
    }
}
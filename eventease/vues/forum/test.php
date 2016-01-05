<?php

$bdd = new PDO(DSN, DBUSER, DBPASS);
$id=1;
$req = $bdd->prepare('SELECT titre FROM topic WHERE id = ? AND id_section=1');
$req->execute(array([]=$id));


while ($donnees = $req->fetch())
{
	echo $donnees['titre'];
}

$req->closeCursor();

?>

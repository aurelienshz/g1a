<?php
function getTopic($id) {
  $bdd = new PDO(DSN, DBUSER, DBPASS);
  $query = $bdd->prepare('SELECT * FROM topic WHERE id = ?');
  $query-> execute(['id'=>$id]);
 
  $topic = $query->fetch();
  return $topic ;
}
?>
<?php 

/*$req = $bdd->prepare('SELECT titre FROM topic WHERE id = ? AND id_section=1');
$req->execute(array($id));


while ($donnees = $req->fetch())
{
	echo $donnees['titre'];
}

$req->closeCursor();

?>*/

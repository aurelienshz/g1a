<?php
$etat = $_REQUEST["p"];
$q = $_REQUEST["q"];
$r = $_REQUEST["r"];
define('DSN', 'mysql:dbname=eventease;host=127.0.0.1;charset=utf8');
define('DBUSER', "root");
define('DBPASS', "");
$bdd = new PDO(DSN,DBUSER,DBPASS);
if ($etat==1){
    $query =$bdd->prepare('INSERT INTO invitation (etat, id_evenement, id_destinataire) VALUES(1,?,?)');
    $query->execute(array($q,$r));
    $text ='Vous participez à cet événement';
}
else if ($etat==0){
    $query =$bdd->prepare('DELETE FROM invitation WHERE id_evenement=:evenement AND id_destinataire=:destinataire');
    $query->execute([
      'evenement' => $q,
      'destinataire' => $r
    ]);
    $text ='Vous ne participez plus à cet événement';
}
echo $text;
?>

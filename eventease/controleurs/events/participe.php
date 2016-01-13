<?php
$q = $_REQUEST["q"];
$r = $_REQUEST["r"];
define('DSN', 'mysql:dbname=eventease;host=127.0.0.1;charset=utf8');
define('DBUSER', "root");
define('DBPASS', "");
$bdd = new PDO(DSN,DBUSER,DBPASS);
$query =$bdd->prepare('INSERT INTO invitation (etat, id_evenement, id_destinataire) VALUES(1,?,?)');
$query->execute(array($q,$r));
?>

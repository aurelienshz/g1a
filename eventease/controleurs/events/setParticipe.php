<?php
$etat = $_REQUEST["p"];
$q = $_REQUEST["q"];

$bdd = new PDO(DSN,DBUSER,DBPASS);

if ($etat==1){
    $testReq = $bdd->prepare('SELECT COUNT(*) FROM invitation WHERE id_evenement=:evenement AND id_destinataire=:destinataire');

    $testReq->execute(['evenement' => $q,'destinataire' => $_SESSION['id']]);
    $c = $testReq->fetchAll()[0][0];
    // var_dump($c);
    if($c != 0) {
        $query = $bdd->prepare('UPDATE invitation SET etat = 1 WHERE id_evenement=:evenement AND id_destinataire=:destinataire');
        $query->execute(['evenement' => $q,'destinataire' => $_SESSION['id']]);
    }
    else {
        $query = $bdd->prepare('INSERT INTO invitation (etat, id_evenement, id_destinataire) VALUES(1,?,?)');
        $query->execute(array($q,$_SESSION['id']));
    }
    $text ='Vous participez à cet événement';
}
else if ($etat==0){
    $query =$bdd->prepare('DELETE FROM invitation WHERE id_evenement=:evenement AND id_destinataire=:destinataire');
    $query->execute(['evenement' => $q,'destinataire' => $_SESSION['id']]);
    $text ='Vous ne participez plus à cet événement';
}
echo $text;
?>

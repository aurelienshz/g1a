<?php

function getUserDetails($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $query = $bdd->prepare('SELECT * FROM membre WHERE id = :id');
    $query->execute(['id'=>$id]);

    if($query->rowCount()==1) {
        $result = $query->fetchAll();
        return $result[0];
    }
    else {
        return False;
    }
    // $bddUser = array(
    //     'civilite' => 'M.',
    //     'prenom' => 'Kevin',
    //     'nom'=> 'Trente-Huit',
    //     'pseudo' => 'KevinDu38',
    //     'ddn' => '17/10/2006',
    //     'mail' => 'kevindu38@hotmail.fr',
    //     'tel' => '0772sevran',
    //     'description' => 'Je m\'appelle Kevin. Quand je suis content, je vomis.',
    //     'privilege' => '0',
    //     'langue' => 'FR'
    // );
}

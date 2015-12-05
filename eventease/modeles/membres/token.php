<?php

// Grains de sel :
$salt = ['Pi9DVwpBV6',  //  NE SURTOUT PAS CHANGER  //
         'qHVfvczw9m',  //  CES VALEURS SOUS PEINE  //
         '7h2WSdyWIM']; //  DE TOUT CASSER.         //

function generateToken($email, $username) {
    global $salt;
    $salted = $salt[0].$username.$salt[1].$email.$salt[2];
    return sha1($salted);
}

function verifyToken($token) {
    $bdd = new PDO(DSN,DBUSER,DBPASS);

    $reqToken = $bdd -> prepare('SELECT id FROM verification_membre WHERE token = :token');
    if($reqToken -> execute(['token'=> $token])) {
        if($reqToken -> rowCount() == 1) {
            $id = $reqToken -> fetchAll()[0];

            $reqConfirm = $bdd -> prepare('UPDATE membre SET niveau = 1 WHERE id = :id');
            $reqConfirm -> execute(['id'=>$id]);
            // Gérer si tout s'est bien passé ?
            return True;
        }
    }
    return False;
}

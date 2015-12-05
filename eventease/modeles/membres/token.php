<?php


function generateToken($email, $username) {
    // Grains de sel :
    $salt = ['Pi9DVwpBV6',  //  NE SURTOUT PAS CHANGER  //
             'qHVfvczw9m',  //  CES VALEURS SOUS PEINE  //
             '7h2WSdyWIM']; //  DE TOUT CASSER.         //
    // Chaîne salée :
    $salted = $salt[0].$username.$salt[1].$email.$salt[2];
    // token
    $token = sha1($salted);

    // Stockage du token en BDD :
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $reqToken = $bdd -> prepare('INSERT INTO `verification_membre` VALUES (:email, :token)');
    if($reqToken -> execute(['email'=>$email, 'token'=>$token])) {
        return $token;
    }
    else {
        return False;
    }

}

function verifyToken($token) {
    $bdd = new PDO(DSN,DBUSER,DBPASS);

    $reqToken = $bdd -> prepare('SELECT email FROM verification_membre WHERE token = :token');
    if($reqToken -> execute(['token'=> $token])) {
        if($reqToken -> rowCount() == 1) {
            $email = $reqToken -> fetchAll()[0]['email'];

            echo $email;

            if($reqConfirm = $bdd -> prepare('UPDATE membre SET niveau = 1 WHERE email = :email') {
                $reqConfirm -> execute(['email'=>$email]);
                // Gérer si tout s'est bien passé ?
                return True;
            }
        }
    }
    return False;
}

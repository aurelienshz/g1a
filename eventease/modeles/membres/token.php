<?php


function generateToken($email, $username, $old_email = NULL) {
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
    if (!empty($old_email)){
        $reqToken = $bdd -> prepare('INSERT INTO `verification_membre` VALUES (:email, :old_email, :token)');
        if($reqToken -> execute(['email'=>$email, 'old_email'=>$old_email, 'token'=>$token])) {
            return $token;
        }
    }else{
        $reqToken = $bdd -> prepare('INSERT INTO `verification_membre` VALUES (:email, NULL, :token)');
        if($reqToken -> execute(['email'=>$email, 'token'=>$token])) {
            return $token;
        }
    }
    var_dump($reqToken -> errorInfo());
    return False;
}

function verifyToken($token) {
    $bdd = new PDO(DSN,DBUSER,DBPASS);
    $reqToken = $bdd -> prepare('SELECT email, old_email FROM verification_membre WHERE token = :token');
    if($reqToken -> execute(['token'=> $token])) {
        if($reqToken -> rowCount() == 1) {
            $email = $reqToken -> fetchAll()[0];
            if(!empty($email['old_email'])){
                // Changement de Mail
                $old_email = $email['old_email'];
                $email = $email['email'];
                $reqConfirm = $bdd -> prepare('UPDATE membre SET mail = :mail WHERE mail = :old_mail');
                if($reqConfirm -> execute([':mail'=>$email, ':old_mail'=>$old_email])) {
                    $reqDrop = $bdd -> prepare('DELETE FROM verification_membre WHERE email = :email');
                    if($reqDrop -> execute([':email'=>$email])){
                        return True;
                    }

                }
            }else{
                //Activation de compte
                $email = $email['email'];
                $reqConfirm = $bdd -> prepare('UPDATE membre SET niveau = 1 WHERE mail = :mail');
                if($reqConfirm -> execute([':mail'=>$email])) {
                    $reqDrop = $bdd -> prepare('DELETE FROM verification_membre WHERE email = :email');
                    if($reqDrop -> execute([':email'=>$email])){
                    return True;
                    }
                }
            }
        }
    }
    return False;
}

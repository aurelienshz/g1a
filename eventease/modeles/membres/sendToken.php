<?php
function sendToken($email, $username) {

    require MODELES.'membres/token.php';
    if($token = generateToken($email,$username)) {
        $tokenlink = 'http://'.$_SERVER['HTTP_HOST'].getLink(['membres','confirm',$token]);
    }
    else {
        return False;
    }

    var_dump($tokenlink);

    if(mail($_POST['email'],
            'Confirmer votre adresse e-mail',
            "Bonjour !\n"
            ."Merci de cliquer sur le lien ci-dessous pour confirmer votre adresse e-mail :\n"
            .$tokenlink
            ."\n"
            ."Si le lien ne fonctionne pas, copiez-collez l'adresse dans votre navigateur.\n\n"
            ."Merci et à bientôt !\n"
            ."-- L'équipe EventEase",
            'From: no-reply@eventease.com')) {
                return True;
    }
    else {
        return False;
    }
}

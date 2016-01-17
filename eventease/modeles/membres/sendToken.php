<?php
function sendToken($email, $username) {

    require_once MODELES.'membres/token.php';
    if($token = generateToken($email,$username)) {
        $tokenlink = 'http://'.$_SERVER['HTTP_HOST'].getLink(['membres','confirm',$token]);
    }
    else {
        return False;
    }

    var_dump($tokenlink);

    if(mail($email,
            'Confirmer votre adresse e-mail',
            "Bienvenue !\n"
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

function sendTokenChange($email, $username, $old_email) {

    require_once MODELES.'membres/token.php';
    if($token = generateToken($email, $username, $old_email)) {
        $tokenlink = 'http://'.$_SERVER['HTTP_HOST'].getLink(['membres','confirm',$token]);
    }
    else {
        return False;
    }

    if(mail($email,
            'Confirmer votre nouvelle adresse e-mail',
            "Bonjour !\n"
            ."Merci de cliquer sur le lien ci-dessous pour confirmer votre nouvelle adresse e-mail :\n"
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

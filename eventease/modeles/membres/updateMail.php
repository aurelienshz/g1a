<?php
require MODELES.'membres/token.php';
require MODELES.'membres/updateOneUserField.php';

function updateMail($id, $mail, $password){

	// Changer le mail dans la BDD.
    if (updateOneUserField($id,'mail' , $mail)){
            $updateMail = True;
    }else{
            $updateMail = False;
    }
	// Desactiver le compte
	//$updateNiveau = updateOneUserField($id,'niveau' , 0);

	// On envoie un mail pour confirmer l'adresse mail
    // $tokenlink = 'http://'.$_SERVER['HTTP_HOST'].getLink(['membres','confirm',generateToken($mail,$password)]);
    // $sendMail = mail($mail,
    //                     'Modification d\'adresse mail sur EventEase',
    //                     "Salutations !\n"
    //                     ."Votre modification d'adresse mail a bien été enregistrée. Merci de cliquer sur le lien ci-dessous pour confirmer votre nouvelle adresse e-mail :\n"
    //                     .$tokenlink
    //                     ."\n"
    //                     ."Si le lien ne fonctionne pas, copiez-collez l'adresse dans votre navigateur.\n\n"
    //                     ."Merci de votre fidélité, et à bientôt !\n"
    //                     ."-- L'équipe EventEase",
    //                     'From: no-reply@eventease.com'); 
    if ($updateMail /*&& $updateNiveau && $sendMail*/ ) {
        return True;
    }else{
        return False;
    }
}

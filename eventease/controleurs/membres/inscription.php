<?php
require MODELES.'membres/checkUsed.php';
require MODELES.'membres/insertUser.php';

$title = 'Inscription';
$style = ['form.css'];


if (empty($_POST)) { // Le formulaire n'a pas été rempli
    vue(['inscription'],$style,$title);
}
else {  // Le formulaire a été rempli
    if ($_POST['pseudo'] && $_POST['email'] && $_POST['password'] && $_POST['password-confirm']) {     // Tous les champs sont remplis
        // alert('ok', 'Tous les champs remplis');

        $contents['retry'] = ['pseudo'=>$_POST['pseudo'], 'email'=>$_POST['email']];
        $errors = ['pseudo'=>'','email'=>'','password'=>'','password-confirm'=>''];

        $forbiddenKeywords = ['eventease','admin','root','hitler','nazi']; // Godwin point awarded ! //

        // On va d'abord vérifier que le nom d'utilisateur n'est pas interdit :
        foreach ($forbiddenKeywords as $keyword) {
            if(strpos(strtolower($_POST['pseudo']), $keyword)!==False) {
                $errors['pseudo'] = 'Nom d\'utilisateur interdit';
            }
        }

        // On vérifie que le nom d'utilisateur n'est pas déjà utilisé :
        if(checkUsed($_POST['pseudo'],'pseudo')) {  // le nom d'utilisateur EST pris)
            $errors['pseudo'] = 'Nom d\'utilisateur déjà utilisé';
        }
        else {      // le nom d'utilisateur N'EST PAS pris
        }
        // On vérifie que l'e-mail entré est valide
        if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) { // C'est une adresse valide
            //On vérifie que l'adresse n'est pas déjà utilisée :
            if(checkUsed($_POST['email'], 'mail')) {    // déjà utilisée
                $errors['email'] = 'Adresse mail déjà utilisée';
            }
            else {
            }
        }
        else {  //Adresse invalide
            $errors['email'] = 'Adresse mail invalide';
        }
        if(True) {  // Le mot de passe entré dans le premier champ répond aux exigences
            // On vérifie que le champ de confirmation contient le même pass :
            if($_POST['password']==$_POST['password-confirm']) {

            }
            else {
                $errors['password-confirm']= 'Les mots de passe ne correspondent pas';
            }
        }
        else {
            $errors['password'] = 'Le mot de passe est trop faible';
        }

        // Si tout s'est bien passé, tous les champs de $errors sont vides
        if(implode('',$errors)=='') {
            // Envoyer un mail pour confirmer l'adresse mail
            insertUser($_POST['pseudo'], $_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            vue(['validationInscription'],$style,$title);
        }
        else {
            $contents['errors'] = $errors;
            vue(['inscription'],$style,$title,$contents);
        }
    }
    else { // Tous les champs ne sont pas remplis
        alert('error', 'Tous les champs sont requis !');
        vue(['inscription'],$style,$title);
    }
}

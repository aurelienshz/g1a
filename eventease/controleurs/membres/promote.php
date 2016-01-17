<?php
if(connected() && $_SESSION['niveau']==3) {
    require MODELES.'membres/getUserDetails.php';
    require MODELES.'membres/promoteUser.php';
    $title = "Changer le statut d'un membre";
    $style = ['form.css'];
    if(!DEBUG) {
        $style[] = 'minipage.css';
    }

    if(!empty($_POST)) {
        if(promoteUser($_GET['id'], $_POST['niveau'])) {
            $contents['ok'] = "Modifié !";
        }
    }


    $user = getUserDetails($_GET['id']);
    // var_dump($user);
    $contents['value'] = $user['niveau'];
    vue(['promote'],$style,$title,$contents);
}
else {
    header('Location: '.getLink(['accueil']));
}

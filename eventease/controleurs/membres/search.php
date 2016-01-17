<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/

if(!empty($_POST)) {    // On est arrivé en postant un formulaire
require MODELES.'membres/searchUsers.php';

    // On traite la recherche :
    $criteres = [];
    if(isset($_POST['criteres_all']) && $_POST['criteres_all']) {
        $criteres = [];
    }
    else {
        if(isset($_POST['criteres_email']) && $_POST['criteres_email']) {
            $criteres[] = 'email';
        }
        if(isset($_POST['criteres_username']) && $_POST['criteres_username']) {
            $criteres[] = 'pseudo';
        }
    }
    $results = searchUsers($_POST['keywords'], $criteres);
    $contents['previousSearch'] = $_POST['keywords'];

    // echo '<pre>';
    // var_dump($results);
    // echo '</pre>';
    // On prépare pour affichage les résultats de recherche :
    if($results) {
        // Afficher les résultats
        $contents['searchResults'] = $results;
    }
    else {
        $contents = [];
    }

}
else {  // On n'a pas encore posté de formulaire
    $contents = [];
}

// Préparation et appel de la vue :
$title = 'Recherche d\'utilisateurs';
$styles = ['search_v2.css', 'form.css', 'prettyform.css', 'userPreview.css'];
$blocks = ['searchForm','search'];
$scripts = ['searchForm.js'];
vue($blocks,$styles,$title,$contents,$scripts);

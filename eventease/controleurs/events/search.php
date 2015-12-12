<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/

$contents = [];


function searchController() {
    $title = 'Recherche d\'évènements';
    $styles = ['form.css','search.css'];
    $blocks = ['searchForm','search'];
    $scripts = ['googleAutocompleteAddress.js'];
    $contents = [];
    vue($blocks,$styles,$title,$contents,$scripts);
}

function listController() {
    $title = 'Liste des évènements';
    $styles = ['search.css', 'list-events.css', 'eventPreview.css'];
    $blocks = ['search'];
    $scripts = ['googleAutocompleteAddress.js'];
    $contents = [];
    vue($blocks,$styles,$title,$contents,$scripts);
}


if(!empty($_POST)) {    // On est arrivé en postant un formulaire
    if(isset($_POST['searchType'])) {   // On est arrivé en postant le form de la page d'accueil
        //NB : searchType = menu déroulant sur la gauche de la recherche condensée de l'accueil

        // Afficher le pretty form
        // Charger le bon champ avec la bonne valeur
        // Afficher les résultats

        $contents = ['results' => []];
    }
    else {              // On est arrivé en postant le form de la page de recherche avancée
        // Afficher le pretty form
        // Charger les champs correctement
        // Afficher les résultats

        $contents = ['results' => []];
    }
}
else {      // On n'est pas arrivé en postant un formulaire
    if(isset($_GET['feature']) && $_GET['feature'] == 'list') { // On veut lister la totalité des events accessibles
        listController();
    }
    else {  // On veut le formulaire
        searchController();
    }
}

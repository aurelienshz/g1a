<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/

$contents = [];

if(!empty($_POST)) { // On est arrivé en postant un formulaire
    if(isset($_POST['searchType'])) {   // On est arrivé en postant le form de la page d'accueil
        // Traiter la recherche faite depuis la page d'accueil
        // Charger la valeur du champ rempli sur l'accueil dans le champ correspondant du form avancé ?
        $contents = ['results' => []];
    }
    else {  // On est arrivé en postant le form de la page de recherche avancée
        // Traiter la recherche
        $contents = ['results' => []];
    }
}

/**** Préparation de la vue ****/
$title = 'Recherche d\'évènements';
$styles = ['form.css','accueil.css','search.css'];
$blocks = ['search'];
$scripts = ['googleAutocompleteAddress.js'];


/**** Affichage de la page ****/
//Appel de la vue :
vue($blocks,$styles,$title,$contents,$scripts);

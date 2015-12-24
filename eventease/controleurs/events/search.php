<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/

$contents = [];

function detailsToStrings($events) {
    // transforme les détails en chaînes faciles à afficher type "de 8 à 30 ans"
    if($events) {
        // Traitement des contenus :
        foreach($events as $key=>$event) {

            // Préparation de la chaîne représentant la tranche d'âge :
            if(isset($event['age_min'], $event['age_max'])) {
                $events[$key]['tranche_age'] = 'De '.$event['age_min'].' à '.$event['age_max'].' ans';
            }
            elseif(isset($event['age_min'])) {
                $events[$key]['tranche_age'] = 'À partir de '.$event['age_min'].' ans';
            }
            elseif(isset($event['age_max'])) {
                $events[$key]['tranche_age'] = 'Jusqu\'à '.$event['age_max'].' ans';
            }
            else {
                $events[$key]['tranche_age'] = '';
            }

            // Préparation de la chaîne représentant le lieu :
            $addressLines = explode(',',$event['adresse']);
            $events[$key]['lieu'] = end($addressLines);

            $events[$key]['debut'] = substr($events[$key]['debut'], 0, 16);
            $events[$key]['debut'] = preg_replace('/-/','/', $events[$key]['debut']);
        }
        return $events;
    }
    else {
        return False;
    }
}

function searchController() {
    $contents = [];
    if(!empty($_POST)) {    // On est arrivé en postant un formulaire
        if(isset($_POST['searchType']) && (isset($_POST['searchValueKeywords']) || isset($_POST['searchValuePlace']) || isset($_POST['searchValueDate']))) {   // On est arrivé en postant le form de la page d'accueil
            //NB : searchType = menu déroulant sur la gauche de la recherche condensée de l'accueil
            echo '<pre>';
            var_dump($_POST);
            echo '</pre>';

            if($_POST['searchValueKeywords']) {
                $results = searchEvents($_POST['searchValueKeywords']);
            }
            elseif($_POST['searchValuePlace']) {

            }
            else {

            }
            // Afficher le pretty form
            // Charger le bon champ avec la bonne valeur
            // Afficher les résultats
        }
        else {              // On est arrivé en postant le form de la page de recherche avancée
            // On traite la recherche :
            require MODELES.'events/searchEvents.php';

            $results = searchEvents($_POST['keywords']);
            // echo '<pre>';
            // var_dump($results);
            // echo '</pre>';
            if($results) {
                $results = detailsToStrings($results);
                // Afficher les résultats
                $contents = ['searchResults' => $results];
            }
            else {
                $contents = [];
            }
        }
    }
    else {  // On n'a pas encore posté de formulaire
    }

    // Préparation et appel de la vue :
    $title = 'Recherche d\'évènements';
    $styles = ['form.css', 'prettyform.css', 'search_v2.css', 'eventPreview.css'];
    $blocks = ['searchForm','search'];
    $scripts = [];
    vue($blocks,$styles,$title,$contents,$scripts);
}

function listController() {
    require MODELES.'events/getEvents.php';

    if(connected()) {
        $events = getEvents($_SESSION['id']);
    }
    else {
        $events = getEvents();
    }

    $events = detailsToStrings($events);

    // echo '<pre>';
    // var_dump($events);
    // echo '</pre>';

    $contents['searchResults'] = $events;

    // Préparation et appel de la vue :
    $title = 'Liste des évènements';
    $styles = ['search_v2.css','list-events.css', 'eventPreview.css'];
    $blocks = ['search'];
    $scripts = [];
    vue($blocks,$styles,$title,$contents,$scripts);
}


if(isset($_GET['feature']) && $_GET['feature'] == 'list') { // On veut lister la totalité des events accessibles
    listController();
}
else {  // On veut le formulaire
    searchController();
}

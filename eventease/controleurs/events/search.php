<?php
/* CONTROLEUR D'ACTION */

/**** Préparation des contenus ****/

// $contents = [];

require MODELES.'events/getTypes.php';

function detailsToStrings($events) {
    // fonction transforme les détails en chaînes faciles à afficher type "de 8 à 30 ans"
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
    $contents['types'] = getTypes();
    if(!empty($_POST)) {    // On est arrivé en postant un formulaire
    require MODELES.'events/searchEvents.php';
        if(isset($_POST['searchType']) && (isset($_POST['searchKeywords']) || isset($_POST['searchPlace']) || isset($_POST['searchDate']))) {   // On est arrivé en postant le form de la page d'accueil
            //NB : searchType = menu déroulant sur la gauche de la recherche condensée de l'accueil

            switch($_POST['searchType']) {
                case "place":
                    $results = searchEvents($_POST['searchPlace'], ['adresse']);
                    $contents['previousSearch'] = $_POST['searchPlace'];
                break;
                case "date":
                    $results = [];
                break;
                case "keywords":
                default:
                    $results = searchEvents($_POST['searchKeywords']);
                    $contents['previousSearch'] = $_POST['searchKeywords'];
                break;
            }
            // Charger le bon champ avec la bonne valeur
            // Afficher les résultats
        }
        else {  // On est arrivé en postant le form de la page de recherche avancée
            // On traite la recherche :
            $criteres = [];
            if(isset($_POST['criteres_all']) && $_POST['criteres_all']) {
                $criteres = [];
            }
            else {
                if(isset($_POST['criteres_nom']) && $_POST['criteres_nom']) {
                    $criteres[] = 'nom';
                }
                if(isset($_POST['criteres_lieu']) && $_POST['criteres_lieu']) {
                    $criteres[] = 'adresse';
                }
                if(isset($_POST['criteres_description']) && $_POST['criteres_description']) {
                    $criteres[] = 'description';
                }
                if(isset($_POST['criteres_type']) && $_POST['criteres_type']) {
                    $criteres[] = 'type';
                }
            }
            $results = searchEvents($_POST['keywords'], $criteres);
            $contents['previousSearch'] = $_POST['keywords'];
        }

        // echo '<pre>';
        // var_dump($results);
        // echo '</pre>';
        // On prépare pour affichage les résultats de recherche :
        if($results) {
            $results = detailsToStrings($results);
            // Afficher les résultats
            $contents['searchResults'] = $results;
        }
        else {
        }

    }
    else {  // On n'a pas encore posté de formulaire
    }

    // Préparation et appel de la vue :
    $title = 'Recherche d\'évènements';
    $styles = ['form.css', 'prettyform.css', 'search_v2.css', 'eventPreview.css'];
    $blocks = ['searchForm','search'];
    $scripts = ['searchForm.js','filter.js'];
    vue($blocks,$styles,$title,$contents,$scripts);
}

function listController() {
    require MODELES.'events/getEvents.php';
    $contents['types'] = getTypes();

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
    $styles = ['search_v2.css','list-events.css', 'eventPreview.css', 'form.css'];
    $blocks = ['search'];
    $scripts = ['filter.js'];
    vue($blocks,$styles,$title,$contents,$scripts);
}


if(isset($_GET['feature']) && $_GET['feature'] == 'list') { // On veut lister la totalité des events accessibles
    listController();
}
else {  // On veut le formulaire
    searchController();
}

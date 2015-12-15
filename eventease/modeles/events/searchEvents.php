<?php
function searchEvents($searchString) {

    $keywords = explode(' ',$searchString);

    $bdd = new PDO(DSN, DBUSER, DBPASS);
    // squelette des requêtes sur les champs :
    $query = "SELECT DISTINCT evenement.id, evenement.titre, evenement.debut, evenement.description, evenement.tarif, evenement.age_min, evenement.age_max, type.nom AS type, adresse.adresse_condensee AS adresse, media.lien
                    FROM evenement
                    LEFT JOIN type on evenement.id_type = type.id
                    LEFT JOIN adresse on evenement.id_adresse = adresse.id
                    LEFT JOIN media ON evenement.id_media_principal = media.id
                    WHERE ";

    // On met en place la pondération pour chaque champ
    $fields = ['evenement.titre'=>5,
                'type.nom'=>4,
                'evenement.description'=>2,
                'adresse.adresse_condensee'=>1];

    // initialisation des résultats de recherche :
    $results = [];

    foreach($fields as $field => $ponderation ) {
        $conditions = [];
        foreach($keywords as $keyword) {
            if(!empty($keyword) && strlen($keyword)>=2) {  // sanitizer : évite les doubles espaces et les lettres uniques
                $conditions[] = "LOWER(".$field.") LIKE '%".$keyword."%'";
            }
        }

        $whereClauses = implode(' OR ', $conditions);
        // var_dump($whereClauses);

        // echo '<h2>Executing query : </h2>'.$query.$whereClauses.'<br />';

        $req = $bdd -> prepare($query.$whereClauses);
        $req -> execute();

        // echo '<br /><br /><br />Matches on '.$field.' : '.$req -> rowCount();

        while($match = $req -> fetch(PDO::FETCH_ASSOC)) {
            // echo '<h3>Next match on '.$field.'</h3>';
            // echo 'match event id : '.$match['id'].'<br />';
            $match['points'] = $ponderation;
            if(empty($results)) {
                // echo 'results vide<br />';
                $results = [$match];
            }
            else {
                // On checke si on a déjà récupéré cet event dans les résultats des requêtes précédentes :
                $merge = True;
                foreach($results as $key => $event) {
                    // echo 'testing results key '.$key.'<br />';
                    if($results[$key]['id'] == $match['id']) {
                        // echo 'Adding points<br />';
                        $results[$key]['points'] += $match['points'];
                        $merge = False;
                    }
                }

                if($merge) {
                    // echo 'Preparing merge<br />';
                    $results = array_merge($results, [$match]);
                }
            }
        }
    }

    function compare_score($result1, $result2) {
        return $result2['points'] - $result1['points'];
    }

    usort($results, 'compare_score');

    return $results;
}

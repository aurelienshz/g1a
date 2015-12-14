<?php
function searchEvents($keywords) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);

    $query = "SELECT DISTINCT evenement.id, evenement.titre, evenement.debut, evenement.description, evenement.tarif, evenement.age_min, evenement.age_max, type.nom AS type, adresse.adresse_condensee AS adresse, media.lien
                    FROM evenement
                    LEFT JOIN type on evenement.id_type = type.id
                    LEFT JOIN adresse on evenement.id_adresse = adresse.id
                    LEFT JOIN media ON evenement.id_media_principal = media.id
                    WHERE ";

    if($keywords) {
        $keywordsString = implode(' ', $keywords);
        $conditions = "LOWER(evenement.titre) LIKE '%".$keywordsString."%'";
    }
    else {
        $conditions = '0';
    }

    foreach($keywords as $keyword) {
        if(!empty($keyword)) {  // cette condition sert à sanitozer les keywords mais ça n'a pas sa place ici
            $conditions .= " OR LOWER(evenement.titre) LIKE '%".strtolower($keyword)."%'";
        }
    }

    echo $query.$conditions;

    $req = $bdd -> prepare($query.$conditions);
    $req -> execute();

    return $req -> fetchAll(PDO::FETCH_ASSOC);
}

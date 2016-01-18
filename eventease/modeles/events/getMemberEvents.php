<?php

/*
entrée : id du membre dont on veut les évènements passés et futurs --> auxquels il participe, auxquels il est invité, qu'il a créé
sortie : détails des évènements à venir du membre, sous forme d'un tableau
- date : format jj/mm/aaaa      sic : nom
- titre                         sic : nom
- type                          sic : nom
- ville                         sic : nom note: explode et envoi dernière valeur
- tarif                         sic : nom note: en chaînes faciles à afficher type "de 8 à 30 ans"
- age                           sic : nom
- description                   sic : nom
- image --> à détermine
- etat_participation
*/
function getMemberEvents($id) {

    require_once MODELES.'events/suggestions.php';
    // requete sql pour prendre les infos nécessaires
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = 'SELECT evenement.id, evenement.debut AS date, evenement.titre, type.nom AS type, adresse.adresse_condensee, evenement.tarif, evenement.age_min, evenement.age_max, evenement.description, media.lien AS image, invitation.etat AS invitation
                FROM membre
                LEFT JOIN invitation ON membre.id=invitation.id_destinataire
                LEFT JOIN evenement ON evenement.id=invitation.id_evenement
                LEFT JOIN type ON evenement.id_type = type.id
                LEFT JOIN adresse ON evenement.id_adresse = adresse.id
                LEFT JOIN media ON evenement.id_media_principal = media.id
                WHERE membre.id = :id
                ORDER BY evenement.debut';
    $query = $bdd->prepare($query);

    $query -> execute(['id'=>$id]);

    $events = $query->fetchAll(PDO::FETCH_ASSOC);

    // transformation des détails en chaînes faciles à afficher type "de 8 à 30 ans"
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
            $addressLines = explode(',',$event['adresse_condensee']);
            $events[$key]['ville'] = end($addressLines);
            // $events[$key]['ville'] = end(explode(' ',end($addressLines)));

            $events[$key]['lien'] = generateMediaLink($event['id'],$event['type']);

            // chaîne représentant la date :
            $events[$key]['day'] = getdate(strtotime($events[$key]['date']))['mday'];
            $events[$key]['month'] = getdate(strtotime($events[$key]['date']))['mon'];
            $events[$key]['year'] = getdate(strtotime($events[$key]['date']))['year'];
            $events[$key]['date'] = date('j/m/o',strtotime($events[$key]['date']));

            // Préparation de la chaîne représentant la participation
            if(isset($event['invitation'])) {
                switch($event['invitation']) {
                    case 0:
                        $events[$key]['participation'] = "Vous êtes invité";
                    break;
                    case 1:
                        $events[$key]['participation'] = "Vous participez";
                    break;
                    case 2:
                        $events[$key]['participation'] = "Vous participez peut-être";
                    break;
                    case 3:
                    default:
                        $events[$key]['participation'] = "Vous ne participez pas";
                    break;
                }
            }
            else {
                $events[$key]['participation'] = "Vous ne participez pas";
            }

            // Préparation de la chaîne représentant la privacy de l'event
        }
        // echo '<pre>';
        // var_dump($events);
        // echo '</pre>';
        return $events;
    }
    else {
        return False;
    }
}

<?php

/*
Fonction : Récupération des mesages privés REÇUS par le membre dont l'id est passé en paramètre


entrée : id du membre dont on veut récupérer les messages privés
sortie : détails des messages privés du membre, sous forme d'un tableau
 - message_id
 - contenu
 - horodate
 */

function getPrivateMessages($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT
                            message_prive.id_auteur,
                            message_prive.contenu,
                            message_prive.date_publication,
                            membre.pseudo
                            FROM message_prive
                            JOIN membre
                            ON message_prive.id_destinataire = membre.id
                            WHERE membre.id = :id
                            ORDER BY message_prive.date_publication'
                            );
    $query->execute(['id'=>$id]);
    $messages_prives = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach($messages_prives as $key=>$message) {
        if(isset($message['date_publication'])) {
            $messages_prives[$key]['date_publication'] = date('d/m/o à H:i:s',strtotime($messages_prives[$key]['date_publication']));
        }
    }
    var_dump($messages_prives);
    return $messages_prives;
}
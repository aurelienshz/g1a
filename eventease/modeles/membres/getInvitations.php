<?php

function getInvitations($id) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT
                            invitation.id_expediteur,
                            invitation.id_evenement
                            FROM invitation
                            JOIN membre
                            ON invitation.id_destinataire = membre.id
                            WHERE (membre.id = :id AND etat=0)'
                            );
    $query->execute(['id'=>$id]);
    $invitations = $query->fetchAll(PDO::FETCH_ASSOC);
    return $invitations;
}
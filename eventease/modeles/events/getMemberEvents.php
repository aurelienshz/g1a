<?php

// entrée : id du membre dont on veut les prochains évènements
// sortie : détails des évènements à venir du membre, sous forme d'un tableau
// La sortie **doit** être **ordonnée chronologiquement** (sinon tu casses tout)
// On pourra ajouter des params tq des limites de nb d'events à retourner (3 prochains mois...)
// On pourra aussi avoir un mode qui sort tous les évènements publics (pas forcément la même fonction)

function getMemberEvents('id') {
      $bdd = new PDO(DSN, DBUSER, DBPASS);
      $query = $bdd->prepare('SELECT ')
}

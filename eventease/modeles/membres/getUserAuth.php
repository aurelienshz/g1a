<?php
/* modeles/membres/getUserAuth.php
Entrée : Nom d'utilisateur
Sortie :
- [User : facultatif] + pass(hash) si username existe
- False si user non trouvé
*/

function getUserAuth($username) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT id,mdp,date_derniere_connexion,niveau FROM membre WHERE pseudo = :username');
    $query -> execute(['username'=>$username]);
    if ($query->rowCount() === 1) {
        $userAuth = $query->fetchAll();
        return $userAuth[0];
    }
    else {
        return False;
    }
}

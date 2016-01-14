<?php
/* modeles/membres/getUserAuth.php
Entrée : Nom d'utilisateur
Sortie :
- [User : facultatif] + pass(hash) si username existe
- False si user non trouvé
*/

function getUserAuth($username, $caseSensitive = True) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    if ($caseSensitive){
        $caseSensitive = ' = ';
    }else{
        $caseSensitive = ' COLLATE UTF8_GENERAL_CI LIKE ';
    }
    $query = $bdd->prepare('SELECT id,mdp,date_derniere_connexion,niveau FROM membre WHERE pseudo'. $caseSensitive .':username');
    $query -> execute(['username'=>$username]);
    if ($query->rowCount() === 1) {
        $userAuth = $query->fetchAll();
        return $userAuth[0];
    }
    else {
        return False;
    }
}

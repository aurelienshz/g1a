<?php
/* modeles/membres/getUserAuth.php
Entrée : Nom d'utilisateur
Sortie :
- [User : facultatif] + pass(hash) si username existe
- False si user non trouvé
*/

function getUserAuth($username) {
    $bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('SELECT id,mdp FROM membre WHERE pseudo = :username');
    $query -> execute([':username'=>$username]);
    $id = $query->fetchAll();
    // if(count($id)==1) ?
    return $id[0];
}




// function getUserAuthOld($username) {
//     $bddUsers = array(
//         'KevinDu38'=>'$2y$10$sZzL0Lb/RKp7EIYL3G0gh.TatnkE23U/yRLyb008BS4csfAB3omOq',
//         'EventEase'=>'$2y$10$sZzL0Lb/RKp7EIYL3G0gh.TatnkE23U/yRLyb008BS4csfAB3omOq');
//     if(array_key_exists($username, $bddUsers)) {
//     $auth = array('username' => $username,'hash' => $bddUsers[$username]);
//     }
//     else {
//     $auth = False;
//     }
//     return $auth;
//     // gestion des erreurs (user non trouvé)
//     // -->contrôle du nombre de résultats ?
// }

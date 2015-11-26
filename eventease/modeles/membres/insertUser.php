
<?php
/* modeles/membres/insertUser.php */
function insertUser($username, $mail, $passHash) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
    $query = $bdd->prepare('INSERT INTO membre (pseudo, mdp, mail) VALUES (:username, :passHash, :email)');
    $query -> execute([
    	':username'=>$username,
    	':passHash'=>$passHash,
        ':email'=>$mail
        ]);
}

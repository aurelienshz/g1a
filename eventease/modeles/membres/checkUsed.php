                                                                              <?php
/* modeles/membres/checkUsed.php
Vérifie si le pseudo ou le mail est déjà utilisé par un autre membre.

checkUsed('Paramétre_à_vérifier' [, 'type_du_paramètre'])
- Le type du paramètre est par défaut 'pseudo'.

Sortie : Booléen VRAI si utilisé, FALSE si disponible.
*/
function checkUsed($toCheck, $name='', $caseSensitive = True) {
	$bdd = new PDO(DSN, DBUSER, DBPASS);
	// Le bloc ci-dessous peut être rendu plus lisible à mon avis ~ Aurélien
	$champ='pseudo';
	switch ($name) {
		case 'pseudo':
		case 'mail':
			$champ = $name;
			break;
	}
	if($caseSensitive){
		$caseSensitive = ' = ';
	}else{
		$caseSensitive = ' COLLATE UTF8_GENERAL_CI LIKE ';
	}
    $query = $bdd->prepare('SELECT COUNT(*) FROM membre WHERE '.$champ. $caseSensitive .':toCheck');
    $query -> execute(['toCheck'=>$toCheck]);
    $count = $query->fetchAll()[0][0];
    if ($count == 0){
    	return False;
    }else{
    	return True;
    }
}

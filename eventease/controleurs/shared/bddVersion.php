<?php

// Aller lire la version dans le git
function mostRecentGitVersion() {
    $bddFolder = scandir('ressources/bddGeneration');

    foreach($bddFolder as $key=>$string) {
        // attraper les numéros de version avec une regex et des parenthèses capturantes :
        $a = preg_match('#v([1-9].+)sql#',$string,$matches[$key]);
        // convertir cela en un tableau des numéros de version (on poppe le . de l'extension .sql, qui a été capturé)
        if(!empty($matches[$key])) {
            $versions[] = $matches[$key] = substr($matches[$key][1], 0, -1);
        }
    }

    $mostRecent = $versions[0];
    foreach($versions as $version) {
    	if(version_compare($version, $mostRecent)==1) {
    		$mostRecent = $version;
    	}
    }
    return $mostRecent;
}
function bddVersion() {
    $bdd = new PDO(DSN,DBUSER,DBPASS);
    $query = $bdd->query('SELECT version FROM bddversion');
    if($query && ($query->rowCount() > 1)) {
        $version = False;
    }
    else {
        $version = $query->fetchAll()[0][0];
    }
    return $version;
}

$gitVersion = mostRecentGitVersion();
$bddVersion = bddVersion();

if(!$bddVersion) {
    ob_start();
    ?>
        <strong style="color:red;">BASE DE DONNÉES CORROMPUE. Videz-la intégralement puis réimportez avec le fichier .sql de la version <?php echo $gitVersion; ?>.</strong>
    <?php
    $message = ob_get_clean();
}
else {
    switch(version_compare($gitVersion,$bddVersion)) {
        case -1:
            $message = '<strong><span style="color:red;">Attention !</span> Vous avez créé une nouvelle version de la BDD. N\'oubliez pas de l\'exporter sous forme de .sql dans le drive.</strong>';
            break;
        case 0:
            $message = '<span>BDD locale à jour. Version : '.$bddVersion.'</span>';
            break;
        case 1:
            $message = '<strong style="color:red;"><span>Attention !</span> Vous avez créé une nouvelle version de la BDD. N\'oubliez pas de l\'exporter sous forme de .sql dans le drive.</strong>';
            break;
    }
}
?>

<div style="border: 1px solid red; width: 60%; padding: 1em;">
    <h3>Base de données :</h3>
    <?php echo $message; ?>
</div>

<?php
// Aller lire la version de la base locale
// comparer
// Si == on fait rien
// Si différent on affiche un avertissement dans la barre de debug

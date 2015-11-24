<?php
    $entete = entete("Mon site / Étape 1");
    $menu = menu("etape1");

    $contenu = "<h2>Contenu de l'étape 1</h2>";
    $contenu .= "Liste des utilisateurs";
    $contenu .= "<ul>";
    while($ligne = $reponse->fetch()){
        $contenu .= "<li>".$ligne['identifiant']."</li>";
    }
    $contenu .= "</ul>";
    
    $pied = pied();

    include 'gabarit.php';
?>

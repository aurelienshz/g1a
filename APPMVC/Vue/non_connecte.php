<?php
    $entete = entete("Mon site / Accueil non connecté");
    $menu = formulaire();
    $contenu = "<h2>Accueil des personnes non connectées</h2>Merci d'utiliser le menu de gauche pour vous inscrire ou vous connecter.";
    $pied = pied();

    include 'gabarit.php';
?>
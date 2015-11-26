<?php
session_start();
require("Modele/connexion.php");    // Connexion à la BDD
require("Vue/commun.php");          // Fonctions communes à toutes les vues (formulaires etc...)

if(!isset($_SESSION["userID"])){ // L'utilisateur n'est pas connecté
    include("Controleur/connexion.php"); // On utilise un controleur secondaire pour éviter d'avoir un fichier index.php trop gros
}
else { // L'utilisateur est connecté
    if(isset($_GET['cible'])) { // on le dirige vers la page où il veut aller
        switch($_GET['cible']) {
            case 'accueil':
                include("Vue/accueil.php");
                break;
            case 'etape1':
                include("Modele/utilisateurs.php");
                $reponse = utilisateurs($db);
                include("Vue/etape1.php");
                break;
            case 'etape2':
                include("Vue/etape2.php");
                break;
            case 'etape3':
                include("Vue/etape3.php");
                break;
            case 'deconnexion':
                // Détruit toutes les variables de session
                $_SESSION = array();
                // Détruit le cookie de session chez le client
                if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(), '', time()-42000, '/');
                }
                // Détruit la session côté serveur
                session_destroy();
                // Appel de l'accueil non connecté
                include("Vue/non_connecte.php");
                break;
            default:
                include("Vue/accueil.php");
                break;
        }


/*      // Structure de contrôle identique au switch, avec des if / else if / else :
        if($_GET['cible'] == 'accueil') {
            include("Vue/accueil.php");
        }
        else if ($_GET['cible'] == "etape1") {
            include("Modele/utilisateurs.php");
            $reponse = utilisateurs($db);
            include("Vue/etape1.php");
        }
        else if ($_GET['cible'] == "etape2") {
            include("Vue/etape2.php");
        }
        else if ($_GET['cible'] == "etape3") {
            include("Vue/etape3.php");
        }
        else if ($_GET['cible'] == "deconnexion") {
            // Détruit toutes les variables de session
            $_SESSION = array();
            // Détruit le cookie de session chez le client
            if (isset($_COOKIE[session_name()])) {
                setcookie(session_name(), '', time()-42000, '/');
            }
            // Détruit la session côté serveur
            session_destroy();
            // Appel de l'accueil non connecté
            include("Vue/non_connecte.php");
        }
    } else { // affichage par défaut
            include("Vue/accueil.php");
    } */

}

<?php 
    session_start();
    require("Modele/connexion.php");
    require("Vue/commun.php");
   
    if(!isset($_SESSION["userID"])){ // L'utilisateur n'est pas connecté
        include("Controleur/connexion.php"); // On utilise un controleur secondaire pour éviter d'avoir un fichier index.php trop gros
    } else { // L'utilisateur est connecté
        if(isset($_GET['cible'])) { // on regarde la page où il veut aller
            if($_GET['cible'] == 'accueil'){
                include("Vue/accueil.php");
            } else if ($_GET['cible'] == "etape1"){
                include("Modele/utilisateurs.php");
                $reponse = utilisateurs($db);
                include("Vue/etape1.php");
            } else if ($_GET['cible'] == "etape2"){
                include("Vue/etape2.php");
            } else if ($_GET['cible'] == "etape3"){
                include("Vue/etape3.php");
           } else if ($_GET['cible'] == "deconnexion"){
                // Détruit toutes les variables de session
                $_SESSION = array();
                if (isset($_COOKIE[session_name()])) {
                    setcookie(session_name(), '', time()-42000, '/');
                }
                session_destroy();
                include("Vue/non_connecte.php");
            }
        } else { // affichage par défaut
                include("Vue/accueil.php");
        }
    }

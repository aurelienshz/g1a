<?php
function checkAdmin() {
    if(connected() && $_SESSION['niveau'] == 3) {
        return True;
    }
    else {
        if(connected()) {
            alert('error', 'Vous n\'avez pas l\'accréditation suffisante pour accéder à cette page !');
            header('Location: '.getLink(['accueil','index']));
            return False;
            exit();
        }
        else {
            alert('error', 'Connectez-vous avec un statut d\'administrateur');
            header('Location: '.getLink(['membres','connexion']));
            return False;
            exit();
        }
    }
}

Questions pour le groupe :
- On n'a pas reparlé de la notion de following. Comment / est-ce qu'on implémente ? Qui s'en charge ?
- Mes évènements --> fil d'actualité ? ~~ dashboard
- places max : plusieurs events *sur EE* qui correspondent à la même chose en réalité ??


-----------------------------------------------------------------------

# THE ULTIMATE TODO LIST #



## Général : ##
    - URL rewrite -bonux-
    - mentions légales
    - plan du site
    - responsive serait un bonus
    - charte graphique à retravailer, notamment couleurs
    - relire le CdC et être attentif à ce qu'on a implémenté (ou pas)

## Accueil ##
    - suggestions à rendre dynamique --> Tristan
        pour l'instant : statique
    - slideshow suggestions à remettre en forme -> Aurélien
    - mes évènements : calendrier à faire au poil avec les events qu'un membre a le droit de voir -> Aurélien
        - calendrier : j'aimerais proposer l'option mes évènements / évènements publics, proposer le bouton créer à cette date, et faire travailler tout ça en ajax pour alléger la page. ça serait <3

## Profil / gestion des membres ##

Afficher / modifier -- Loann
    - front end :
        - Aurélien doit-il réparer la vue (prettyform and shit)
        - réafficher le contenu des champs si le form est sorti en erreur
        - client : suggérer les règles pour les noms, les mdp... dans le message d'erreur.
        - client : nom aligné à gauche
    - back end : y avait-il un bug dans la vérif d'adresse (signalé par Loann)
    - suppression du profil ?
    - modification mdp / adresse mail
    CLIENT :
    - gros onglets -> bof , rester sur style arrondi et allégé
    - que fait le bouton "iviter à un event" ? interface ? options ?

Inscription / Connexion / Vaidation mail :
    - clarifier et remettre à plat les étapes et leurs articulations
    - inscription : conditions sur le mdp
    - ajouter bouton d'inscription sur page de connexion
    - mot de passe oublié
    - case à cocher conditions générales
    - mentions légales : à rédiger

## EVENTS ##

Général :
    - client : créateur =/= orga : orga c'est une info (quasiment un texte) créateur c'est un niveau de privilège sur l'event
    -

Affichage et participation aux events  -- Guillaume & Aude
    - affichage :
        - gérer l'event inexistant
        - slideshow photos : nouvelle version à implémenter
        - Gestion des participations :
        - Commentaires, organisateurs, qui y va ? etc...
        - spécification de l'interface si je suis organisateur
    - client : bouton inviter qqun
    - client : faire attention aux alignements des blocks
    - client : ouvrir le profil de la personne dans une nouvelle fenêtre
        Aurélien : que diriez-vous d'une modale ?
    - client : contact de l'organisateur -- je ne me souviens plus de ce qu'il voulait ~ Aurélien
    - participation :
        - client : pouvoir y aller à plusieurs ("bring a friend" ? proposer aux gens de saisir les e-mails des copains qui viennent et inciter ces derniers à s'inscrire ?)
        - demande de connexion ou d'inscription si nécessaire
        - requêtes AJAX ?

Création d'event :
    - choix des types --> écrire une requete pour aller récup la liste des types en BDD - Aurélien
        --> done mais dans une sous fonction du modèle, factorisation nécessaire
        --> implémenter partout où c'est requis --> Aurélien
    - insertion dans la base et vérif champs -- Tristan
    - photos !!!
        - ajout de photos supplémentaires (pas uniquement la photo principale)
        - photo par défaut dépendante du type

Modif event -- Tristan
	    - vérifier qu'on est connecté et organisateur de l'event qu'on cherche à modifier
        - penser à l'action supprimer

## Back-office ##
    - types d'events
        --> photos par défaut correspondant aux types (et photos correspondant aux )
    - slogan et subslogan accueil
    - édition FAQ
    - catégories du forum

## BDD ##
    - types : réfléchir aux types de base, peupler

Recherche :
events :
    - implémentation filtres -- Aurélien
    - implémentation question âge
    - mettre en valeur le statut de participation
membres :
    - comment on fait ?

Header / Footer
    - head : forum menu - Aurélien
    - liens footer à activer et relier - Aurélien sauf si qqun d'autre veut le faire

Forum :     -- Audrey
    - affichage des catégories dans un prettyform ?
    - nouveau message
    - nouveau sujet
    - privilèges : modifier, supprimer message, seulement les miens sauf si modérateur ou admin

FAQ / Aide / Doc
    - expliquer les fonctionnalités
    - documenter in-page
        J'aimerais implémenter un système d'aide in-page mais je ne sais pas encore comment ~ Aurélien

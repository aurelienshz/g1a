Questions pour le groupe :
- On n'a pas reparlé de la notion de following. Comment / est-ce qu'on implémente ? Qui s'en charge ?
- Mes évènements --> fil d'actualité ? ~~ dashboard

-----------------------------------------------------------------------

# TeH UltImAtE ToDo LiST (with catz and shit feat Furby) #


## Points à aborder en groupe ##

priorités :
- [ ] mot de passe oublié => envoyer mail avec MDP généré. --> Tristan
- [ ] Bug des dates 30 Nov -1 & 1 Jan 1970


- charte graphique à retravailler, notamment couleurs
- relire le CdC et être attentif à ce qu'on a implémenté (ou pas)
- [x] possibilité d'ajouter une ligne à l'adresse pour spécifier étage, salle etc...=> Qu'ils utilisent la description ! Quitte à renommer le label du champ.


## ToDo - général ##

- [ ] plan du site --> à remplir (accueil -> sitemap) --> Aurélien

- [x] URL rewrite : demande client --> Aurélien



## Accueil ##

- [ ] suggestions à rendre dynamique --> Tristan
- [x] bug childNodes Firefox
- [x] mes évènements : calendrier à faire au poil avec les events qu'un membre a le droit de voir -> Aurélien
    j'aimerais proposer l'option mes évènements / évènements publics, ajouter le bouton créer un event à cette date, et faire travailler tout ça en ajax pour alléger la page. ça serait top moumoute.


## Profil / gestion des membres ##

### Afficher / modifier -- Loann ###
front end :
- **Question :** Afficher la date de dernière connexion ?
- [x] réafficher le contenu des champs si le form est sorti en erreur
- [x] back end : y avait-il un bug dans la vérif d'adresse (signalé par Loann) - ça marche pas forcément en local, il suffit que ça marche sur le serveur.
- [x] quand j'essaie de virer l'adresse renseignée, le form est validé mais mon adresse reste.
- [x] suppression du profil ?
- [x] modification mdp
- [x] adresse mail (besoin que les token marchent).
- [x] désactiver lien pour l'onglet actif (PHP ou JS)
- [ ] Filtre calendrier mes events --> Aurélien
- [x] Modifier la suppression de membre pour pas que ça le supprime totalement
CLIENT :
- [x] gros onglets -> bof , rester sur style arrondi et allégé
- [x] client : suggérer les règles pour les noms, les mdp... dans le message d'erreur. --> Tristan
- [x] client : nom aligné à gauche --> Aurélien

### Inscription / Connexion / Validation mail : ###
- inscription : conditions sur le mdp --> Aurélien
- [x] ajouter bouton d'inscription sur page de connexion
- [x] case à cocher conditions générales


## EVENTS ##

Général :
- [x] client : créateur =/= orga : orga c'est une info (quasiment un texte) créateur c'est un niveau de privilège sur l'event
- [x] afficher mentions légales et CGV dynamiquement --> Aurélien

Affichage et participation aux events  -- Guillaume & Aude
- affichage :
- [x] gérer l'event inexistant
- [x] slideshow photos : nouvelle version à implémenter
- [x] Gestion des participations :
- [x] Commentaires,
- [ ] organisateurs, limité à 1 --> Guillaume
- [ ] qui y va ? limité à 1 ? --> Guillaume
- [ ] spécification de l'interface si je suis organisateur
- [x] client : bouton inviter qqun
- [ ] client : faire attention aux alignements des blocks
- [ ] client : ouvrir le profil de la personne dans une nouvelle fenêtre : Modale ?
- [ ] client : contact de l'organisateur (l'orga n'est pas le créateur donc il faut pouvoir le contacter directement)
- [ ] client : pouvoir y aller à plusieurs : Quand on clique sur "Participer" => modale qui propose le nombre de places demandées.
- "bring a friend" ? proposer aux gens de saisir les e-mails des copains qui viennent et inciter ces derniers à s'inscrire ?
Participation :
- [x] demande de connexion ou d'inscription si nécessaire
- [x] requêtes AJAX ?
- [ ] Sécuriser la requête AJAX ? (id membre pourrait être récupéré dans la $_SESSION) --> Guillaume cf. Aurélien
- [x] Ajout d'images par défaut PAR catégorie


Création d'event :
- [x] insertion dans la base et vérif champs -- Tristan
- [x] photo
- [x] photo par défaut dépendante du type (gerée dans la page d'affichage)
- [x] choix dans le formulaire :
	[x] je suis l'orga
	[x] je ne suis pas l'orga --> lien vers le site de l'orga, contacts etc.


Modif event -- Tristan
- [x] vérifier qu'on est connecté et organisateur de l'event qu'on cherche à modifier
- [x] Ajout et supprimer de créateurs supplémentaires
- [x] penser à l'action supprimer
- [x] client : informations de contact de l'organisateur
- [x] ajout de photos supplémentaires (pas uniquement la photo principale)

## Back-office ##


- [x] sécurité : auth admin
- [x] slogan et subslogan accueil
- [x] édition FAQ
- [x] édition CGV
- [x] édition Mentions Légales
- [x] image de fond bigform accueil
- [x] bouton retour au site
- [ ] fac : choix couleur splash
- [ ] types d'events --> photos par défaut pour chaque type

Recherche :
events :
- [x] formulaire : esthétique des critères (cases à cocher)
- [x] formulaire : cases de critères bug si on décoche tous les critères
- [x] recherche par date : implémenter ou enlever de la recherche bigform accueil
- [ ] liste : gérer les privilèges (admin/modo = TOUS !)
- [x] implémentation filtrage par date -- Aurélien
- [x] question : âges ?
- [ ] mettre en valeur le statut de participation
- [ ] ne pas afficher résultats si pas de Recherche faite
membres :
- [ ] FACULATIF : Recherche de membre avec auto-complétion

Header / Footer
- [x] header : zones actives full height
- [x] liens footer pas tous actifs

Forum : --> Audrey
- [x] affichage des catégories
- [x] nouveau message
- [x] nouveau sujet
- [x] gestion privilèges sur modifier, supprimer message, seulement les miens sauf si modérateur ou admin

FAQ / Aide / Doc
- [x] FAQ --> Aurélien ? BBD Question : Réponse + modification possible dans le Back office
- [ ] Aide : Formulaire de Contact
- [x] A propos

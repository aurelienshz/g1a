<?php
// modele/events/suggestions.php
// entrée : rien
// sortie : plusieurs suggestions relatives à l'utilisateur

//Suggestions : 
//- Proximité classé par le plus proche
//- Types Favoris puis par chronologie.
//- Bientot (dans un radius de TANT.)
//- 





function suggestions() {

$result = [
    'natureSuggestion' => 'Une idée...' ,
    'titreSuggestion' => 'Pique-nique au lac',
    'dateSuggestion' => 'Demain',
    'typeSuggestion' => 'Pique-nique',
    'lieuSuggestion' => 'Paris',
    'descriptionSuggestion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
];
return $result;

 }

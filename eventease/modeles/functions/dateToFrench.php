<?php
function dateToFrench($stringDate) {
    $date = explode('-', $stringDate);

    // Transformatione en nombres entiers des éléments texte de la chaîne :
    foreach ($date as $key => $value) {
        $date[$key] = intval($value);
    }

    // Noms en français :
    $months = [1=>'Janvier',2=>'Février',3=>'Mars',4=>'Avril',5=>'Mai',6=>'Juin',7=>'Juillet',8=>'Août',9=>'Septembre',10=>'Octobre',11=>'Novembre',12=>'Décembre'];
    $days = ['Dimanche','Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];

    // Numéro du jour de la semaine :
    $w = date('w',strtotime($stringDate));

    // Génération de la chaine :
    $str = $days[$w].' '.$date[2].' '.$months[$date[1]].' '.$date[0];
    return $str;
}

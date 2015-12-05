<?php

// Grains de sel :
$salt = ['Pi9DVwpBV6',  //  NE SURTOUT PAS CHANGER  //
         'qHVfvczw9m',  //  CES VALEURS SOUS PEINE  //
         '7h2WSdyWIM']; //  DE TOUT CASSER.         //

function generateToken($email, $username) {
    global $salt;
    $salted = $salt[0].$username.$salt[1].$email.$salt[2];
    return md5($salted);
}

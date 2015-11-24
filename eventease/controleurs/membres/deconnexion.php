<?php

$redir = ['accueil'];

session_destroy();
session_start();
$_SESSION['connected'] = False;
header('Location: '.getLink($redir));
exit();

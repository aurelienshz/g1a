<?php


session_destroy();
session_start();
$_SESSION['connected'] = False;
header('Location: index.php');
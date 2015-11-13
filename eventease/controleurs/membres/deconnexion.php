<?php

$redir = $_SESSION['previousPage'];
session_destroy();
session_start();
$_SESSION['connected'] = False;
header('Location: '.getLink($redir));

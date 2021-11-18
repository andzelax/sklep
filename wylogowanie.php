<?php
require_once 'database.php'; 
//error_reporting(E_ALL ^ E_NOTICE);
    session_start();

    unset($_SESSION['user']);
    session_destroy();
    echo'Wylogowano';
    header('Location: logowanie.php');
?>
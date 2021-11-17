<?php
require_once 'database.php'; 
session_start();
    unset($_SESSION['user']);
    session_destroy();
    echo'Wylogowano';
    header('Location: logowanie.php');
?>
<?php
require_once 'database.php';
session_start();
if(isset($_POST['id'])){
    $id = $_POST['id'];
    unset($_SESSION['koszyk'][$id]);
    echo '<meta http-equiv="refresh" content="1;url=./koszyk.php">';
}
?>
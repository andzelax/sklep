<?php
require_once 'database.php';
if(isset($_POST['delete'])){
    $id=$_POST['delete'];
    
$stmtt = $pdo->prepare("DELETE FROM uzytkownicy WHERE id_uzytkownika='$id'");
$stmtt->execute();

$pdo=null; 
echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=uzytkownicy">';
}
?>
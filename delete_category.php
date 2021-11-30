<?php
require_once 'database.php';
if(isset($_POST['delete'])){
    $id=$_POST['delete'];
$stmt = $pdo->prepare("DELETE FROM kategorie WHERE id_kat='$id'");
$stmt->execute();
$pdo=null; 
echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=kategorie">';
}
?>
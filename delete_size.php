<?php
require_once 'database.php';
if(isset($_POST['delete'])){
    $id=$_POST['delete'];
$stmt = $pdo->prepare("DELETE FROM rozmiary WHERE id_rozmiar='$id'");
$stmt->execute();
$pdo=null; 
echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=rozmiary">';
}
?>
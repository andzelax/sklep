<?php
require_once 'database.php';
if(isset($_POST['delete'])){
    $id=$_POST['delete'];
$stmt = $pdo->prepare("DELETE FROM zamowione_produkty WHERE id_zamowienia='$id'");
$stmt->execute();
$stmtt = $pdo->prepare("DELETE FROM zamowienia WHERE id_zamowienia='$id'");
$stmtt->execute();

$pdo=null; 
echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=zamowienia">';
}
?>
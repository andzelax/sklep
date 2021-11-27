<?php
require_once 'database.php';
if(isset($_POST['delete'])){
    $id=$_POST['delete'];

    $quer1=$pdo->query('select zdjecie from galeria where id_produktu ='.$id);
    $count = $quer1->rowCount();
     if($count>0){
         while($count=$quer1->fetch(\PDO::FETCH_ASSOC)){
            
if(unlink($file_path=$count['zdjecie']))
{
$zdj = $pdo->prepare("DELETE FROM galeria WHERE id_produktu='$id'");
$zdj->execute();    
}}
     }
$quer=$pdo->query('select zdjecie from produkty where id_prod ='.$id);
$file = $quer->fetch();
$file_path =  $file['zdjecie'];
 if(unlink($file_path))
 {
$stmt = $pdo->prepare("DELETE FROM produkty WHERE id_prod='$id'");
$stmt->execute();
 }

$pdo=null;
echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=produkty">';
}
?>
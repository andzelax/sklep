<?php
require_once "database.php";
$category_id = $_POST["category_id"];
$result = $pdo->query("SELECT * FROM kategorie where id_nadrz = $category_id");

while($row =  $result->fetch(PDO::FETCH_BOTH))
                {
                    if($row['id_kat']==$_POST['category_id'])
                    echo'<option selected="selected" value='.$row['id_kat'].'>'.$row['kategoria'].'</option>';
                    else
                    echo'<option value='.$row['id_kat'].'>'.$row['kategoria'].'</option>';

                }
$result->closeCursor();



?>
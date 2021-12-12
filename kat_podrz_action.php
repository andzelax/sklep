<?php
require_once "database.php";
$category_id = $_POST["category_id"];
$result = $pdo->query("SELECT * FROM kategorie where id_nadrz = $category_id");

while($row =  $result->fetch(PDO::FETCH_BOTH))
                {
                    
                    echo'<option value='.$row['id_kat'].'>'.$row['kategoria'].'</option>';

                }
$result->closeCursor();



?>
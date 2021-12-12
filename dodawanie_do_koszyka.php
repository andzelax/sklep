<?php
require_once 'database.php';
session_start();
if(isset($_POST['rozmiar'])){
$id=$_POST['rozmiar'];
$stmt = $pdo->prepare("SELECT * from rozmiary WHERE id_rozmiar=" . $id);
$stmt->execute();
$resultt = $stmt->fetch(\PDO::FETCH_ASSOC);
$id_prod = $resultt['id_prod'];
$rozmiar = $resultt['rozmiar'];
$stmt = $pdo->prepare("SELECT * FROM produkty WHERE id_prod =" . $id_prod);
$stmt->execute();
$result = $stmt->fetch(\PDO::FETCH_ASSOC);
$name = $result['nazwa'];
$price = $result['cena'];
$zdjecie = $result['zdjecie'];
$_SESSION['koszyk'][$id] = [
    'nazwa' => $name,
    'cena' => $price,
    'zdjecie' => $zdjecie,
    'rozmiar' => $rozmiar,
    'ilosc' => 1
];
echo '<meta http-equiv="refresh" content="1;url=./koszyk.php">';
}
else echo'<div class="text-center">
<h2>Brak rozmiaru</h2>
</div>';
?>
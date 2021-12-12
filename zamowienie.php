<?php
require_once 'database.php';
session_start();
$total=0;
if(isset($_POST['zamow'])){
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $miasto = $_POST['miasto'];
    $poczta = $_POST['poczta'];
    $adres = $_POST['adres'];
    $nr_telefonu = $_POST['nr_telefonu'];
    $email = $_POST['email'];

    

    if(isset($_SESSION['user'])){
        $uzyt = $pdo->query('select id_uzytkownika from uzytkownicy where email="'.$_SESSION['user'].'"');
        $uzytkownik = $uzyt->fetch(PDO::FETCH_ASSOC);
        $id=$uzytkownik['id_uzytkownika'];
        $insetr = $pdo->prepare('insert into zamowienia(id_uzytkownika,imie,nazwisko, miasto, adres,poczta, nr_telefonu, email, suma) VALUES 
        (?,?,?,?,?,?,?,?,?)');
        $insetr->execute([$id,$imie,$nazwisko, $miasto, $adres,$poczta, $nr_telefonu, $email, 0]);
    }else{
        $insetr = $pdo->prepare('insert into zamowienia(imie,nazwisko, miasto, adres,poczta, nr_telefonu, email, suma) VALUES 
        (?,?,?,?,?,?,?,?)');
        $insetr->execute([$imie,$nazwisko, $miasto, $adres,$poczta, $nr_telefonu, $email, 0]);
    }
    $id_zam = $pdo->lastInsertId();

    if (isset($imie) && isset($nazwisko)&& isset($nazwisko)&& isset($miasto)&& isset($adres)&& isset($nr_telefonu)&& isset($email)&& isset($poczta)){
        foreach($_SESSION['koszyk'] as $id => $produkt){
            $cena = $produkt['cena'];
            $ilosc=$produkt['ilosc'];
            $total += $produkt['ilosc']*$produkt['cena'];
            $zdjecie=$produkt['zdjecie'];
            $nazwa=$produkt['nazwa'];
            $rozmiar=$produkt['rozmiar'];
            // $roz=$pdo->query('select id_rozmiar from rozmiary where rozmiar="'.$rozmiar.'" and id_prod='.$id);
            // $rozm=$roz->fetch();
            // $wynik = $rozm['id_rozmiar'];
            $wprowadz=$pdo->prepare('insert into zamowione_produkty (id_rozmiaru,id_zamowienia,cena,ilosc,zdjecie,nazwa) values(?,?,?,?,?,?)');
            $wprowadz->execute([$id,$id_zam,$cena,$ilosc,$zdjecie,$nazwa]);
        }
        $update=$pdo->prepare('update zamowienia set suma = '.$total.' where id_zamowienia = '.$id_zam);
        $update->execute();
        $_SESSION['koszyk']=null;
    }
echo'Dziękujemy za zamówienie';
echo '<meta http-equiv="refresh" content="0;url=./index.php">';
}

?>
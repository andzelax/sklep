<?php
require_once 'database.php';
include 'navbar.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo2.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/logo2.png" type="image/x-icon"/>

    <title>QUALITY</title>
  </head>
  <body> 
  <main>
        <div id="container" style="overflow: hidden;" >
        <div class="row" style="padding-left: 25px;">
              <div class="row">
                <div class="d-flex justify-content-center">
                <div class="row">
                  <div class="col-lg-12">
                  <table class="table">
                    <thead>
                    <tr>
                        <th>Data</th>
                        <th>Nazwa</th>
                        <th>Cena</th>
                        <th>Ilość</th>
                        <th>Rozmiar</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                      $uzyt = $pdo->query('select id_uzytkownika from uzytkownicy where email="'.$_SESSION['user'].'"');
                      $uzytkownik = $uzyt->fetch(PDO::FETCH_ASSOC);
                      $id=$uzytkownik['id_uzytkownika'];

                            $quer=$pdo->query('select * from zamowienia where id_uzytkownika = '.$id);
                            $que=$quer->fetchAll();
                        foreach ($que as $row):
                            $wys=$pdo->query('select * from zamowione_produkty where id_zamowienia='.$row['id_zamowienia']);
                            $wyswietl = $wys->fetchAll();
                            
                            foreach($wyswietl as $rek){
                                print("<tr><td>");
                        echo $row["data_zamowienia"];
                        print("</td><td>");
                                echo $rek['nazwa'];
                                print("</td><td>");
                                echo $rek['cena'];
                                print("</td><td>");
                                echo $rek['ilosc'];
                                print("</td><td>");
                                if($rek['id_rozmiaru']){
$roz=$pdo->query('select * from rozmiary where id_rozmiar='.$rek['id_rozmiaru']);
                                $rozmiar = $roz->fetchAll();
                                foreach($rozmiar as $r){
                                    echo $r['rozmiar'];
                                }
                                }
                                
                                print("</td></tr>");
                            }
                                                    
                        endforeach; 
                      ?>
                    </tbody>
                  </table>
                  </div>
                </div>
                </div>
              </div>
        </div>
        </div>
  </main>
  <footer>
<?php include 'footer.php';?>
</footer>
  </body>
</html>
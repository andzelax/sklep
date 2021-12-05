<?php
require_once 'database.php';
include 'navbar.php';
$id = $_GET['product'];
$stmt = $pdo->prepare("SELECT * from produkty WHERE id_prod=" . $id);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
$rozmiar = $pdo->prepare('select * from rozmiary where id_prod='. $id);
$rozmiar->execute();
$rozm=$rozmiar->fetchAll(\PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
  <head>
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
            <div class="row">
              <div class="col-lg-12" >
                <div class="clearfix">
                <div>
                <div class="col-md-5" style="float: right;">
                    <div class="row" id="high-img">
                        <?php
                            foreach($result as $zdjecie){
                       echo '<img src="'.  $zdjecie['zdjecie'].' " id="show" style="width: 65%; margin: auto;" alt="...">';
                            }

                    ?></div>
                    <div class="row" id="gallery" style="float: right; display: flex;
                    justify-content: center;
                    align-items: center;">
                    <?php
                        foreach($result as $zdjecie){
                            echo '<img src="'.  $zdjecie['zdjecie'].' " class="min" style="width: 25%; float: right; margin-bottom:5px;" alt="...">';
                                 }
                        $zdjecia = $pdo->query('select * from galeria where id_produktu='.$id);
                        $zdj = $zdjecia->fetchAll();
                        foreach($zdj as $galeria){
                            echo '<img src="'.$galeria['zdjecie'].'" class="min" style="width: 25%; float: right; margin-bottom:5px;"  alt="...">';
                        }
                        $zdjecia->closeCursor();
                    ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                  <h1 class="mb-3"><?php
                  foreach($result as $nazwa){
                     echo $nazwa['nazwa']; 
                  }?> 
                  </h1>
                  <p class="mb-3">
                  <?php
                  foreach($result as $cena){
                     echo ' '.$cena['cena'].' PLN'; 
                  }?> 
                  </p>
                  <div class="row">
                    <label class="text-center">Wybierz rozmiar</label>
                    </div>
                    <form method="POST" action="dodawanie_do_koszyka.php">
                    <div class="d-grid gap-1 d-flex justify-content-center">
                        <input type="hidden" name="rozmiar" value="" id="rozmiar" disabled>
                        <?php
                        foreach($rozm as $row){
                        echo'
                    <button name="rozmiar" onclick=wybierzRozmiar('. $row['id_rozmiar'] .') type="button" class="btn-light rounded-circle"  role="checkbox">'. $row['rozmiar'].'</button>
                  ';}
                  ?></div>
                  <div class="d-grid d-flex justify-content-center" >

                  <button type="submit" class="btn btn-dark">Dodaj do koszyka</button>
                  </div>
                 </form>
                  <p class="mb-3">
                      Opis <br/><br/>
                  <?php
                  foreach($result as $opis){
                     echo ' '.$opis['opis'].''; 
                  }?> 
                  </p>

                </div>
              </div>
            </div>
        </div>

  <footer>
<?php include 'footer.php';?>
</footer>
<script>
    $(document).ready(function(){
        $('#gallery img').on({

            mouseover: function(){
                $(this).css({
                    'cursor':'pointer',
                });
            },
            
            mouseout: function(){
                $(this).css({
                    'cursor':'default',
                });
            },
           
            click: function(){
                var min = $(this).attr('src');
                $('#show').fadeOut(300, function (){
                    $(this).attr('src',min);
                }).fadeIn(500);
            },
        });
    });

    function wybierzRozmiar(id){
        let input = document.getElementById('rozmiar');
        input.value = id;
        input.disabled = false;
        console.log(input.value);
    }
</script>
</body>
</html>
<?php
require_once 'database.php';
include 'navbar.php';
$id = $_GET['id_kat'];
$stmt = $pdo->prepare("SELECT * from kategorie WHERE id_nadrz=" . $id);
$stmt->execute();
$result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
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
        <form method="post" action="wyswietlane_produkty.php">
            <div class="row">
              <div class="col-lg-3 btn-group-vertical btn-group-dark d-flex align-self-start">
                <div class="btn nav flex-column nav-pills m-2" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <div class="list-group">
                    <?php
                        
                           foreach($result as $rekord)
                           {
                            echo ' <a href="wyswietlane_produkty.php?id_kat='.$id.'&page='.$rekord['id_kat'].'" class="list-group-item list-group-item-action">'.$rekord['kategoria'].'</a>';       
                           }
                        
                          
                    ?>
                </div> 
                </div>
              </div>
              <div class="col-lg-3">

              </div>
              <div class="col-lg-9 col-md-12 tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-kurtki" role="tabpanel">
                    <?php
                    if(isset($_GET['page'])){
                    $k=$_GET['page'];
                    echo'<div class="row">';
                    $produkt=$pdo->query('select * from produkty where kategoria='.$k);
                    $prod=$produkt->fetchAll();
                    foreach($prod as $row){
                      echo'<div class="col-lg-4"><figure class="figure">';
                      echo'<a href="produkt.php?product='.$row['id_prod'].'" ><img src="'.$row['zdjecie'].'" class="d-block w-100 figure-img img-fluid rounded" alt="..."></a>';
                      echo'<figcaption class="figure-caption text-center">A caption for the above image.</figcaption>';
                      echo'</figure></div>';
                    }
                    echo'</div>';
                    $produkt->closeCursor();}
                    else
                    {
                      $all = [];
                      foreach($result as $res){
                    $wszystkie=$pdo->query('select * from produkty where kategoria='.$res['id_kat']);
                    $wszys=$wszystkie->fetchAll();
                    $all = array_merge($all, $wszys);
                      }
                    echo'<div class="row">';
                    foreach($all as $roww){
                      echo'<div class="col-lg-4"><figure class="figure">';
                      echo'<a href="produkt.php?product='.$roww['id_prod'].'" ><img src="'.$roww['zdjecie'].'" class="d-block w-100 figure-img img-fluid rounded" alt="..."></a>';
                      echo'<figcaption class="figure-caption text-center">A caption for the above image.</figcaption>';
                      echo'</figure></div>';
                    }
                    echo'</div>';
                    $wszystkie->closeCursor();
                    

                    
                  }
                    $stmt->closeCursor();
                   
                  ?>
                  
                  </div>

              </div>

                </div></form>
        </div>
        
            </main>

  <footer>
<?php include 'footer.php';?>
</footer>
<script>
  if('<?php echo isset($_GET['id_kat']) ?>' == 3)
    $('.nav-<?php echo $_GET['page'] ?>').addClass('active')
</script>
</body>
</html>
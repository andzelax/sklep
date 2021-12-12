<?php
require_once 'database.php';
include 'navbar.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">	
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	    <link rel="icon" href="img/logo2.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/logo2.png" type="image/x-icon"/>

    <title>QUALITY</title>
  </head>
  <body>
<main>
<div id="container" style="overflow: hidden;" >

            <div class="row">
              <div class="row d-flex justify-content-center">
                <div class="row">
                <?php if(!isset($_SESSION['koszyk'])) {
                  echo'<div class="text-center">
                  <h2>Brak produktów w koszyku</h2>
                  </div>';
                }else{
                  $total=0;
                    ?>
                <?php foreach ($_SESSION['koszyk'] as $id => $produkt): ?>
                <div class="col-lg-8" style="padding-left: 40px;">
                    <div class="form card card-body  form-floating"  >
                    <div class="row">
                        <form method="POST" action="usuwanie_z_koszyka.php">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="col-lg-1">
              <button type="submit" class="bg-white me-2" style="color: black; border: none; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </button>
            </div>   </form>
                  <div class="col-lg-4" style="padding-left: 10px;"><?php echo'
                      <a href="produkt.php?product= '. $id.'">
                        <div class="row">
                        <img src="'.$produkt['zdjecie'] .'" alt="..." >
                      </div>
                    </a>';?>
                  </div>
                  <div class="col-lg-7">
                    <div class="row">
                    <p><?php
                                echo $produkt['nazwa'];
                            ?><br><br><?php
                            echo $produkt['cena'];
                        ?> PLN</p>
                    <div class="col">
                      <div class="row" style="padding-left: 15px;">
                      <div class="col-sm-4">
                      <table>
                            <td>
                              Rozmiar
                            </td>
                            <td>
                            <?php
                                echo ': '.$produkt['rozmiar'];
                            ?>
                            </td>
                        </tr>
                        <tr>
                          <td>
                            Cena:
                          </td>
                          <td>
                            <?php
                                echo $produkt['cena'];
                            ?>
                          </td>
                        </tr>
                        <tr >
                          <td >
                            Ilość:
                          </td>
                          <td>
                            <form  action="usuwanie_z_koszyka.php" method="post">
                              <input type="number" min="1" value="<?= $produkt['ilosc'] ?>" name="ilosc" class="form-control bg-light btn-dark" style="color: black;" id="count" >
                               
                              <button type="submit" name="zapisz" value="<?php echo $id; ?>" class="btn btn-dark mt-2">Zapisz</button>
                            </form>
                          </td>
                        </tr>
                      </table>
                    </div>
                    </div>
                    </div>
                    </div>
                  </div>
                  
                    </div>
                  </div>
                </div>
                <?php 
              $total += $produkt['ilosc']*$produkt['cena'];
              endforeach; ?>
              <div class="col-lg-4 align-self-center" style=" padding-left: 40px;">
                    <div class="form card card-body form-floating" >
                      <div class="row">
                        <div class="col"><h6 class="text-center">Podsumowanie</h6></div>
                      </div>
                      <div class="row">
                          <table class="me-3">
                          <tr>
                            <th>
                              Wartość zamówienia
                            </th>
                            <td style="float:right">
                             <?php

                             ?>
                            </td>
                          </tr>
                          <tr>
                            <th>
                              Dostawa
                            </th>
                            <td style="float:right">
                              9,99 PLN
                            </td>
                          </tr>
                            <tr class="border-top" >
                              <th>
                                Suma
                              </th>
                              <td style="float:right">
                              <?php
                              $total+=9.99;
                              ?>
                                <?= $total ?> PLN
                              </td>
                            </tr>
                        </table>
                      </div>
                      <div class="row">
                        
                        <a href="formularz.php" class="btn btn-dark ">
                          Złóż zamówienie
                        </a>
                      </div>
                    </div>
                    
            </div>
                <?php
                }
                ?>
                </div> 
              </div>
            </div>
</div>

</main>

  <footer>
<?php include 'footer.php';?>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
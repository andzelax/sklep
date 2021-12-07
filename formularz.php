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
            <div class="row" style="padding-left: 25px;">
              <div class="row">
              <form action="zamowienie.php" method="POST">
                <div class="col-lg-12 d-flex justify-content-center">
                  <div class="col-md-4">
                    <div class="row mb-3 ">
                      <input type="text" class="btn-dark bg-white form-control" name="imie">
                      <label class="mb-3" >Imię</label>
                      <input type="text" class="btn-dark bg-white form-control" name="nazwisko">
                      <label class="mb-3" >Nazwisko</label>
                      <input type="text" class="btn-dark bg-white form-control" name="miasto">
                      <label class="mb-3" >Miasto</label>
                      <input type="text" class="btn-dark bg-white form-control" name="poczta">
                      <label class="mb-3" >Poczta</label>
                      <input type="text"  class="btn-dark bg-white form-control" name="adres">
                      <label class="mb-3" >Adres</label>
                      <input type="text" pattern="^[0-9\-\+]{9}$" class=" btn-dark bg-white form-control" name="nr_telefonu">
                      <label class="mb-3" >Numer telefonu</label>
                      <input type="email" class="btn-dark bg-white form-control" name="email">
                      <label class="mb-3" >Email</label>
                      <select class="form-select mb-3 btn-dark bg-white form-control" name="id_platnosci">
                        <option selected>Płatność przy odbiorze</option>
                        <option  value="1">Visa</option>
                        <option value="2">Mastercard</option>
                        <option value="3">PayU</option>
                        <option value="4">BLIK</option>
                      </select>
                      <div class="col">
                      <button type="submit" name="zamow" class="btn btn-dark">Złóż zamówienie</button>
                      </div>
                    </div>  
                  </div>
                </div>
              </form>
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
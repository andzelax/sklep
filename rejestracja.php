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
                <div class="col-lg-12 d-flex justify-content-center">
                <div class="row">
                  <div class="col-lg-12">
            <div class="form card card-body  form-floating"  >
              <div class="row">
                <div class="row">
                <h5 class="col-md-12 text-center form-floating mb-3">Rejestracja</h5>
                </div>
                <div class="mb">
                  <form class="col-12 d-flex form-floating">
                  <input type="email" class="form-control me-2 bg-white btn-dark " style="color: black;" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Podaj email</label>
                  </form>
                </div>
                </div>
                <div class="row">
                  <div class="mb-2">
                    <form class="col-12 d-flex form-floating">
                      <input type="password" class="form-control me-2 bg-white btn-dark" style="color: black;" placeholder="Password">
                     <label>Utwórz hasło</label>
                     </form>
                   </div>
                </div>
                
                <div class="row">
                  <div class="mb-2">
                    <form class="col-12 d-flex form-floating">
                     <input type="password" class="form-control me-2 bg-white btn-dark" style="color: black;" placeholder="Password">
                     <label>Powtórz hasło</label>
                     </form>
                   </div>
                </div>
                <div class="row">
                  <button type="submit" class="btn btn-dark">Potwierdź</button>
                </div>
            </div>
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

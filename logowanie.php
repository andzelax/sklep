<?php
require_once 'database.php';
include 'navbar.php';
session_start();
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
                    <?php if(empty($_SESSION['user'])) {
                    echo'
                    <form method="POST" action="zalogowanie.php">
                    <div class="form card card-body mb-2 "  >
              <div class="row">
                <div class="row">
                <h5 class="col-md-12 form-floating mb-3 text-center">Zaloguj się</h5>
                </div>
                <div class="mb" >
                  <div class="col-12 d-flex form-floating">
                  <input required name="email"  type="email" class="form-control me-2 bg-white btn-dark" style="color: black;" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Email</label>
                  </div>
                </div>
                </div>
                <div class="row">
                <div class="mb-2">
                 <div class="col-12 d-flex form-floating">
                  <input required name="passw" type="password" class="form-control me-2 bg-white btn-dark" style="color: black;" id="floatingPassword" placeholder="Password">
                  <label for="floatingPassword">Hasło</label>
                  </div>
                </div>
                </div>
                <div class="row">
                  <button name="submit" type="submit" class="btn btn-dark">Zaloguj</button>
                </div>
            </div> 
            </form><div class="text-center col-lg-12">Nie masz jeszcze konta? <a class="text-center" style="color:black;" href="rejestracja.php">Załóż</a>
            </div>
                    ';
                    
                  }
                     else {echo' <p>Zalogowano jako '.$_SESSION['user'].'</p>';
                      echo '<a class="btn btn-dark" href="wylogowanie.php" name="logout" role="button">Wyloguj</a>';
                      
                      }
                      
                      ?>
            
            
                  </div>
                </div>
            </div>
          </div>
        </div></div>
          </main>
          <footer>
<?php include 'footer.php';?>
</footer>
</body>
</html>
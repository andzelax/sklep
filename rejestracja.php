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
    <?php
      if(isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['haslo1']) && isset($_POST['haslo2'])){
        $email = $_POST['email'];
        $dod = $pdo->prepare('select email from uzytkownicy where email=:email');
        $dod->bindValue(':email',$_POST['email']);
        $spr=$dod->fetch();
        if($spr==null){
          $haslo1 =$_POST['haslo1'];
          $haslo2 =$_POST['haslo2'];
          if($haslo1!=$haslo2){
            echo'Hasła nie są takie same';
          }else{
            $hash=password_hash($haslo2,PASSWORD_DEFAULT);
            $dodawanie=$pdo->prepare('insert into uzytkownicy (email,haslo) values (?,?)');
            $dodawanie->execute([$email,$hash]);
            $_SESSION['user']=$_POST['email'];
              
            echo '<meta http-equiv="refresh" content="1;url=./index.php">';
          }
        }
      }
    ?>
  <main>
        <div id="container" style="overflow: hidden;" >
            <div class="row" style="padding-left: 25px;">
              <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                <div class="row">
                  <div class="col-lg-12">
                  <?php if(empty($_SESSION['user'])) {
                    echo'
                    <form method="POST" action="rejestracja.php">
            <div class="form card card-body  form-floating"  >
              <div class="row">
                <div class="row">
                <h5 class="col-md-12 text-center form-floating mb-3">Rejestracja</h5>
                </div>
                <div class="mb">
                  <div class="col-12 d-flex form-floating">
                  <input required name="email"  type="email" class="form-control me-2 bg-white btn-dark" style="color: black;" id="floatingInput" placeholder="name@example.com">
                  <label for="floatingInput">Podaj email</label>
                  </div>
                </div>
                </div>
                <div class="row">
                  <div class="mb-2">
                    <div class="col-12 d-flex form-floating">
                      <input name="haslo1" type="password" class="form-control me-2 bg-white btn-dark" style="color: black;" placeholder="Password">
                     <label>Utwórz hasło</label>
                     </div>
                   </div>
                </div>
                
                <div class="row">
                  <div class="mb-2">
                    <div class="col-12 d-flex form-floating">
                     <input name="haslo2" type="password" class="form-control me-2 bg-white btn-dark" style="color: black;" placeholder="Password">
                     <label>Powtórz hasło</label>
                     </div>
                   </div>
                </div>
                <div class="row">
                  <button type="submit" name="submit" class="btn btn-dark">Potwierdź</button>
                </div>
            </div>
            </form>
            ';
          }
            ?>
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
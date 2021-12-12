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
<?php
if(isset($_POST['submit']) && $_POST['email']!='' && $_POST['passw']) {
                
  $stmt = $pdo->prepare('SELECT * FROM uzytkownicy WHERE email = :email');
  
  $stmt->bindValue(':email',$_POST['email']);
  $stmt->execute();


  if($stmt->rowCount() == 0){
    $_SESSION['error'] = 'Nie ma takiego uzytkownika'; 
  }
  else{
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if(password_verify($_POST['passw'], $user['haslo'])){
      $_SESSION['user']=$_POST['email'];
      $_SESSION['admin']=$user['rola'];
      $_SESSION['id_uzytkownika']=$user['id_uzytkownika'];
  echo '<meta http-equiv="refresh" content="1;url=./index.php">';
    }else{
      $_SESSION['error'] = 'Złe hasło';
    }
    
  }
  
    //
  
  
}
?>

<main>
        <div id="container" style="overflow: hidden;" >
        <?php 
            if (isset($_SESSION['error'])):
          ?>
          <div class="alert alert-danger">
              <?= $_SESSION['error'] ?>
          </div>
          <?php endif;
          unset($_SESSION['error']);
          ?>
            <div class="row" style="padding-left: 25px;">
              <div class="row">
                <div class="d-flex justify-content-center">
                <div class="row">
                  <div class="col-lg-12">
                    <?php if(empty($_SESSION['user'])) {
                    echo'
                    <form method="POST" action="logowanie.php">
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
                     else {
                      echo' <div class="text-center"><p>Zalogowano jako '.$_SESSION['user'].'</p>';
                       echo '<a class="btn btn-dark" href="wylogowanie.php" name="logout" role="button">Wyloguj</a><br/><br/>';
                      
                      echo '<a class="btn btn-dark" href="historia.php" name="historia" role="button">Zobacz historie</a><br/><br/>';
                      echo '<a class="btn btn-dark" href="add_user.php" name="add_user" role="button">Uzupełnij dane</a><br/><br/></div>';
                      
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
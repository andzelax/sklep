<?php
include 'navbar.php';
require_once("database.php"); 
$uzyt = $pdo->query('select * from uzytkownicy where email="'.$_SESSION['user'].'"');
        $res = $uzyt->fetchAll();
        
        foreach($res as $result){
$id=$result['id_uzytkownika'];
        
?>
      <div id="container" style="overflow: hidden;" >
        <div class="row" style="padding-left: 25px;">
          <form action="add_user.php" method="post" id="manage-prod" enctype="multipart/form-data">
          <div class="row d-flex justify-content-center">
         <div class="col-md-8">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Dane</h5>
              </div>
              <div class="card-body">
                  <div class="row">
              <div class="col-md-4">
                      <div class="form-group">
                        <label for="imie">Imie</label>
                        <input type="text" id="imie" name="imie" class="form-control" value="<?php  if(isset($_POST['imie'])) echo $_POST['imie']; else echo $result['imie'];  ?>" >
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nazwisko">Nazwisko</label>
                        <input type="text" id="nazwisko" name="nazwisko" class="form-control" value="<?php if(isset($_POST['nazwisko'])) echo $_POST['nazwisko']; else echo $result['nazwisko'];  ?>">
                      </div>
                    </div>
              </div>
                    <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required name="email" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo $result['email'];  ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="nr_telefonu">Nr_telefonu</label>
                        <input type="number" id="nr_telefonu" name="nr_telefonu" class="form-control" value="<?php if(isset($_POST['nr_telefonu'])) echo $_POST['nr_telefonu']; else echo $result['nr_telefonu'];  ?>">
                      </div>
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="adres">Adres</label>
                        <input type="text" id="adres"  name="adres" class="form-control" value="<?php if(isset($_POST['adres'])) echo $_POST['adres']; else echo $result['adres'];  ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label for="miasto">Miasto</label>
                        <input type="text" id="miasto"  name="miasto" class="form-control" value="<?php if(isset($_POST['miasto'])) echo $_POST['miasto']; else echo $result['miasto'];  ?>">
                      </div>
                    </div>
              </div>
              <div class="row">
              <div class="col-md-4">
                      <div class="form-group">
                        <label for="kod_pocztowy">Kod pocztowy</label>
                        <input type="text" id="kod_pocztowy" name="kod_pocztowy" class="form-control" value="<?php if(isset($_POST['kod_pocztowy'])) echo $_POST['kod_pocztowy']; else echo $result['kod_pocztowy'];  ?>">
                      </div>
                    </div>
                    
              </div>
              
              </div>
              <?php 
        
              ?>
              <div class="card-footer">
                  <button type="submit" id="zapisz" type="submit" name="zapisz" class="btn btn-fill btn-dark">Zapisz</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>

     <script>

     </script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <?php
        
    

       
    if(isset($_POST['zapisz'])){
      
     $imie = $_POST['imie'];
     $nazwisko = $_POST['nazwisko'];
     $email = $_POST['email'];
     $nr_telefonu = $_POST['nr_telefonu'];
     $adres = $_POST['adres']; 
     $miasto = $_POST['miasto'];
     $kod_pocztowy = $_POST['kod_pocztowy'];
     $stmt = $pdo->prepare("update uzytkownicy set imie=?, nazwisko=?, email=?,nr_telefonu=?, adres=?, miasto=?, kod_pocztowy=? where id_uzytkownika=".$id);
     $stmt->execute([$imie, $nazwisko, $email,$nr_telefonu, $adres, $miasto, $kod_pocztowy]);
     $pdo=null;
        echo '<meta http-equiv="refresh" content="0;url=./add_user.php">';
    }
  }
      
  
    
?>

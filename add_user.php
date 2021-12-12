<?php

require_once("database.php");
?>
      <div class="content">
        <div class="container-fluid">
          <form action="#" method="post" id="manage-prod" enctype="multipart/form-data">
          <div class="row">
         <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Dane</h5>
              </div>
              <div class="card-body">
                  <div class="row">
              <div class="col-md-6">
                      <div class="form-group">
                        <label for="imie">Imie</label>
                        <input type="text" id="imie" required name="imie" class="form-control" value="<?php if(isset($_POST['imie'])) echo $_POST['imie']   ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nazwisko">Nazwisko</label>
                        <input type="text" id="nazwisko" required name="nazwisko" class="form-control" value="<?php if(isset($_POST['nazwisko'])) echo $_POST['nazwisko']  ?>">
                      </div>
                    </div>
              </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" required name="email" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email']  ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nr_telefonu">Nr_telefonu</label>
                        <input type="number" id="nr_telefonu" required name="nr_telefonu" class="form-control" value="<?php if(isset($_POST['nr_telefonu'])) echo $_POST['nr_telefonu']  ?>">
                      </div>
                    </div>
              </div>
              <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="adres">Adres</label>
                        <input type="text" id="adres" required name="adres" class="form-control" value="<?php if(isset($_POST['adres'])) echo $_POST['adres']  ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="miasto">Miasto</label>
                        <input type="text" id="miasto" required name="miasto" class="form-control" value="<?php if(isset($_POST['miasto'])) echo $_POST['miasto']  ?>">
                      </div>
                    </div>
              </div>
              <div class="row">
              <div class="col-md-6">
                      <div class="form-group">
                        <label for="kod_pocztowy">Kod pocztowy</label>
                        <input type="text" id="kod_pocztowy" required name="kod_pocztowy" class="form-control" value="<?php if(isset($_POST['kod_pocztowy'])) echo $_POST['kod_pocztowy']  ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="rola">Rola</label>
                        <input type="text" id="rola" name="rola" class="form-control" value="<?php if(isset($_POST['rola'])) echo $_POST['rola']?>">
                      </div>
                    </div>
              </div>
              
              </div>
              <div class="card-footer">
                  <button type="submit" id="zapisz" type="submit" name="zapisz" class="btn btn-fill btn-primary">Zapisz</button>
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
      
      $id=$_POST['zapisz'];
     $imie = $_POST['imie'];
     $nazwisko = $_POST['nazwisko'];
     $email = $_POST['email'];
     $haslo = $_POST['haslo'];
     $nr_telefonu = $_POST['nr_telefonu'];
     $adres = $_POST['adres']; 
     $miasto = $_POST['miasto'];
     $kod_pocztowy = $_POST['kod_pocztowy'];
     $rola = $_POST['rola'];                 
     $stmt = $pdo->prepare("insert into zamowienia (imie, nazwisko, email,haslo,nr_telefonu, adres, miasto, kod_pocztowy, rola)  values (?,?,?,?,?,?,?,?,?)");
     $stmt->execute([$imie, $nazwisko, $email,$haslo,$nr_telefonu, $adres, $miasto, $kod_pocztowy, $rola]);
     $pdo=null;
    
        echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=uzytkownicy">';
    }

      
  
    
?>

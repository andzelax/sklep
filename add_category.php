<?php
require_once("database.php");
?>
      <div class="content">
        <div class="container-fluid">
          <form action="add_category.php" method="post" id="manage-prod" enctype="multipart/form-data">
          <div class="row">
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Kategoria główna</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      
                      <div class="form-group">
                      <label for="id_nadrz" class="form-label">Kategoria: </label>
                      <input type="text" id="id_nadrz" name="id_nadrz" class="form-control" value="<?php if(isset($_POST['kategoria'])) echo $_POST['kategoria']   ?>">
</div>
                    </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" id="submit" name="submit" class="btn btn-fill btn-primary">Dodaj</button>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Kategoria</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      
                      <div class="form-group">
                      <label for="nadrz" class="form-label">Kategoria główna: </label>
                        <select id="nadrz" name="nadrz" class="form-select">
                                            <?php

                    $kat=$pdo->query ('select * from kategorie where id_nadrz is null');
                       foreach($kat as $rekord)
                       {
                         echo '<option value='.$rekord['id_kat'].'>'.$rekord['kategoria'].'</option>';
                                          
                       }
                   
$kat->closeCursor();
?>
   </select> 
</div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="kategoria" class="form-label">Kategoria podrzędna: </label>
                        <input type="text" id="kategoria" name="kategoria" class="form-control" value="<?php if(isset($_POST['kategoria'])) echo $_POST['kategoria']   ?>">

                      </div>
                    </div>
                     
                  
                 
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="dodaj" name="dodaj" required class="btn btn-fill btn-primary">Save Product</button>
              </div>
            </div>
          </div>
         </form>
          
        </div>
      </div>

     <script>
         


     </script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <?php
 
        if(isset($_POST['submit'])){
     $kategoria = $_POST['id_nadrz'];   
     $stmt = $pdo->prepare("INSERT into kategorie (kategoria) VALUES (?)");
     $stmt->execute([$kategoria]); 
     
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=kategorie">';
        }
        if(isset($_POST['dodaj'])){
          $glowna=$_POST['nadrz'];
          $kategoria = $_POST['kategoria'];   
          $stmt = $pdo->prepare("INSERT into kategorie (kategoria,id_nadrz) VALUES (?,?)");
          $stmt->execute([$kategoria,$glowna]); 
          $pdo=null; 
          echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=kategorie">';
             }
    ?>
 

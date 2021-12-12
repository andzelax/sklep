<?php
require_once("database.php");
?>
      <div class="content">
        <div class="container-fluid">
          <form action="add_product.php" method="post" id="manage-prod" enctype="multipart/form-data">
          <div class="row">
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Produkt</h5>
              </div>
              <div class="card-body">
              <div class="row">
              <div class="col-md-12">
                      <div class="form-group">
                        <label for="nazwa">Nazwa</label>
                        <input type="hidden"  name="id_prod" class="form-control" value="<?php if(isset($_POST['id_prod'])) echo $_POST['id_prod']  ?>">
                        <input type="text" id="nazwa" required name="nazwa" class="form-control" value="<?php if(isset($_POST['nazwa'])) echo $_POST['nazwa']   ?>">
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                    <div class="col-md-6">
                        <label for="zdjecie">Zdjęcie produktu</label>
                        <input type="file" name="zdjecie" <?php if(isset($_POST['zdjecie'])) echo $_POST['zdjecie'] ? 'required' : '' ?> class="btn btn-fill" id="zdjecie" onchange="displayImg(this,$(this))">
                      </div>
                      <div class="col-md-6">
                        <label for="zdjecie_dod">Dodatkowe zdjęcia</label>
                        <input type="file" name="zdjecie_dod[]" multiple <?php if(isset($_POST['zdjecie'])) echo $_POST['zdjecie']  ?> class="btn btn-fill" id="zdjecie_dod" onchange="displayImg(this,$(this))">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="opis">Opis</label>
                        <textarea rows="4" cols="80" id="opis" required name="opis" class="form-control"><?php if(isset($_POST['opis'])) echo $_POST['opis']?></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="cena">Cena</label>
                        <input min="0" id="cena" name="cena" required value="<?php if(isset($_POST['cena'])) echo $_POST['cena'] ?>" required class="form-control" >
                      </div>
                    </div>
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
                      <label for="id_nadrz" class="form-label">Kategoria główna: </label>
                        <select id="id_nadrz" name="id_nadrz" class="form-select">
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
        <select name="kategoria" id="kategoria" class="form-select" >
        <?php
 $nad=$pdo->query ('select * from kategorie where id_nadrz is null');
 $nadd = $nad->fetch();

$kat=$pdo->query ('select * from kategorie where id_nadrz = '.$nadd['id_kat']);
$katt = $kat->fetchAll();
   foreach($katt as $rekord)
   {
     echo '<option value='.$rekord['id_kat'].'>'.$rekord['kategoria'].'</option>';
                      
   }

$kat->closeCursor();
?>
        </select>
                      </div>
                    </div>
                     
                  
                 
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="dodaj" name="dodaj" required class="btn btn-fill btn-primary">Save Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>

     <script>
         
         $(document).ready(function() {
$('#id_nadrz').on('change', function() {
var category_id = this.value;
$.ajax({
url: "kat_podrz_action.php",
type: "POST",
data: {
    category_id: category_id
},
cache: false,
success: function(result){
$("#kategoria").html(result);
}
});
});
});

     </script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <?php
        function RandomString()
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randstring = '';
            for ($i = 0; $i < 32; $i++) {
                $randstring .= $characters[rand(0, strlen($characters))];
            }
            return $randstring;
        }


    if(isset($_POST['dodaj']) && $_FILES['zdjecie']){

      $picture_name=$_FILES['zdjecie']['name'];
      $picture_type=$_FILES['zdjecie']['type'];
      $picture_tmp_name=$_FILES['zdjecie']['tmp_name']; 
      $picture_size=$_FILES['zdjecie']['size'];
     
      $nazwa_zdj = "img/" . RandomString() . ".png";
      
      
              if(move_uploaded_file($picture_tmp_name, $nazwa_zdj)){
                  
                  echo 'Files has uploaded'; 
              }else{
                return 'niedziaa';
              }
      
           
        
      $id=$_POST['dodaj'];
     $nazwa = $_POST['nazwa'];
     $opis =  nl2br($_POST['opis']);
      $cena = $_POST['cena'];
      $id_kat = $_POST['kategoria'];
      $zdjecie = $nazwa_zdj;                      
     $stmt = $pdo->prepare("INSERT into produkty (nazwa, opis, cena,kategoria,zdjecie) VALUES (?, ?, ?,?,?)");
     $stmt->execute([$nazwa, $opis, $cena,$id_kat,$zdjecie]);
     if(isset($_FILES['zdjecie_dod'])){
       $sel=$pdo->prepare('select id_prod from produkty where nazwa=? and opis=? and cena=? and kategoria=? and zdjecie=?');
       $sel->execute([$nazwa,$opis,$cena,$id_kat,$zdjecie]);
       $row=$sel->fetch();
       $id_prod = $row['id_prod'];
        if(count($_FILES["zdjecie_dod"]["name"]) > 0){
        for($count=0; $count<count($_FILES["zdjecie_dod"]["name"]); $count++){
          $picture_name=$_FILES['zdjecie_dod']['name'][$count];
          $picture_type=$_FILES['zdjecie_dod']['type'][$count];
          $picture_tmp_name=$_FILES['zdjecie_dod']['tmp_name'][$count]; 
          $picture_size=$_FILES['zdjecie_dod']['size'][$count];
         
          $nazwa_zdj_dod = "img/" . RandomString() . ".png";
          if(move_uploaded_file($picture_tmp_name, $nazwa_zdj_dod)){
            $zdjecie_dod = $nazwa_zdj_dod;                      
            $stmt = $pdo->prepare("INSERT into galeria (zdjecie,id_produktu) VALUES (?,?)");
            $stmt->execute([$zdjecie_dod,$id_prod]);
           


        }
          }
        }
      }$pdo=null;
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=produkty">';
 }
?>
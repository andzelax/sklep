<?php
require_once("database.php");
$id = $_GET['id_prod'];
$stmt = $pdo->prepare("SELECT * from produkty WHERE id_prod=" . $id);
$stmt->execute();
$result = $stmt->fetch();
?>
      <div class="content">
        <div class="container-fluid">
          <form action="edit_product.php" method="post" id="manage-prod" enctype="multipart/form-data">
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
                        <input type="text" id="nazwa" required name="nazwa" class="form-control" value="<?php if(isset($_POST['nazwa'])) echo $_POST['nazwa']; else echo $result['nazwa'];  ?>">
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                    <div class="col-md-6">
                        
                        <label for="zdjecie">Zdjęcie produktu</label>
                        
                        <input type="file" name="zdjecie" <?php if(isset($_POST['zdjecie'])) echo $_POST['zdjecie']; else echo $result['zdjecie'];?> class="btn btn-fill" id="zdjecie" onchange="displayImg(this,$(this))">
                      <!-- Button trigger modal -->
<div style="margin-left:10em;"><button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Przeglądaj
</button>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php
                            echo '<img src="/'.$result["zdjecie"].'" width="100px" height="auto" />'.'<br><br>';
                        ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
                      </div>
                      <div class="col-md-6">
                      <?php
                        $zdj=$pdo->query('select * from galeria where id_produktu='.$id);
                        $pic = $zdj->fetchAll(\PDO::FETCH_ASSOC);
                        foreach($pic as $rekord){
                            echo '<img src="/'.$rekord["zdjecie"].'" width="100px" height="auto" />'.'<br><br>';
                         }
                         echo'  
                        <label for="zdjecie_dod">Dodatkowe zdjęcia</label>
                        <input type="file" name="zdjecie_dod[]" multiple';?> <?php if(empty($_POST['zdjecie'])) echo ""; elseif(isset($_POST['zdjecie'])){ echo $_POST['zdjecie'];} else echo $rekord['zdjecie']; ?> <?php echo 'class="btn btn-fill" id="zdjecie_dod" onchange="displayImg(this,$(this))">
                      </div> 
                      
                      
                      ';

                      $zdj->closeCursor();
                        ?>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="opis">Opis</label>
                        <textarea rows="4" cols="80" id="opis" required name="opis" class="form-control"><?php if(isset($_POST['opis'])) echo $_POST['opis']; else echo $result['opis'];?></textarea>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="cena">Cena</label>
                        <input type="text" id="cena" name="cena" required value="<?php if(isset($_POST['cena'])) echo $_POST['cena']; else echo $result['cena']; ?>" required class="form-control" >
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
 foreach($nad as $row)
 {
$kat=$pdo->query ('select * from kategorie where id_nadrz = '.$row['id_kat']);
   foreach($kat as $rekord)
   {
     echo '<option value='.$rekord['id_kat'].'>'.$rekord['kategoria'].'</option>';
                      
   }

$kat->closeCursor();
  }
  $nad->closeCursor();
?>
        </select>
                      </div>
                    </div>
                     
                  
                 
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="zapisz" name="zapisz" required class="btn btn-fill btn-primary">Save Product</button>
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
    

    if(isset($_POST['zapisz']) && $_FILES['zdjecie']){

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
     $opis = $_POST['opis'];
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
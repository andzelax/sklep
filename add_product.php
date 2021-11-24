<?php
require_once("database.php");
?>
<script>
    
</script>
      <div class="content">
        <div class="container-fluid">
          <form action="add_product.php" method="post" id="manage-prod">
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
                    <div class="col-md-4">
                      <div class="">
                        <label for="zdjecie">Zdjęcie produktu</label>
                        <input type="file" name="zdjecie" <?php if(isset($_POST['zdjecie'])) echo $_POST['zdjecie'] ? 'required' : '' ?> class="btn btn-fill" id="picture" onchange="displayImg(this,$(this))">
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
                        <input type="text" id="cena" name="cena" value="<?php if(isset($_POST['cena'])) echo $_POST['cena'] ?>" required class="form-control" >
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


       function displayImg(input,_this) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function (e) {
                _this.parent().parent().parent().find('.img-field').attr('src', e.target.result);
                  _this.siblings('label').html(input.files[0]['name'])
                  _this.siblings('input[name="fname"]').val('<?php echo strtotime(date('y-m-d H:i:s')) ?>_'+input.files[0]['name'])
                  var p = $('<p></p>')
                  
              }

              reader.readAsDataURL(input.files[0]);
          }
      }
     </script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <?php
    if(isset($_POST['dodaj'])){

      $picture_name=$_FILES['picture']['name'];
      $picture_type=$_FILES['picture']['type'];
      $picture_tmp_name=$_FILES['picture']['tmp_name'];
      $picture_size=$_FILES['picture']['size'];
     

        if($picture_type=="image/jpeg" || $picture_type=="image/jpg" || $picture_type=="image/png" || $picture_type=="image/gif")
        {
          if($picture_size<=50000000)
          
            $pic_name=time()."_".$picture_name;
            move_uploaded_file($picture_tmp_name,"../img/".$pic_name);
          
        }
      $id=$_POST['dodaj'];
     $nazwa = $_POST['nazwa'];
     $opis = $_POST['opis'];
      $cena = $_POST['cena'];
      $id_kat = $_POST['kategoria'];
      $zdjecie = $_POST['zdjecie'];                         
     $stmt = $pdo->prepare("INSERT into produkty (nazwa, opis, cena,kategoria,zdjecie) VALUES (?, ?, ?,?,?)");
     $stmt->execute([$nazwa, $opis, $cena,$id_kat,$zdjecie]);
     $pdo=null;
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=produkty">';
 }
?>
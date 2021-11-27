<?php
require_once("database.php");
?>
      <div class="content">
        <div class="container-fluid">
          <form action="add_product.php" method="post" id="manage-prod" enctype="multipart/form-data">
          <div class="row">
          
                
         <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Produkt</h5>
              </div>
              <div class="card-body">
              <div class="row">
                    <div class="col-md-4">
                      <div class="">
                        <label for="zdjecie">Zdjęcie produktu</label>
                        <input type="file" name="zdjecie" <?php if(isset($_POST['zdjecie'])) echo $_POST['zdjecie'] ? 'required' : '' ?> class="btn btn-fill" id="zdjecie" onchange="displayImg(this,$(this))">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="opis">Opis</label>
                        <textarea rows="4" cols="80" id="opis" required name="opis" class="form-control"><?php if(isset($_POST['opis'])) echo $_POST['opis']?></textarea>
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
     $opis = $_POST['opis'];
      $cena = $_POST['cena'];
      $id_kat = $_POST['kategoria'];
      $zdjecie = $nazwa_zdj;                      
     $stmt = $pdo->prepare("INSERT into produkty (nazwa, opis, cena,kategoria,zdjecie) VALUES (?, ?, ?,?,?)");
     $stmt->execute([$nazwa, $opis, $cena,$id_kat,$zdjecie]);
     $pdo=null;
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=produkty">';
 }
?>
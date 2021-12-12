<?php
require_once("database.php");
unset($_SESSION['error']);
$id = $_GET["id_prod"];
$stmt = $pdo->prepare("SELECT * from produkty WHERE id_prod=" . $id);
$stmt->execute();
$result = $stmt->fetch();
$stmtt = $pdo->prepare("SELECT * from kategorie WHERE id_kat=" . $result['kategoria']);
$stmtt->execute();
$result2 = $stmtt->fetch();
?>
      <div class="content">
        <div class="container-fluid">
        <?php 
            if (isset($_SESSION['error'])):
          ?>
          <div class="alert alert-danger">
              <?= $_SESSION['error'] ?>
          </div>
          <?php endif;
          unset($_SESSION['error']);
          ?>
          <form action="#" method="post" id="manage-prod" enctype="multipart/form-data">
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
                        <input type="text" id="nazwa" required name="nazwa" class="form-control" value="<?php if(isset($_POST['nazwa'])) echo $_POST['nazwa']; else echo $result["nazwa"];  ?>">
                      </div>
                    </div>
                    <br/>
                    <div class="row">
                    <div class="col-md-6">
                        
                        <label for="zdjecie">Zdjęcie główne</label>
                        
                        <input type="file" name="zdjecie" <?php if(isset($_POST['zdjecie'])) echo $_POST['zdjecie']; else echo $result['zdjecie'];?> class="btn btn-fill" id="zdjecie" onchange="displayImg(this,$(this))">

                      </div>
                      <div class="col-md-6">
                      <?php
                         echo'  
                        <label for="zdjecie_dod">Dodatkowe zdjęcia</label>
                        <input type="file" name="zdjecie_dod[]" multiple';?> <?php if(empty($_POST['zdjecie'])) echo ""; elseif(isset($_POST['zdjecie'])){ echo $_POST['zdjecie'];} else echo $rekord['zdjecie']; ?> <?php echo 'class="btn btn-fill" id="zdjecie_dod" onchange="displayImg(this,$(this))">
                      </div> 
                      ';
                        ?>
                        <?php
                                                  echo'<td>
                                                  <!-- Button trigger modal -->
                                                  <div class="row text-end" style="float:right;">
                                                  <div class"col-md-4">
                                                  <form action="#" method="POST" >
                        <button type="button" name="usun_zdj" value='.$result['id_prod'].' class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal">
                         Przeglądaj
                        </button>
                        </form>
                        </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Zdjęcia produktu</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-4">
                                  <figure class="figure">
                          <img src="/'.$result['zdjecie'].'" width="300px" height="auto" class="figure-img img-fluid rounded" alt="...">
                          <figcaption class="figure-caption">Zdjęcie główne</figcaption>
                        </figure>
                                  </div>';;
                                  
                                  ?><?php echo'
                                  <div class="col-md-8">';
                                    $quer1=$pdo->query('select * from galeria where id_produktu ='.$result['id_prod']);
                                      $photos = $quer1->fetchAll(\PDO::FETCH_ASSOC);
                                      foreach($photos as $photo){
                                        echo '
                                        <figure class="figure">
                          <img src="/'.$photo['zdjecie'].'" width="200px" height="auto" class="figure-img img-fluid rounded" alt="...">
                          <figcaption class="figure-caption">Zdjęcie dodatkowe<form action="delete_product.php" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć '.$result['zdjecie'].'?\');">
                          <button name="usun_zdj" type="submit" value='.$photo['id_zdj'].' class="btn btn-danger">Usuń</button>
                          </form></figcaption>
                        </figure>';
                        $quer1->closeCursor();
                                      }
                                    
                                   ?>
                                   <?php
                                   echo'               
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                                                  
                                                  </td>';
                                                
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
                        <input min="0" id="cena" name="cena" required value="<?php if(isset($_POST['cena'])) echo $_POST['cena']; else echo $result['cena']; ?>" required class="form-control" >
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
 $aktualny2 = $result2['id_nadrz'];
 $kat=$pdo->query ('select * from kategorie where id_nadrz is null');
 foreach($kat as $rekord)
 {
  if(isset($_POST['zapisz'])){
    if ($rekord['id_kat'] == $_POST['kategoria']){
        echo '<option selected="selected" value=' . $rekord['id_kat'] . '>' .$rekord['kategoria'].'</option>';
     } else{
        echo '<option value=' . $rekord['id_kat'] . '>' .$rekord['kategoria'].'</option>';}
}else
  if ($rekord['id_kat'] == $aktualny2) {echo '<option selected="selected" value=' . $rekord['id_kat'] . '>' .$rekord['kategoria'].'</option>';
  }else{
   echo '<option value='.$rekord['id_kat'].'>'.$rekord['kategoria'].'</option>';
                    
 }
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
        $aktualny = $result['kategoria'];

$kat=$pdo->query ('select * from kategorie where id_nadrz = '.$result2['id_nadrz']);
$katt=$kat->fetchAll();
   foreach($katt as $row)
   {
    
  {
      if ($row['id_kat'] == $aktualny) {echo '<option selected="selected" value=' . $row['id_kat'] . '>' .$row['kategoria'].'</option>';
      }else{
          echo '<option value=' . $row['id_kat'] . '>' .$row['kategoria'].'</option>';}
  }      
   }

$kat->closeCursor();
?>
        </select>
                      </div>
                    </div>
                     
                  
                 
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="zapisz" type="submit" name="zapisz" value="<?php echo $id; ?>" class="btn btn-fill btn-primary">Save Product</button>
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
    

    if(isset($_POST['zapisz']) && $_POST['cena']>=0){
      if(isset($_FILES['zdjecie_dod'])){
        $id=$_POST['zapisz'];
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
             $stmt->execute([$zdjecie_dod,$id]);
            
      
      
         }
           }
         }
       }  
      $id=$_POST['zapisz'];
     $nazwa = $_POST['nazwa'];
     $opis =  nl2br($_POST['opis']);
      $id_kat = $_POST['kategoria'];                     
     $stmt = $pdo->prepare("UPDATE produkty set nazwa=?, opis=?,kategoria=? where id_prod=".$id);
     $stmt->execute([$nazwa, $opis,$id_kat]);
     $stmtt = $pdo->prepare('update produkty set cena = :cena where id_prod='.$id);
      $stmtt->bindValue(':cena', $_POST['cena'], PDO::PARAM_STR);
      $stmtt->execute();
      unset($_SESSION['error']);
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=produkty">';
    } else {
      $_SESSION['error'] = 'Nieprawidłowa cena';
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
              $id=$_POST['zapisz'];
     $nazwa = $_POST['nazwa'];
     $opis = $_POST['opis'];
      $cena = $_POST['cena'];
      $id_kat = $_POST['kategoria'];   
      $zdjecie = $nazwa_zdj;
      $quer=$pdo->query('select zdjecie from produkty where id_prod ='.$id);
$file = $quer->fetch();
$file_path =  $file['zdjecie'];
 if(unlink($file_path))
 {
     $stmt = $pdo->prepare("UPDATE produkty set nazwa=?, opis=?, cena=?,kategoria=?,zdjecie=? where id_prod=".$id);
     $stmt->execute([$nazwa, $opis, $cena,$id_kat,$zdjecie]);
 }                  

 if(isset($_FILES['zdjecie_dod'])){
  $id=$_POST['zapisz'];
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
       $stmt->execute([$zdjecie_dod,$id]);
      


   }
     }
   }
 }       
      $pdo=null;
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=produkty">';
 }
?>
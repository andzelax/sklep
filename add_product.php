<?php
require_once("database.php");
?>
<script>
    
</script>
      <div class="content">
        <div class="container-fluid">
          <form action="" id="manage-prod">
          <div class="row">
          
                
         <div class="col-md-7">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Produkt</h5>
              </div>
              <div class="card-body">
              <form method="post" action="add_product.php" id="form">
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
              </form>
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
                        <label for="id_nadrz" class="form-label">Nadrzedna: </label>
        <p><select name="id_nadrz" id="id_nadrz" class="form-select" >
            <option></option>
        <?php
                
      
                $kat = $pdo->query('SELECT * FROM kategorie where id_nadrz is null');
                foreach($kat as $row)
                {
                   if($row['id_kat']==$_POST['id_nadrz'])
                   echo'<option selected="selected" value='.$row['id_kat'].'>'.$row['kategoria'].'</option>';
                   else
                   echo'<option value='.$row['id_kat'].'>'.$row['kategoria'].'</option>';

                                }
                $kat->closeCursor();
            ?>
        </select></p>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label for="kategoria" class="form-label">Podrzedna: </label>
        <p><select name="kategoria" id="kategoria" class="form-select" >
      
        </select></p>
                      </div>
                    </div>
                     
                  
                 
                  </div>
                
              </div>
              <div class="card-footer">
                  <button type="submit" id="btn_save" name="btn_save" required class="btn btn-fill btn-primary">Save Product</button>
              </div>
            </div>
          </div>
          
        </div>
         </form>
          
        </div>
      </div>
      <?php


try
{
    
    if(isset($_POST['btn_save']) && $_POST['nazwa']!='' && $_POST['opis']!='' && $_POST['cena']!='' && $_POST['id_kat']!=''
    && $_POST['zdjecie']!='')
    {  
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $stmt = $pdo -> prepare('INSERT INTO `produkty` (`nazwa`, `opis`, `cena`, `kategoria`, `zdjecie`)  VALUES(
                :nazwa,
        :opis,
        :cena,
        :kategoria,
                :zdjecie)');  
                $stmt -> bindValue(':nazwa', $_POST['nazwa'], PDO::PARAM_STR);
                $stmt -> bindValue(':opis', $_POST['opis'], PDO::PARAM_STR);
                $stmt -> bindValue(':cena', (float)$_POST['cena'], PDO::PARAM_STR);
                $stmt -> bindValue(':kategoria', $_POST['ID_SZEFA'], PDO::PARAM_INT);
                $stmt -> bindValue(':zdjecie', $_POST['zdjecie'], PDO::PARAM_STR);
                
               $ilosc  = $stmt -> execute();
        
        if($ilosc > 0 )
        {
            echo 'Pomyślnie dodano: '.$ilosc.' rekordów';
            echo '<meta http-equiv="refresh" content="1;url=./index.php">';
        }
        
    }

    elseif(isset($_POST['dodaj']))
    {
        
        echo '
        Uzupełnij wymagane pola!
        ';  
    }
}
catch(PDOException $e)
{
    echo 'Wystapił blad biblioteki PDO: ' . $e->getMessage();
}
?>
     <script>
         
         $(document).ready(function() {
$('#id_nadrz').on('click', function() {
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
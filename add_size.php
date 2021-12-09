<?php
require_once("database.php");

?>
      <div class="content">
        <div class="container-fluid">
          <form action="" method="post" id="manage-prod" enctype="multipart/form-data">
          <div class="row">
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
                <form action="add_size.php" method="POST">
              <button name="submit" class="btn btn-primary" type="submit" value=<?php $rekord['id_kat'] ?> >Szukaj</button>
        </form>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Produkty</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      
                    <table class="table table-striped " id="prod">
                    <thead class="produkty">
                      <tr>
                        <th>Zdjęcie</th>
                        <th>Nazwa</th>
                        <th>Akcje</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        if(isset($_POST['submit'])){
                        
                        $stmt=$pdo->query('SELECT * from produkty where kategoria ='.$_POST['kategoria']);
                        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        foreach($result as $rekord)
                        {
                            print("<tr><td>");
                           echo '<img src="/'.$rekord['zdjecie'].'" width="100px" height="auto" />'.'<br><br>';
                           print("</td><td>");
                           echo $rekord['nazwa'];
                           print('<td>
          <div class="btn-group">         
<form action="#" method="POST">
        <button name="dodaj" type="submit" value='.$rekord['id_prod'].' class="btn btn-primary">Dodaj</button>
        </form></div>
        </td>');
                          
                        } $stmt->closeCursor();
                      }else echo'';
                        ?>
                    </tbody>
                  </table>
                    </div>
                  </div>
              </div>
            </div>
          </div>
          <?php
            if(isset($_POST['dodaj'])){
              $id_prod = $_POST['dodaj'];
              echo'
              <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Rozmiary</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-6">
                        <label for="rozmiar">Rozmiar</label>
                        <select name="rozmiar" class="form-select" >
                         <option selected value="XS">XS</option>
                         <option value="S">S</option>
                          <option value="M">M</option>
                           <option value="L">L</option>
                           <option value="XL">XL</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="ilosc">Ilość</label>
                        <input type="number" min="0" name="ilosc" class="form-control" value=';if(isset($_POST['ilosc'])){echo $_POST['ilosc'];} echo'>
                      </div>
                      </div>
            </div>
            <div class="card-footer">
                  <button type="submit" name="dodaj_rozmiar" value='.$id_prod.' required class="btn btn-fill btn-primary">Dodaj rozmiar</button>
              </div>
          </div>
              ';
            }
            if(isset($_POST['dodaj_rozmiar'])){
              $id = $_POST['dodaj_rozmiar'];
              $rozmiar = $_POST['rozmiar'];
              $ilosc = $_POST['ilosc'];
              $select = $pdo->query('select * from rozmiary where id_prod='.$id.' and rozmiar="'.$rozmiar.'"');
              $selectt = $select->fetch();
              if (isset($selectt['id_rozmiar'])){
                $iloscc = $selectt['ilosc'] + $ilosc;
                $up=$pdo->query('update rozmiary set ilosc='.$iloscc.' where id_rozmiar='.$selectt['id_rozmiar']);
              }else{
                $stmt = $pdo->prepare("INSERT into rozmiary (rozmiar, ilosc, id_prod) VALUES (?, ?, ?)");
                $stmt->execute([$rozmiar,$ilosc,$id]);
              }
              
              $pdo=null;
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=add_size">';
            }
          ?>

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
 
      
    ?>
 

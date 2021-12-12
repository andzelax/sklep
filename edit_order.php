<?php

use PHPMailer\PHPMailer\PHPMailer;

require_once("database.php");
$id = $_GET["id_zamowienia"];
$stmt = $pdo->prepare("SELECT * from zamowienia WHERE id_zamowienia=" . $id);
$stmt->execute();
$result = $stmt->fetch();
$stmt2 = $pdo->prepare("SELECT * from zamowione_produkty WHERE id_zamowienia=" . $id);
$stmt2->execute();
$result2 = $stmt2->fetchAll();
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
                        <input type="text" id="imie" required name="imie" class="form-control" value="<?php if(isset($_POST['imie'])) echo $_POST['imie']; else echo $result["imie"];  ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nazwisko">Nazwisko</label>
                        <input type="text" id="nazwisko" required name="nazwisko" class="form-control" value="<?php if(isset($_POST['nazwisko'])) echo $_POST['nazwisko']; else echo $result["nazwisko"];  ?>">
                      </div>
                    </div>
              </div>
                    <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">email</label>
                        <input type="email" id="email" required name="email" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email']; else echo $result["email"];  ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="nr_telefonu">nr_telefonu</label>
                        <input  required type="text" pattern="^[0-9\-\+]{9}$" name="nr_telefonu" class="form-control" value="<?php if(isset($_POST['nr_telefonu'])) echo $_POST['nr_telefonu']; else echo $result["nr_telefonu"];  ?>">
                      </div>
                    </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                      <div class="form-group">
                        <label for="data_zamowienia">data_zamowienia</label>
                        <input disabled type="text" id="data_zamowienia" required name="data_zamowienia" class="form-control" value="<?php if(isset($_POST['data_zamowienia'])) echo $_POST['data_zamowienia']; else echo $result["data_zamowienia"];  ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="suma">suma</label>
                        <input type="text" id="suma" required name="suma" class="form-control" value="<?php if(isset($_POST['suma'])) echo $_POST['suma']; else echo $result["suma"];  ?>">
                      </div>
                    </div>
              </div>
              <div class="row">
              
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="data_realizacji">data_realizacji</label>
                        <input  type="date" id="data_realizacji" name="data_realizacji" class="form-control" value="<?php if(isset($_POST['data_realizacji'])){$today= date("Y-m-d H:i:s"); $_POST['data_realizacji']=$today; echo $_POST['data_realizacji'];}   else echo $result["data_realizacji"];    ?>">
                      </div>
                    </div>
              </div>
              
              </div><?php
                  if($result['status']==0):
                ?>
              <div class="card-footer">
                  <button type="submit" id="zapisz" type="submit" name="zapisz" value="<?php echo $id; ?>" class="btn btn-fill btn-primary">Zatwierdź zamówienie</button>
              </div>
              <?php
              endif;
              ?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Produkt</h5>
              </div>
              <div class="card-body">
                <?php 
                $bool=$result['status'];
                  foreach($result2 as $result){
                ?>
              <div class="row">
              <?php
                  if($bool==0):
                ?>
                <form method="POST" action="usuwanie_z_koszyka.php">
                        <input type="hidden" name="id" value="<?= $id ?>">
                    <div class="col-lg-1">
              <button type="submit" class="bg-white me-2" style="color: black; border: none; ">
                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                </svg>
              </button>
            </div>   </form>
              <?php
                endif;
              ?>
                    <div class="row">
                    <div class="col-md-6">
                        
                        <label for="zdjecie">Zdjęcie główne</label>
                        <?php
                    echo'
                      <img src="/'.$result['zdjecie'].'" width="300px" height="auto" class="figure-img img-fluid rounded" alt="...">
                      ';
                        
                      ?>
                      </div>
                      
                    <div class="col-md-6">
                      <div class="row">
                      <div class="form-group">
                        <label for="nazwa">Nazwa</label>
                        <input disabled type="text" id="nazwa" required name="nazwa" class="form-control" value="<?php if(isset($_POST['nazwa'])) echo $_POST['nazwa']; else echo $result["nazwa"];  ?>">
                      </div>
              </div>
                        <div class="row">
                      <div class="form-group">
                        <label for="cena">Cena</label>
                        <input disabled min="0" id="cena" name="cena" required value="<?php if(isset($_POST['cena'])) echo $_POST['cena']; else echo $result['cena']; ?>" required class="form-control" >
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group">
                        <label for="ilosc">Ilosc</label>

                        <input type="number" min="0" id="ilosc" name="ilosc[<?php echo $result['id_rozmiaru'] ?>]" required value="<?php if(isset($_POST['ilosc'])) echo $_POST['ilosc']; else echo $result['ilosc']; ?>" required class="form-control" >
                      </div>
                    </div>
                    <?php
                        $rozmiar=$pdo->query('select * from rozmiary where id_rozmiar='.$result['id_rozmiaru']);
                        $roz=$rozmiar->fetchAll();
                        foreach($roz as $row){
                    ?>
                    <div class="row">
                      <div class="form-group">
                        <label for="rozmiar">Rozmiar</label>
                        <input disabled min="0" id="rozmiar" name="rozmiar" required value="<?php if(isset($_POST['rozmiar'])) echo $_POST['rozmiar']; else echo $row['rozmiar']; ?>" required class="form-control" >
                      </div>
                    </div>
                    <?php
                        }
                    ?>
                    </div>
              </div>
              
              
              </div>
              <?php
            }
          ?>
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
        
    

    if(isset($_POST['zapisz'])){
      foreach($_POST['ilosc'] as $idd => $ilosc){
        $ile = $pdo->query('select * from rozmiary where id_rozmiar ='.$idd);
        $ilee = $ile->fetch();
        if($ilee['ilosc']<$ilosc){
          $_SESSION['error'] = 'Wpisz nniejszą ilość';
          echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=edit_order&id_zamowienia='.$id.'">';
        }else{
          $update = $pdo->query('update zamowione_produkty set ilosc='.$ilosc.' where id_zamowienia='.$id.' and id_rozmiaru='.$idd);
          $odejmij = $ilee['ilosc']-$ilosc;
          $update_ilosc=$pdo->query('update rozmiary set ilosc='.$odejmij.' where id_rozmiar='.$idd);
        }
      }
      $id=$_POST['zapisz'];
     $imie = $_POST['imie'];
     $nazwisko = $_POST['nazwisko'];
     $email = $_POST['email'];
     $nr_telefonu = $_POST['nr_telefonu'];
     $suma = $_POST['suma'];
     $data_zamowienia = $_POST['data_zamowienia'];
     $data_realizacji = $_POST['data_realizacji'];                 
     $stmt = $pdo->prepare("UPDATE zamowienia set imie=?, nazwisko=?, email=?,nr_telefonu=?, suma=?, data_zamowienia=?, data_realizacji=?, status=1  where id_zamowienia=".$id);
     $stmt->execute([$imie, $nazwisko, $email,$nr_telefonu, $suma, $data_zamowienia, $data_realizacji]);
     $pdo=null;
    

    
    if(isset($_POST['email'])){
      $email = $_POST['email'];
    }else{
      $email = $result["email"];
    }
        $name = 'Andżelika Gawinkowska';
        $subject = 'Potwierdzenie zamówienia';
        $body = 'Twoje zamówienie o numerze ' . $result['id_zamowienia'] . ' zostało właśnie potwierdzone.';

        require_once "vendor\phpmailer\phpmailer\src\PHPMailer.php";
        require_once ("vendor\phpmailer\phpmailer\src\SMTP.php");
        require_once ("vendor\phpmailer\phpmailer\src\Exception.php");

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "witamtutajstronamoja@gmail.com";
        $mail->Password = 'Hubert123';
        $mail->Port = 465; //587
        $mail->SMTPSecure = "ssl"; //tls

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom('witamtutajstronamoja@gmail.com', $name);
        $mail->addAddress($email);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=zamowienia">';
    }

      
  
    
?>

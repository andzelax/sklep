<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0){
  echo 'Proszę nie oszukiwać ogólnie';
  exit;
}
session_abort();
require_once 'database.php';
include 'navbar_admin.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo2.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/logo2.png" type="image/x-icon"/>

    <title>QUALITY</title>
  </head>
  <body>
      <div class="container-fluid" style="padding-top: 20px; overflow: hidden;">
      <div class="row">
    <div class="col-md-2" style="float:left;">
      
  <div class="list-group">
  <a href="panel.php?page=produkty" class="list-group-item list-group-item-action">Produkty</a>
  <a href="panel.php?page=kategorie" class="list-group-item list-group-item-action">Kategorie</a>
  <a href="panel.php?page=rozmiary" class="list-group-item list-group-item-action">Rozmiary</a>
  <a href="panel.php?page=zamowienia" class="list-group-item list-group-item-action">Zamówienia</a>
  <a href="panel.php?page=uzytkownicy" class="list-group-item list-group-item-action">Użytkownicy</a>
  
</div>
</div>

      <div class="col-md-10">
      <main id="view-panel">
		
            <?php 
            $page = isset($_GET['page']) ? $_GET['page'] : 'produkty';
            include $page.'.php' ?>
          
    </main>
</div>
</div></div>
<script>
  if('<?php echo isset($_GET['page']) ?>' == 1)
    $('.nav-<?php echo $_GET['page'] ?>').addClass('active')
</script>
</body>
</html>
<?php
require_once 'database.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="img/logo2.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/logo2.png" type="image/x-icon"/>

    <title>QUALITY</title>
  </head>
  <body>
    <header class="fixed-top">
      <div class="row">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
          <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/logo1.png" width="120" height="30" class="d-inline-block mr-1 align-bottom" alt="QUALITY"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <?php
                  $kategorie=$pdo->query('select * from kategorie where id_nadrz is null');
                  $kat=$kategorie->fetchAll();
                  foreach($kat as $cat){
                    echo'<form method="POST"><li class="nav-item">';
                    echo '<a class="nav-link" name="category" href="wyswietlane_produkty.php?id_kat='.$cat['id_kat'].'"">'.$cat['kategoria'].'</a>';
                    echo '</li></form>';
                  }
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="kontakt.html">Kontakt</a>
                </li>
              </ul>
            <a href="logowanie.php" class="me-2">
              <svg class="me-2 bi bi-person-fill" style="color: white;" xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
              </svg>
            </a>
            <a href="koszyk.html" class="me-2">
                <svg class="me-2 bi bi-bag-fill" style="color: white;" xmlns="http://www.w3.org/2000/svg"  width="26" height="26" fill="currentColor" viewBox="0 0 16 16">
                  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
                </svg>
            </a>         
              <form class="d-flex me-2 align-self-center" style="padding-top: 3px;">
                <input class=" btn-light form-control me-2 "  type="search" placeholder="Wyszukaj" aria-label="Wyszukaj">
                <button class="btn btn-light"  type="submit">Znajdź</button>
              </form>
            </div>
          </div>
        </nav>
      </div>
    </header>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="function.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    -->
    </html>
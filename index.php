<?php
require_once 'database.php';
include 'navbar.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">	
    <link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	    <link rel="icon" href="img/logo2.png" type="image/x-icon"/>
<link rel="shortcut icon" href="img/logo2.png" type="image/x-icon"/>

    <title>QUALITY</title>
  </head>
  <body>
  
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
          <div class="row">
          <div class="col">
          <div class="bg-image hover-zoom">          
  <a href="#">
    <img class="d-block w-100" src="img/a.png" alt="First slide">
    <div class="mask" style="background-color: rgba(57, 192, 237, 0.2)"></div>
  </a>
</div>          
          </div>
          <div class="col">
          <img class="d-block w-100" src="img/b.png" alt="First slide">
          </div>
          <div class="col">
          <img class="d-block w-100" src="img/a.png" alt="First slide">
          </div>
        </div>      
    </div>
    <div class="carousel-item">
    <div class="row">
          <div class="col">
          
          <img class="d-block w-100" src="img/b.png" alt="Second slide">  <h4>Text</h4>
          </div>
          <div class="col">
          <img class="d-block w-100" src="img/a.png" alt="Second slide">
          </div>
          <div class="col">
          <img class="d-block w-100" src="img/b.png" alt="Second slide">
          </div>
        </div>  
    </div>
    <div class="carousel-item">
    <div class="row">
          <div class="col">
          <img class="d-block w-100" src="img/b.png" alt="Third slide">
          </div>
          <div class="col">
          <img class="d-block w-100" src="img/b.png" alt="Third slide">
          </div>
          <div class="col">
          <img class="d-block w-100" src="img/b.png" alt="Third slide">
          </div>
        </div> 
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <footer>
<?php include 'footer.php';?>
</footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
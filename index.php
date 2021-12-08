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
    <link rel="stylesheet" href="css/mdb.min.css" />
    <title>QUALITY</title>
  </head>
  <body>    
 
        <div id="container" style="overflow: hidden;" >
            <div class="row">
              <div class="slider" id="slider3">
                <div style="background-image:url(img/zdj5.jpg);">
                  <h2><span>
                    <a href="kobiety.html">Kobiety</a>
                  </span></h2>
                </div>
                <div style="background-image:url(img/slider.png">
                    <h2><span>
                      <a href="mezczyzni.html">Mężczyźni</a>
                    </span></h2>
                </div>               
                <i class="left arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
                    </svg></i>
                <i class="right arrows" style="z-index:2; position:absolute;">
                    <svg viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path>
                    </svg></i>
            </div>
              <div class="col text-center">
                <h2>Nowości</h2>
                <p >Bardzo nas ciekawią połączenia, jakie tworzysz z ubrań marki Quality. Udostępnij swoją stylizację i dodaj nas jako @quality lub oznacz tagiem #qualitystyle.
                </p>
              </div>

            <div class="col-lg-12 col-md-12">
                <div class="row">
                <div class="col">
                  <article>
                    <div class="row m">
                      <div class="col-md-8 card">
                        <a href="3" target="blank">
                        <img src="img/zd1.jpg" class="d-block w-100 " alt="...">
                        <div class="card-img-overlay ">                        
                        </div>
                        </a>
                      </div>
                      <div class="col-md-4 card m">
                        <a href="#" target="blank">
                          <img src="img/zdj8.jpg" class="d-block w-100"  alt="...">
                          <div class="card-img-overlay">                            
                            </div>
                            </a>
                            <div class="col-md card m-0">   
                        <a href="#" target="blank">
                          <img src="img/zdj3.jpg" class="d-block w-100" alt="...">
                          <div class="card-img-overlay">                          
                          </div>
                          </a>
                      </div>
                    </div>
                    
                      
                      <div class="row n">
                        <div class="col-md card" >
                          <a href="#" target="blank">
                            <img src="img/zdj9.jpg" class="d-block w-100" alt="...">
                            <div class="card-img-overlay">
                            </div>
                            </a>
                        </div>
                        <div class="col-md card">
                          <a href="#" target="blank">
                            <img src="img/zdj6.jpg" class="d-block w-100" alt="...">
                            <div class="card-img-overlay ">
                            </div>
                            </a>
                        </div>                       
                    </div>
                  </div>
                </article></div>  
                </div>
            </div>
            </div>
        </div><BR><BR><BR><BR>
  <footer>
<?php include 'footer.php';?>
</footer>

<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
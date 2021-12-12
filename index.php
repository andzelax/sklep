<?php
require_once 'database.php';
include 'navbar.php';
?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bakbak+One&display=swap" rel="stylesheet">
    <link rel="icon" href="img/logo2.png" type="image/x-icon"/>
    <link rel="shortcut icon" href="img/logo2.png" type="image/x-icon"/>
    <title>QUALITY</title>
  </head>
  <body>  
  
  <div class="row">
      </div>
    </header>
        
        <div id="container" style="overflow: hidden;" >
            <div class="row">
              <div class="slider" id="slider3">               
                <div style="background-image:url(img/zdj5.jpg);" onclick="myhref('wyswietlane_produkty.php?id_kat=3');">                 
                </div>                
                <div style="background-image:url(img/slider.png" onclick="myhref('wyswietlane_produkty.php?id_kat=4');">                    
                </div>
                 <script type="text/javascript">
                function myhref(web){
                  window.location.href = web;}
              </script>      
                <i class="left arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
                    </svg></i>
                <i class="right arrows" style="z-index:2; position:absolute;">
                    <svg viewBox="0 0 100 100">
                        <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) "></path>
                    </svg></i>
            </div>
              <div class="col text-center">
               
                <h1 class="tyt">Nowości</h1>
                <p class="tyt">Bardzo nas ciekawią połączenia, jakie tworzysz z ubrań marki Quality. Udostępnij swoją stylizację i dodaj nas jako @quality lub oznacz tagiem #qualitystyle.
                </p>
              </div>

            <div class="col-lg-12 col-md-12">
                <div class="row">
                <div class="col">
                  <article>
                    <div class="row m">
                      <div class="col-md-8 card">
                        <a href="wyswietlane_produkty.php?id_kat=3" >
                        <img src="img/zd1.jpg" class="d-block w-100 " alt="...">
                        <div class="card-img-overlay ">                        
                        </div>
                        </a>
                      </div>
                      <div class="col-md-4 card m">
                        <a href="wyswietlane_produkty.php?id_kat=4">
                          <img src="img/zdj8.jpg" class="d-block w-100"  alt="...">
                          <div class="card-img-overlay">                            
                            </div>
                            </a>
                            <div class="col-md card m-0">   
                        <a href="wyswietlane_produkty.php?id_kat=3" >
                          <img src="img/zdj3.jpg" class="d-block w-100" alt="...">
                          <div class="card-img-overlay">                          
                          </div>
                          </a>
                      </div>
                    </div>
                    
                      
                      <div class="row n">
                        <div class="col-md card" >
                          <a href="wyswietlane_produkty.php?id_kat=4" >
                            <img src="img/zdj9.jpg" class="d-block w-100" alt="...">
                            <div class="card-img-overlay">
                            </div>
                            </a>
                        </div>
                        <div class="col-md card">
                          <a href="wyswietlane_produkty.php?id_kat=3" >
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
        </div><BR><BR><BR>
        <div class="dod">
        <p ><h3 class="doda">Największy wybór modowych trendów w Europie</h3>
        <h5 class="doda">Odkryj ponad 100 marek oraz setki stylizacji i ciesz się wygodą zamówień dzięki QUALITY</h5></p>
        <br></div>
  <footer>
<?php include 'footer.php';?>
</footer>
</body>
</html>
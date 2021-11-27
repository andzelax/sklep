<?php
require_once("database.php");
function t1($val, $min, $max) {
  return ($val >= $min && $val <= $max);
}
$count = $pdo->query( 'SELECT COUNT( id_zdj) as cnt FROM galeria' )->fetch()['cnt'];

$page = isSet( $_GET['card'] ) ? intval( $_GET['card'] - 1 ) : 0;

$limit = 3;

$from = $page * $limit;

$allPage = ceil( $count / $limit );

$stmt=$pdo->query('SELECT * from galeria LIMIT ' . $from . ', ' . $limit);
?>
<body>
      <div class="content">
        <div class="container-fluid">
        
         <div class="col-md-14">
            
                <div class="col-md-2 offset-md-10"> <a class="btn btn-dark" href="panel.php?page=add_photo" name="add_photo" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Dodaj</a></div> 
                <br>
                  <table class="table table-striped ">
                    <thead class="zdjecia">
                      <tr>
                        <th>Zdjęcie</th>
                        <th>Produkt</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      
                        
                        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        foreach($result as $rekord)
                        {
                            print("<tr><td>");
                           echo '<img src="'.$rekord["zdjecie"].'" width="100px" height="auto" />'.'<br><br>';
                           print("</td><td>");
                           echo $rekord["id_produktu"];
                           print("</td><td>");
                        }
                        $stmt->closeCursor();
                        ?>
                    </tbody>
                  </table>
                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
             <?php
                 echo '
                 <ul class="pagination">
                 ';
                 
                 if( $page > 4 ) {
                     echo '<li class="page-item"><a class="page-link" href="panel.php?page=galeria&card=1"> < pierwsza strona </a></li>  ';
                 }
                 
                 for( $i = 1; $i <= $allPage; $i++ ) {
             
                     $bold = ( $i == ( $page + 1 ) ) ? '' : '';
             
             
                     if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {
             
                         echo '<li class="page-item"><a class="page-link" ' . $bold . ' href="panel.php?page=galeria&card=' . $i . '">' . $i . '</a></li>  ';
             
                     }
             
                 }
             
                  if( $page < ( $allPage - 1 ) ) {
                      echo '<li class="page-item"><a class="page-link" href="panel.php?page=galeria&card=' . $allPage . '">ostatnia strona > </a></li>  ';
                  }'</ul>'
             ?>
          
        </div>
      </div>
      </div>
                  </body>
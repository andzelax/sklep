<?php
require_once("database.php");
function t1($val, $min, $max) {
  return ($val >= $min && $val <= $max);
}
$count = $pdo->query( 'SELECT COUNT( id_kat) as cnt FROM kategorie' )->fetch()['cnt'];

$page = isSet( $_GET['card'] ) ? intval( $_GET['card'] - 1 ) : 0;

$limit = 3;

$fron = $page * $limit;

$allPage = ceil( $count / $limit );

$stmt=$pdo->query('SELECT * from kategorie LIMIT ' . $fron . ', ' . $limit);
?>
<body>
      <div class="content">
        <div class="container-fluid">
        
         <div class="col-md-14">
            
                <div class="col-md-2 offset-md-10"> <a class="btn btn-dark" href="panel.php?page=add_category" name="add_product" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Dodaj</a></div> 
                <br>
                  <table class="table table-striped " id="prod">
                    <thead class="produkty">
                      <tr>
                        <th>Kategoria nadrzędna</th>
                        <th>Kategoria</th>
                        <th>Akcje</th>
                    </thead>
                    <tbody>
                      <?php 
                      
                        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        foreach($result as $rekord)
                        {
                            print("<tr><td>");
                            if($rekord['id_nadrz']){
                                $kat=$pdo->query('select * from kategorie where id_kat='.$rekord['id_nadrz']);
                                foreach($kat as $cat){
                                    print($cat['kategoria']);
                                }
                                $kat->closeCursor();
                            }else{
                            echo $rekord['id_nadrz'];}
                           print("</td><td>");
                           echo $rekord['kategoria'];
                           print('<td>
          <div class="btn-group">
          <button type="button" name="edit" class="btn btn-warning"><a href="panel.php?page=edit_category&id_kat='.$rekord['id_kat'].'"">edytuj</a></button>
                        
<form action="delete_category.php" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć '.$rekord['kategoria'].'?\');">
        <button name="delete" type="submit" value='.$rekord['id_kat'].' class="btn btn-danger">Usuń</button>
        </form></div>
        </td>');
                          
                        } $stmt->closeCursor();
                        ?>
                    </tbody>
                  </table>
                  
            <?php
                 echo '
                 <ul class="pagination">
                 ';
                 
                 if( $page > 4 ) {
                     echo '<li class="page-item"><a class="page-link" href="panel.php?page=kategorie&card=1"> < pierwsza strona </a></li>  ';
                 }
                 
                 for( $i = 1; $i <= $allPage; $i++ ) {
             
                     $bold = ( $i == ( $page + 1 ) ) ? '' : '';
             
             
                     if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {
             
                         echo '<li class="page-item"><a class="page-link" ' . $bold . ' href="panel.php?page=kategorie&card=' . $i . '">' . $i . '</a></li>  ';
             
                     }
             
                 }
             
                  if( $page < ( $allPage - 1 ) ) {
                      echo '<li class="page-item"><a class="page-link" href="panel.php?page=kategorie&card=' . $allPage . '">ostatnia strona > </a></li>  ';
                  }'</ul>'
             ?>
          
        </div>
      </div>
      </div>
                  </body>
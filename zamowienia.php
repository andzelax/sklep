<?php
require_once("database.php");
function t1($val, $min, $max) {
  return ($val >= $min && $val <= $max);
}
$count = $pdo->query( 'SELECT COUNT( id_zamowienia) as cnt FROM zamowienia' )->fetch()['cnt'];

$page = isSet( $_GET['card'] ) ? intval( $_GET['card'] - 1 ) : 0;

$limit = 3;

$fron = $page * $limit;

$allPage = ceil( $count / $limit );

$stmt=$pdo->query('SELECT * from zamowienia LIMIT ' . $fron . ', ' . $limit);
?>
<body>
      <div class="content">
        <div class="container-fluid">
        <?php 
            if (isset($_SESSION['error'])):
          ?>
          <div class="alert alert-danger">
              <?= $_SESSION['error'] ?>
          </div>
          <?php endif;
          unset($_SESSION['error']);
          ?>
        
         <div class="col-md-14">
            
                <br>
                  <table class="table table-striped " id="prod">
                    <thead class="zamowienia">
                      <tr>
                        <th>id_uzytkownika</th>
                        <th>Imie</th>
                        <th >Nazwisko</th>
                        <th>Email</th>
                        <th>Nr_telefonu</th>
                        <th>Suma</th>
                        <th>Data zamowienia</th>
                        <th>Data realizacji</th>
                        <th>Akcje</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      
                        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        foreach($result as $rekord)
                        {
                            print("<tr><td>");
                           echo $rekord['id_uzytkownika'];
                           print("</td><td>");
                           echo $rekord['imie'];
                           print("</td><td>");
                           echo $rekord['nazwisko'];
                           print("</td><td>");
                           echo $rekord['email'];
                           print("</td><td>");
                           echo $rekord['nr_telefonu'];
                           print("</td><td>");
                           echo $rekord['suma'];
                           print("</td><td>");
                           echo $rekord['data_zamowienia'];
                           print("</td><td>");
                           echo $rekord['data_realizacji'];
                           print('<td>
          <div class="btn-group">
          <button type="button" name="edit" class="btn btn-warning"><a href="panel.php?page=edit_order&id_zamowienia='.$rekord['id_zamowienia'].'"">edytuj</a></button>
                        
<form action="delete_order.php" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć '.$rekord['suma'].'?\');">
        <button name="delete" type="submit" value='.$rekord['id_zamowienia'].' class="btn btn-danger">Usuń</button>
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
                     echo '<li class="page-item"><a class="page-link" href="panel.php?page=zamowienia&card=1"> < pierwsza strona </a></li>  ';
                 }
                 
                 for( $i = 1; $i <= $allPage; $i++ ) {
             
                     $bold = ( $i == ( $page + 1 ) ) ? '' : '';
             
             
                     if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {
             
                         echo '<li class="page-item"><a class="page-link" ' . $bold . ' href="panel.php?page=zamowienia&card=' . $i . '">' . $i . '</a></li>  ';
             
                     }
             
                 }
             
                  if( $page < ( $allPage - 1 ) ) {
                      echo '<li class="page-item"><a class="page-link" href="panel.php?page=zamowienia&card=' . $allPage . '">ostatnia strona > </a></li>  ';
                  }'</ul>'
             ?>
          
        </div>
      </div>
      </div>
                  </body>
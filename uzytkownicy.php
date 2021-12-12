<?php
require_once("database.php");
function t1($val, $min, $max) {
  return ($val >= $min && $val <= $max);
}
$count = $pdo->query( 'SELECT COUNT( id_uzytkownika) as cnt FROM uzytkownicy' )->fetch()['cnt'];

$page = isSet( $_GET['card'] ) ? intval( $_GET['card'] - 1 ) : 0;

$limit = 3;

$fron = $page * $limit;

$allPage = ceil( $count / $limit );

$stmt=$pdo->query('SELECT * from uzytkownicy LIMIT ' . $fron . ', ' . $limit);
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
         <div class="col-md-2 offset-md-10"> <a class="btn btn-dark" href="panel.php?page=add_user" name="add_user" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Dodaj</a></div> 
                <br>
                  <table class="table table-striped " id="prod">
                    <thead class="zamowienia">
                      <tr>
                        <th>id_uzytkownika</th>
                        <th>Imie</th>
                        <th >Nazwisko</th>
                        <th>Email</th>
                        <th>Nr_telefonu</th>
                        <th>Adres</th>
                        <th>Miasto</th>
                        <th>Poczta</th>
                        <th>Rola</th>
                        <th>Aktywny</th>
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
                           echo $rekord['adres'];
                           print("</td><td>");
                           echo $rekord['miasto'];
                           print("</td><td>");
                           echo $rekord['kod_pocztowy'];
                           print("</td><td>");
                           echo $rekord['rola'];
                           print("</td><td>");
                           echo $rekord['potwierdzenie'];
                           print('<td>
          <div class="btn-group">
          <button type="button" name="edit" class="btn btn-warning"><a href="panel.php?page=edit_user&id_uzytkownika='.$rekord['id_uzytkownika'].'"">edytuj</a></button>
                        
<form action="delete_user.php" method="POST" onsubmit="return confirm(\'Czy na pewno chcesz usunąć '.$rekord['imie'].' '.$rekord['nazwisko'].'?\');">
        <button name="delete" type="submit" value='.$rekord['id_uzytkownika'].' class="btn btn-danger">Usuń</button>
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
                     echo '<li class="page-item"><a class="page-link" href="panel.php?page=uzytkownicy&card=1"> < pierwsza strona </a></li>  ';
                 }
                 
                 for( $i = 1; $i <= $allPage; $i++ ) {
             
                     $bold = ( $i == ( $page + 1 ) ) ? '' : '';
             
             
                     if( t1( $i, ( $page -3 ), ( $page + 5 ) ) ) {
             
                         echo '<li class="page-item"><a class="page-link" ' . $bold . ' href="panel.php?page=uzytkownicy&card=' . $i . '">' . $i . '</a></li>  ';
             
                     }
             
                 }
             
                  if( $page < ( $allPage - 1 ) ) {
                      echo '<li class="page-item"><a class="page-link" href="panel.php?page=uzytkownicy&card=' . $allPage . '">ostatnia strona > </a></li>  ';
                  }'</ul>'
             ?>
          
        </div>
      </div>
      </div>
                  </body>
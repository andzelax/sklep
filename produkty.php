<?php
require_once("database.php");

?>
<body>
      <div class="content">
        <div class="container-fluid">
        
         <div class="col-md-14">
            
                <div class="col-md-2 offset-md-10"> <a class="btn btn-dark" href="panel.php?page=add_product" name="add_product" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg> Dodaj</a></div> 
                <br>
                  <table class="table table-striped " id="prod">
                    <thead class="produkty">
                      <tr>
                        <th>Zdjęcie</th>
                        <th>Nazwa</th>
                        <th>Cena</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      $stmt=$pdo->query('SELECT * from produkty');
                        
                        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
                        foreach($result as $rekord)
                        {
                            print("<tr><td>");
                           echo '<img src="img/'.$rekord["zdjecie"].'" width="100px" height="auto" />'.'<br><br>';
                           print("</td><td>");
                           echo $rekord["nazwa_prod"];
                           print("</td><td>");
                           echo $rekord["cena"];
                           print("</td><td>");
                        }
                        $stmt->closeCursor();
                        ?>
                    </tbody>
                  </table>
                  
                  <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
             
          
        </div>
      </div>
      </div>
                  </body>
                  <script>
        $('#prod').dataTable()
      </script>
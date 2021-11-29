<?php
require_once("database.php");
?>
      <div class="content">
        <div class="container-fluid">
          <form action="add_category.php" method="post" id="manage-prod" enctype="multipart/form-data">
          <div class="row">
          <div class="col-md-5">
            <div class="card">
              <div class="card-header card-header-primary">
                <h5 class="title">Kategoria główna</h5>
              </div>
              <div class="card-body">
                
                  <div class="row">
                    
                    <div class="col-md-12">
                      
                      <div class="form-group">
                      <label for="kategoria" class="form-label">Kategoria: </label>
                      <input type="text" id="kategoria" name="kategoria" class="form-control" value="<?php if(isset($_POST['kategoria'])) echo $_POST['kategoria']   ?>">
</div>
                    </div>
                  </div>
                  <div class="card-footer">
                  <button type="submit" id="kategoria" name="kategoria" class="btn btn-fill btn-primary">Dodaj</button>
              </div>
              </div>
            </div>
          </div>
         
         </form>
          
        </div>
      </div>

     <script>
         
         $(document).ready(function() {
$('#id_nadrz').on('change', function() {
var category_id = this.value;
$.ajax({
url: "kat_podrz_action.php",
type: "POST",
data: {
    category_id: category_id
},
cache: false,
success: function(result){
$("#kategoria").html(result);
}
});
});
});

     </script><script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <?php
 
        if(isset($_POST['kategoria'])){
     $kategoria = $_POST['kategoria'];         
     $stmt = $pdo->prepare("INSERT into kategorie (kategoria) VALUES (?)");
     $stmt->execute([$kategoria]); 
    

     $pdo=null; 
     echo '<meta http-equiv="refresh" content="0;url=./panel.php?page=kategorie">';
        }
    ?>
 

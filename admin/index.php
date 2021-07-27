<?php 
session_start();  
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./templates/top.php"; 

?>
 
<?php include "./templates/navbar.php"; ?>

<div class="row">
  <div class="col-2">
  <?php include "./templates/sidebar.php"; ?>
  </div>
  
        <div class="col-10">
            <div class="container pt-5">
        
                      <div class="col-10">
                      <h2>Detalles de Admin</h2>
                      </div>
                      <div class="table-responsive">
                        <table class="table table-striped table-sm">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nombre</th>
                              <th>Email</th>
                              <th>Estatus</th>
                              <th>Accion</th>
                            </tr>
                          </thead>
                          <tbody id="admin_list">
                            <tr>
                              <td>1,001</td>
                              <td>Lorem</td>
                              <td>ipsum</td>
                              <td>dolor</td>
                              <td>sit</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
            </div>
         </div>
</div>

<?php include "./templates/footer.php"; ?>

<script type="text/javascript" src="./js/admin.js"></script>

<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>

<div class="row">
  <div class="col-2">
  <?php include "./templates/sidebar.php"; ?>
  </div>
  
        <div class="col-10">
            <div class="container pt-5">
        
                      <div class="col-10">
					  <h2>Clientes</h2>
                      </div>
                      
											<div class="table-responsive">
												<table class="table table-striped table-sm">
												<thead>
													<tr>
													<th>#</th>
													<th>Nombre</th>
													<th>Email</th>
													<th>Telefono</th>
													<th>Direccion</th>
													<th>Activo</th>
													<th>Acción</th>
													</tr>
												</thead>
												<tbody id="customer_list">
												</tbody>
												</table>
											</div>
            </div>
        
         </div>
</div>



<div class="modal fade" id="edit_customer_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-customer-form" enctype="multipart/form-data">
          <div class="row">
                <div class="col-12">
                  <input type="hidden" name="user_id">
              
                  <div class="form-group">
                <label class="form-label">Nombre</label>
                <input type="text" name="first_name" class="form-control" placeholder="Escribe nombre">
              </div>
			  <div class="form-group">
                <label class="form-label">Apellido</label>
                <input type="text" name="last_name" class="form-control" placeholder="Escribe apellido">
              </div>
			  <div class="form-group">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Escribe email">
              </div>
              <input type="hidden" name="password">
			  <div class="form-group">
                <label class="form-label">Teléfono</label>
                <input type="text" name="mobile" class="form-control" placeholder="Escribe teléfono">
              </div>
			  <div class="form-group">
                <label class="form-label">Dirección 1</label>
                <input type="text" name="address1" class="form-control" placeholder="Escribe dirección">
              </div>
			  <div class="form-group">
                <label class="form-label">Dirección 2</label>
                <input type="text" name="address2" class="form-control" placeholder="Escribe dirección">
              </div>
			  <div class="form-group">
                          <label class="form-label">Activo</label>
                          <select type="text" class="form-control active_list" name="active">
                            <option value="">Seleccionar</option>
                        <option value="2">Activo</option>
                        <option value="1">Bloqueado</option>
                          </select>
              </div>
                </div>
                       <input type="hidden" name="edit_customer" value="1">
                      <div class="col-12 pt-4">
                        <button type="button" class="btn btn-primary edit-customer-btn">Actualizar Categoría</button>
                      </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>







<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>
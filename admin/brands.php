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
                        <h2>Administrar Marca</h2>
                      </div>
                      <div class="d-flex justify-content-end p-3">
                          <button type="button" class="btn btn-warning add-product" data-bs-toggle="modal" data-bs-target="#add_brand_modal">
                          Añadir Marca
                          </button>
                      </div>
                                          <div class="table-responsive">
                                              <table class="table table-striped table-sm">
                                                <thead>
                                                  <tr>
                                                    <th>#</th>
                                                    <th>Nombre</th>
                                                    <th>Accion</th>
                                                  </tr>
                                                </thead>
                                                <tbody id="brand_list">
                                                </tbody>
                                              </table>
                                           </div>
            </div>
        
         </div>
</div>





<!-- Modal -->
<div class="modal fade" id="add_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-brand-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Brand Name</label>
		        		<input type="text" name="brand_title" class="form-control" placeholder="Escribe nombre de la marca">
		        	</div>
        		</div>
        		<input type="hidden" name="add_brand" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-brand">Añadir nombre de marca</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!-- Editar Modal de marca -->
<div class="modal fade" id="edit_brand_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-brand-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="brand_id">
              <div class="form-group">
                <label>Nombre de marca</label>
                <input type="text" name="e_brand_title" class="form-control" placeholder="Escribe nombre de la marca">
              </div>
            </div>
            <input type="hidden" name="edit_brand" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-brand-btn">Actualizar marca</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/brands.js"></script>
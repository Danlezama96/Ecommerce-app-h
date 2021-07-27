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
                        <h2>Administrar Categoría</h2>
                      </div>
                      <div class="d-flex justify-content-end p-3">
                          <button type="button" class="btn btn-warning add-product" data-bs-toggle="modal" data-bs-target="#add_category_modal">
                          Añadir Categoría de Producto
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
                          <tbody id="category_list">
                          </tbody>
                        </table>
                      </div>
            </div>
         </div>
</div>


<!-- Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-category-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nombre de Categoria</label>
		        		<input type="text" name="cat_title" class="form-control" placeholder="Escribe nombre de la marca">
		        	</div>
        		</div>
        		<input type="hidden" name="add_category" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-category">Añadir Categoria</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<!--Editar categoria Modal -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-category-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="cat_id">
              <div class="form-group">
                <label>Nombre de categoria</label>
                <input type="text" name="e_cat_title" class="form-control" placeholder="Escribe nombre de la marca">
              </div>
            </div>
            <input type="hidden" name="edit_category" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary edit-category-btn">Actualizar Categoria</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/categories.js"></script>
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
                        <h2>Lista de Productos</h2>
                      </div>
                      <div class="d-flex justify-content-end p-3">
                          <button type="button" class="btn btn-warning add-product" data-bs-toggle="modal" data-bs-target="#add_product_modal">
                          Añadir Productos
                          </button>
                      </div>
                                <div class="table-responsive">
                                      <table class="table table-striped table-sm">
                                        <thead>
                                          <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Imagen</th>
                                            <th>Precio</th>
                                            <th>Cantidad</th>
                                            <th>Categoria</th>
                                            <th>Marca</th>
                                            <th>Accion</th>
                                          </tr>
                                        </thead>
                                        <tbody id="product_list">
                                        </tbody>
                                      </table>
                                    </div>
            </div>
         </div>
</div>



<!-- Añadir producto modal -->
<div class="modal fade pt-5" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-product-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Product Name</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Escribe nombre del producto">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nombre de marca</label>
		        		<select class="form-control brand_list" name="brand_id">
		        			<option value="">Seleccionar Marca</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nombre de Categoria</label>
		        		<select class="form-control category_list" name="category_id">
		        			<option value="">Seleccionar Categoria</option>
		        		</select>
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Descripcion de Producto</label>
		        		<textarea class="form-control" name="product_desc" placeholder="Escribe descripcion del producto"></textarea>
		        	</div>
        		</div>
            <div class="col-12">
              <div class="form-group">
                <label>Cantidad de Producto</label>
                <input type="number" name="product_qty" class="form-control" placeholder="Escribe cantidad del producto">
              </div>
            </div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Precio del producto</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Escribe precio del producto">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Palabras Clave <small>(eg: Sony, Microfono, Audifonos)</small></label>
		        		<input type="text" name="product_keywords" class="form-control" placeholder="Escribe palabras clave">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Imagen de Producto <small>(formato: jpg, jpeg, png)</small></label>
		        		<input type="file" name="product_image" class="form-control">
		        	</div>
        		</div>
        		<input type="hidden" name="add_product" value="1">
        		<div class="col-12">
        			<button type="button" class="btn btn-primary add-product">Añadir Producto</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Añadir producto modal fin -->

<!-- Editar producto modal empieza -->
<div class="modal fade" id="edit_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-product-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label>Nombre de Producto</label>
                <input type="text" name="e_product_name" class="form-control" placeholder="Escribe nombre del producto">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Nombre de Marca</label>
                <select class="form-control brand_list" name="e_brand_id">
                  <option value="">Seleccionar Marca</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Nombre de Categoria</label>
                <select class="form-control category_list" name="e_category_id">
                  <option value="">Seleccionar Categoria</option>
                </select>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Descripcion de Producto</label>
                <textarea class="form-control" name="e_product_desc" placeholder="Escribe descripcion del producto"></textarea>
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Cantidad de Producto</label>
                <input type="number" name="e_product_qty" class="form-control" placeholder="Escribe cantidad del producto">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Precio Producto</label>
                <input type="number" name="e_product_price" class="form-control" placeholder="Escribe precio del producto">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Palabras Clave <small>(eg: Sony, audio, microfono)</small></label>
                <input type="text" name="e_product_keywords" class="form-control" placeholder="Escribir palabras clave">
              </div>
            </div>
            <div class="col-12">
              <div class="form-group">
                <label>Imagen de Producto <small>(formato: jpg, jpeg, png)</small></label>
                <input type="file" name="e_product_image" class="form-control">
                <img src="../product_images/1.0x0.jpg" class="img-fluid" width="50">
              </div>
            </div>
            <input type="hidden" name="pid">
            <input type="hidden" name="edit_product" value="1">
            <div class="col-12">
              <button type="button" class="btn btn-primary submit-edit-product">Añadir producto</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Edit Product Modal end -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/products.js"></script>
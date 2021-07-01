<?php session_start(); ?>
<?php include_once("./templates/top.php"); ?>
<?php include_once("./templates/navbar.php"); ?>
<div class="container-fluid">
  <div class="row">
    
    <?php include "./templates/sidebar.php"; ?>

      <div class="row">
      	<div class="col-10">
      		<h2>Clientes</h2>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Orden #</th>
              <th>Producto Id</th>
              <th>Producto Nombre</th>
              <th>Cantidad</th>
              <th>Transaccion Id</th>
              <th>Estatus Pago</th>
            </tr>
          </thead>
          <tbody id="customer_order_list">
           
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="add_product_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
		        		<label>Nombre de Producto</label>
		        		<input type="text" name="product_name" class="form-control" placeholder="Escribe nombre del producto">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Nombre de Marca</label>
		        		<select class="form-control brand_list" name="brand_id">
		        			<option value="">Selecciona Marca</option>
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
		        		<label>Precio de Producto</label>
		        		<input type="number" name="product_price" class="form-control" placeholder="Escribe precio del producto">
		        	</div>
        		</div>
        		<div class="col-12">
        			<div class="form-group">
		        		<label>Palabras Clave <small>(eg: Sony, Audifonos, mando)</small></label>
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
<!-- Modal -->

<?php include_once("./templates/footer.php"); ?>



<script type="text/javascript" src="./js/customers.js"></script>
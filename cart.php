<?php

require "config/constants.php";

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Game Access Pro</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<link rel="stylesheet" type="text/css" href="style.css"/>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only">navegacion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Game Access Pro</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="index.php"><span class="glyphicon glyphicon-modal-window"></span>Producto</a></li>
			</ul>
		</div>
	</div>
	</div>
	<p><br/></p>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="cart_msg">
				<!--Carrito mensaje--> 
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading">Carrito</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-2 col-xs-2"><b>Accion</b></div>
							<div class="col-md-2 col-xs-2"><b>Imagen de Producto</b></div>
							<div class="col-md-2 col-xs-2"><b>Nombre de Producto</b></div>
							<div class="col-md-2 col-xs-2"><b>Cantidad</b></div>
							<div class="col-md-2 col-xs-2"><b>Precio Producto</b></div>
							<div class="col-md-2 col-xs-2"><b>Precio en <?php echo CURRENCY; ?></b></div>
						</div>
						<div id="cart_checkout"></div>
						</div> 
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			<div class="col-md-2"></div>
			
		</div>

<script>var CURRENCY = '<?php echo CURRENCY; ?>';</script>
</body>	
</html>
















		
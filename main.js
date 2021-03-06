$(document).ready(function(){
	cat();
	brand();
	product();
	//cat() es una función que obtiene el registro de categoría de la base de datos cada vez que se carga la página
	function cat(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{category:1},
			success	:	function(data){
				$("#get_category").html(data);
				
			}
		})
	}
	//brand() es una función que obtiene el registro de marca de la base de datos siempre que se carga la página
	function brand(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{brand:1},
			success	:	function(data){
				$("#get_brand").html(data);
			}
		})
	}
	//product() es una función que obtiene el registro del producto de la base de datos siempre que se carga la página
		function product(){
		$.ajax({
			url	:	"action.php",
			method:	"POST",
			data	:	{getProduct:1},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	}
	/*	cuando la página se carga correctamente, hay una lista de categorías cuando el usuario hace clic en la categoría, obtendremos la identificación de la categoría y
según id mostraremos productos
	*/
	$("body").delegate(".category","click",function(event){
		$("#get_product").html("<h3>Loading...</h3>");
		event.preventDefault();
		var cid = $(this).attr('cid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{get_seleted_Category:1,cat_id:cid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})

	/*	cuando la página se carga correctamente, hay una lista de marcas cuando el usuario hace clic en la marca, obtendremos la identificación de la marca y
De acuerdo con la identificación de la marca, mostraremos los productos.
	*/
	$("body").delegate(".selectBrand","click",function(event){
		event.preventDefault();
		$("#get_product").html("<h3>Loading...</h3>");
		var bid = $(this).attr('bid');
		
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{selectBrand:1,brand_id:bid},
			success	:	function(data){
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
	
	})
	/*
		En la parte superior de la página hay un cuadro de búsqueda con un botón de búsqueda cuando el usuario ingresa el nombre del producto, luego tomaremos al usuario
una cadena dada y con la ayuda de la consulta SQL, haremos coincidir la cadena dada por el usuario con la columna de palabras clave de nuestra base de datos y luego el producto emparejado
nosotros mostraremos
	*/
	$("#search_btn").click(function(){
		$("#get_product").html("<h3>Cargando...</h3>");
		var keyword = $("#search").val();
		if(keyword != ""){
			$.ajax({
			url		:	"action.php",
			method	:	"POST",
			data	:	{search:1,keyword:keyword},
			success	:	function(data){ 
				$("#get_product").html(data);
				if($("body").width() < 480){
					$("body").scrollTop(683);
				}
			}
		})
		}
	})
	//end


	/*
		Aquí #login es el ID del formulario de inicio de sesión y este formulario está disponible en la página index.php
desde aquí, los datos de entrada se envían a la página login.php
si obtiene la cadena login_success de la página login.php significa que el usuario ha iniciado sesión correctamente y window.location es
utilizado para redirigir al usuario de la página de inicio a la página profile.php
	*/
	$("#login").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url	:	"login.php",
			method:	"POST",
			data	:$("#login").serialize(),
			success	:function(data){
				if(data.trim() === "login_success"){
					window.location.href = "profile.php";
				}else if(data.trim() === "cart_login"){
					window.location.href = "cart.php";
				}else{
					$("#e_msg").html(data);
					$(".overlay").hide();
				}
			}
		})
	})
	//fin

	//Obtener informacion del usuario antes del checkout
	$("#signup_form").on("submit",function(event){
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "register.php",
			method : "POST",
			data : $("#signup_form").serialize(),
			success : function(data){
				$(".overlay").hide();
				if (data == "register_success") {
					window.location.href = "cart.php";
				}else{
					$("#signup_msg").html(data);
				}
				
			}
		})
	})
	//Obtener informacion del usuario acaba aqui

	//Añadir producto al carrito
	$("body").delegate("#product","click",function(event){
		var pid = $(this).attr("pid");
		event.preventDefault();
		$(".overlay").show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {addToCart:1,proId:pid},
			success : function(data){
				count_item();
				getCartItem();
				$('#product_msg').html(data);
				$('.overlay').hide();
			}
		})
	})
	//Fin de añadir producto al carrito
	//Funcion para contar los items del usuario
	count_item();
	function count_item(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {count_item:1},
			success : function(data){
				$(".badge").html(data);
			}
		})
	}
	//acaba funcion para contar items

	//Obtener el artículo del carrito de la base de datos al menú desplegable
	getCartItem();
	function getCartItem(){
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,getCartItem:1},
			success : function(data){
				$("#cart_product").html(data);
			}
		})
	}

	//Obtener el artículo del carrito de la base de datos al menú desplegable acaba

	/*
		Siempre que el usuario cambie la cantidad, actualizaremos inmediatamente su cantidad total mediante la función de teclado.
pero siempre que el usuario ponga algo (como? '' "",. () '' etc) que no sea un número, haremos qty = 1
si el usuario pone qty 0 o menos que 0, entonces lo haremos nuevamente 1 qty = 1
('.total'). each () esta es la repetición de la función de bucle para la clase .total y en cada repetición realizaremos la operación de suma de la clase .valor total
y luego mostrar el resultado en la clase .net_total
	*/
	$("body").delegate(".qty","keyup",function(event){
		event.preventDefault();
		var row = $(this).parent().parent();
		var price = row.find('.price').val();
		var qty = row.find('.qty').val();
		if (isNaN(qty)) {
			qty = 1;
		};
		if (qty < 1) {
			qty = 1;
		};
		var total = price * qty;
		row.find('.total').val(total);
		var net_total=0;
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : $ " +net_total);

	})
	//Cambiar cantidad acaba aqui

	/*
		cada vez que el usuario haga clic en .remove class, tomaremos la identificación del producto de esa fila
y envíelo a action.php para realizar la operación de eliminación del producto
	*/
	$("body").delegate(".remove","click",function(event){
		var remove = $(this).parent().parent().parent();
		var remove_id = remove.find(".remove").attr("remove_id");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{removeItemFromCart:1,rid:remove_id},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})
	})
	/*
siempre que el usuario haga clic en la clase .update, tomaremos la identificación del producto de esa fila
y envíelo a action.php para realizar la operación de actualización de la cantidad del producto 
	*/
	$("body").delegate(".update","click",function(event){
		var update = $(this).parent().parent().parent();
		var update_id = update.find(".update").attr("update_id");
		var qty = update.find(".qty").val();
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{updateCartItem:1,update_id:update_id,qty:qty},
			success	:	function(data){
				$("#cart_msg").html(data);
				checkOutDetails();
			}
		})


	})
	checkOutDetails();
	net_total();
	/*
		La función checkOutDetails () funciona con dos propósitos
Primero habilitará php isset ($ _ POST ["Common"]) en la página action.php y dentro de ella
hay dos funciones isset que se establecen ($ _ POST ["getCartItem"]) y otra se establece ($ _ POST ["checkOutDetials"])
getCartItem se usa para mostrar el artículo del carrito en el menú desplegable
checkOutDetails se usa para mostrar el artículo del carrito en la página Cart.php
	*/
	function checkOutDetails(){
	 $('.overlay').show();
		$.ajax({
			url : "action.php",
			method : "POST",
			data : {Common:1,checkOutDetails:1},
			success : function(data){
				$('.overlay').hide();
				$("#cart_checkout").html(data);
					net_total();
			}
		})
	}
	/*
		net_total se usa para calcular el total de items en el carrito, da error en currency ?¿
	*/
	function net_total(){
		var net_total = 0;
		$('.qty').each(function(){
			var row = $(this).parent().parent();
			var price  = row.find('.price').val();
			var total = price * $(this).val()-0;
			row.find('.total').val(total);
		})
		$('.total').each(function(){
			net_total += ($(this).val()-0);
		})
		$('.net_total').html("Total : "+ "MXN Pesos $" + " " +net_total);
	}

	//remover producto del carrito

	page();
	function page(){
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{page:1},
			success	:	function(data){
				$("#pageno").html(data);
			}
		})
	}
	$("body").delegate("#page","click",function(){
		var pn = $(this).attr("page");
		$.ajax({
			url	:	"action.php",
			method	:	"POST",
			data	:	{getProduct:1,setPage:1,pageNumber:pn},
			success	:	function(data){
				$("#get_product").html(data);
			}
		})
	})
})





















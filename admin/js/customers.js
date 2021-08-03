$(document).ready(function(){

	getCustomers();
	getCustomerOrders();

	function getCustomers(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : {GET_CUSTOMERS:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customersHTML = "";

					$.each(resp.message, function(index, value){
						customersHTML += '<tr>'+
									          '<td>#</td>'+
									          '<td>'+value.first_name+' '+value.last_name+'</td>'+
									          '<td>'+value.email+'</td>'+
									          '<td>'+value.mobile+'</td>'+
									          '<td>'+value.address1+'<br>'+value.address2+'</td>'+
											  '<td>'+(value.active==2 ? 'Activo': 'Bloqueado'  ) +'</td>'+
											  '<td><a class="btn btn-sm btn-info edit-customer"><span style="display:none;">'+JSON.stringify(value)+'</span><i class="fas fa-pencil-alt"></i></a>&nbsp;<a cid="'+value.user_id+'" class="btn btn-sm btn-danger delete-customer"><i class="fas fa-trash-alt"></i></a></td>'+
									       '</tr>'
					});

					$("#customer_list").html(customersHTML);

				}else if(resp.status == 303){

				}

			}
		})
		
	}

	function getCustomerOrders(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : {GET_CUSTOMER_ORDERS:1},
			success : function(response){
				
				console.log(response);
				var resp = $.parseJSON(response);
				if (resp.status == 202) {

					var customerOrderHTML = "";

					$.each(resp.message, function(index, value){

						customerOrderHTML +='<tr>'+
								              '<td>#</th>'+
								              '<td>'+ value.order_id +'</td>'+
								              '<td>'+ value.product_id +'</td>'+
								              '<td>'+ value.product_title +'</td>'+
								              '<td>'+ value.qty +'</td>'+
								              '<td>'+ value.trx_id +'</td>'+
								              '<td>'+ value.p_status +'</td>'+
								            '</tr>';

					});

					$("#customer_order_list").html(customerOrderHTML);

				}else if(resp.status == 303){
					$("#customer_order_list").html(resp.message);
				}

			}
		})
		
	}


	$(document.body).on("click", ".edit-customer", function(){
		var cli = $.parseJSON($.trim($(this).children("span").html()));
		$("input[name='user_id']").val(cli.user_id);
		$("input[name='first_name']").val(cli.first_name);
		$("input[name='last_name']").val(cli.last_name);
		$("input[name='email']").val(cli.email);
		$("input[name='password']").val(cli.password);
		$("input[name='mobile']").val(cli.mobile);
		$("input[name='address1']").val(cli.address1);
		$("input[name='address2']").val(cli.address2);
		$("select[name='active']").val(cli.active);
		

		$("#edit_customer_modal").modal('show');

		

	});

	$(".edit-customer-btn").on('click', function(){
		$.ajax({
			url : '../admin/classes/Customers.php',
			method : 'POST',
			data : new FormData($("#edit-customer-form")[0]),
			contentType : false,
			cache : false,
			processData : false,
			success : function(response){
				console.log('respuesta',response)
				var resp = $.parseJSON(response);
				if (resp.status == 202) {
					$("#edit-customer-form").trigger("reset");
					$("#edit_customer_modal").modal('hide');
					getCustomers();
					alert(resp.message);
				}else if(resp.status == 303){
					alert(resp.message);
				}
				$("#edit_category_modal").modal('hide');
			}
		})

	});


	$(document.body).on('click', '.delete-customer', function(){

		var cid = $(this).attr('cid');
		if (confirm("Seguro que quieres borrar este cliente?")) {
			$.ajax({

				url : '../admin/classes/Customers.php',
				method : 'POST',
				data : {DELETE_CUSTOMER: 1, cid:cid},
				success : function(response){
					console.log(response);
					var resp = $.parseJSON(response);
					if (resp.status == 202) {
						getCustomers();
					}else if (resp.status == 303) {
						alert(resp.message);
					}
				}

			});
		}else{
			alert('Cancelado');
		}
		

	});




});
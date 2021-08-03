<?php 
session_start();
/**
 * 
 */
class Customers
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getCustomers(){
		$query = $this->con->query("SELECT `user_id`, `first_name`, `last_name`, `email`, `mobile`, `address1`, `address2`, `active`, `password` FROM `user_info`");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'Sin datos de clientes'];
	}


	public function getCustomersOrder(){
		$query = $this->con->query("SELECT o.order_id, o.product_id, o.qty, o.trx_id, o.p_status, p.product_title, p.product_image FROM orders o JOIN products p ON o.product_id = p.product_id");
		$ar = [];
		if (@$query->num_rows > 0) {
			while ($row = $query->fetch_assoc()) {
				$ar[] = $row;
			}
			return ['status'=> 202, 'message'=> $ar];
		}
		return ['status'=> 303, 'message'=> 'Sin ordenes todavia'];
	}


	public function updateCustomer($post = null){
		extract($post);
		if (!empty($first_name) && !empty($last_name) && !empty($email)&& !empty($password) && !empty($mobile) && !empty($address1) && !empty($address2) && !empty($active) && !empty($user_id)) {
			$q = $this->con->query("UPDATE user_info SET first_name = '$first_name', 
														last_name = '$last_name',
														email = '$email',
														password = '$password',
														mobile = '$mobile',
														address1 = '$address1',
														address2 = '$address2',
														active = '$active' 
														WHERE user_id = '$user_id'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Cliente actualizada'];
			}else{
				return ['status'=> 202, 'message'=> 'Fallo al ejecutar query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Correo invalido'];
		}

	}


	public function deleteCustomer($cid = null){
		if ($cid != null) {
			$q = $this->con->query("DELETE FROM user_info WHERE user_id = '$cid'");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Cliente removido'];
			}else{
				return ['status'=> 202, 'message'=> 'Fallo al ejecutar query'];
			}
			
		}else{
			return ['status'=> 303, 'message'=>'Id de cliente invalido'];
		}

	}
	

}


if (isset($_POST["GET_CUSTOMERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomers());
		exit();
	}
}

if (isset($_POST["GET_CUSTOMER_ORDERS"])) {
	if (isset($_SESSION['admin_id'])) {
		$c = new Customers();
		echo json_encode($c->getCustomersOrder());
		exit();
	}
}

if (isset($_POST['edit_customer'])) {
	if (!empty($_POST['user_id'])) {
		$p = new Customers();
		echo json_encode($p->updateCustomer($_POST));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Detalles invalidos']);
		exit();
	}
}


if (isset($_POST['DELETE_CUSTOMER'])) {
	if (!empty($_POST['cid'])) {
		$p = new Customers();
		echo json_encode($p->deleteCustomer($_POST['cid']));
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Detalles invalidos']);
		exit();
	}
}

?>
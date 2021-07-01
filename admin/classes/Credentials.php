<?php 
session_start();
/**
 * 
 */
class Credentials
{
	
	private $con;

	function __construct()
	{
		include_once("Database.php");
		$db = new Database();
		$this->con = $db->connect();
	}


	public function createAdminAccount($name, $email, $password){
		$q = $this->con->query("SELECT email FROM admin WHERE email = '$email'");
		if ($q->num_rows > 0) {
			return ['status'=> 303, 'message'=> 'El Email ya existe'];
		}else{
			$password = password_hash($password, PASSWORD_BCRYPT, ["COST"=> 8]);
			$q = $this->con->query("INSERT INTO `admin`(`name`, `email`, `password`, `is_active`) VALUES ('$name','$email','$password','0')");
			if ($q) {
				return ['status'=> 202, 'message'=> 'Admin Creado Satisfactoriamente'];
			}

		}
	}

	public function loginAdmin($email, $password){
		$q = $this->con->query("SELECT * FROM admin WHERE email = '$email' LIMIT 1");
		if ($q->num_rows > 0) {
			$row = $q->fetch_assoc();
			if (password_verify($password, $row['password'])) {
				$_SESSION['admin_name'] = $row['name'];
				$_SESSION['admin_id'] = $row['id'];
				return ['status'=> 202, 'message'=> 'Login Exitoso'];
			}else{
				return ['status'=> 303, 'message'=> 'Login Fallido'];
			}
		}else{
			return ['status'=> 303, 'message'=> 'Cuenta no creada con este correo'];
		}
	}

}


if (isset($_POST['admin_register'])) {
	extract($_POST);
	if (!empty($name) && !empty($email) && !empty($password) && !empty($cpassword)) {
		if ($password == $cpassword) {
			$c = new Credentials();
			$result = $c->createAdminAccount($name, $email, $password);
			echo json_encode($result);
			exit();
		}else{
			echo json_encode(['status'=> 303, 'message'=> 'Password no coincide']);
			exit();
		}
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Campos vacios']);
		exit();
	}
}

if (isset($_POST['admin_login'])) {
	extract($_POST);
	if (!empty($email) && !empty($password)) {
		$c = new Credentials();
		$result = $c->loginAdmin($email, $password);
		echo json_encode($result);
		exit();
	}else{
		echo json_encode(['status'=> 303, 'message'=> 'Campos Vacios']);
		exit();
	}
}


?>
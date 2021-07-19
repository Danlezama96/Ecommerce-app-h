
<?php
require('config/constants.php');

// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

// $server = $url["host"];
// $username = $url["user"];
// $password = $url["pass"];
// $db = substr($url["path"], 1);

// $con = new mysqli($server, $username, $password, $db);
// if(!isset($con)){
// 	echo 'Conexión Fallida en db : ', mysqli_connect_error();
	
// }

	$server = HOST;
	$username = USER;
	$password = PASSWORD;
	$db = DATABASE_NAME;


$con= new mysqli($server, $username, $password, $db);
if(!isset($con)){
	echo 'Erro en la conexión';
}

?>
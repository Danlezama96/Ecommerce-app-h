<?php

/**
 * 
 */
class Database
{
	
	private $con;
	public function connect(){

//Conexion a la base local
		// $this->con = new Mysqli("localhost", "khristian", "12345678", "ecommerceapp");
		// return $this->con;

//Connecion a la base de datos remota
		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);

		$this->con = new mysqli($server, $username, $password, $db);
		return $this->con;
	}
}

?>
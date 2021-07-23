<?php

/**
 * 
 */
class Database
{
	
	private $con;
	public function connect(){
	
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
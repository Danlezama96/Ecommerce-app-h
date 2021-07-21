<?php

/**
 * 
 */
class Database
{
	
	private $con;
	public function connect(){
		$this->con = new Mysqli("localhost", "khristian", "12345678", "ecommerceapp");
		return $this->con;
	}
}

?>
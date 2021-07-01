<?php

require "config/constants.php";

$servername = HOST;
$username = USER;
$password = PASSWORD;
$db = DATABASE_NAME;

// Crear conexion
$con = mysqli_connect($servername, $username, $password,$db);

// Ver conexion
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


?>
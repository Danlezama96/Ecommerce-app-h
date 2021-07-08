<?php

include "db.php"; 

$email = $_POST['email'];

$bytes = random_bytes(5);
$token =bin2hex($bytes);


include "mail_reset.php";
if($sent){
    $con->query("insert into passwords(email, token, code)
    values('$email', '$token', '$codigo') ");
    echo '<p>Se ha enviado un correo con un codigo para restablecer contraseña</p>'; 

}




?>

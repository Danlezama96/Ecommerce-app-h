<?php
// Varios destinatarios
$para  = $email . ', '; // atención a la coma
$para .= 'danlezama@msn.com';


// título
$título = 'Restablecer password';
$codigo= rand(1000,9999);

// mensaje
$mensaje = '
<html>
<head>
  <title>Restablecimiento de password</title>
</head>
<body>
<h1>Game Access Pro</h1>
<div style="text-align:center; background-color:#ccc">
    <p>Restablecer contraseña</p>
    <h3>'.$codigo.'</h3>
    <p> 
    <a 
            href="http://localhost/ecommerce-app-h/reset.php?email='.$email.'&token='.$token.'"> 
            para restablecer da click aqui </a> </p>
        
    <p> <small>Si usted no envio este codigo favor de omitir</small> </p>
</div>
  
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales

$cabeceras .= 'From: GAP Admin <admin@gameaccesspro.com>' . "\r\n";


// Enviarlo
$sent = false;
if(mail($para, $título, $mensaje, $cabeceras)){
    $sent = true;
}
?>

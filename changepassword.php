<?php 
    include "db.php";
    $email =$_POST['email'];
    $p1 =$_POST['p1'];
    $p2 =$_POST['p2'];
    if($p1 == $p2){
        $p1=md5($p1);
        $con->query("update user_info set password='$p1' where email='$email' ");
        echo "La contraseña ha sido cambiada con exito, regresa al menu principal";
        
    }else{
        echo "Las contraseñas no coinciden";
    }
?>
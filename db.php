<?php

//Conexión a la base de datos local
        // require "config/constants.php";

        // $servername = HOST;
        // $username = USER;
        // $password = PASSWORD;
        // $db = DATABASE_NAME;

        // // Crear conexion
        // $con = mysqli_connect($servername, $username, $password,$db);

        // // Ver conexion
        // if (!$con) {
        //     die("Connection failed: " . mysqli_connect_error());
        // }


//Conexión a la base de datos remota
        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

        $server = $url["host"];
        $username = $url["user"];
        $password = $url["pass"];
        $db = substr($url["path"], 1);

        $con = new mysqli($server, $username, $password, $db);
        if(!isset($con)){
        	echo 'Conexión Fallida en db : ', mysqli_connect_error();
            
        }




?>
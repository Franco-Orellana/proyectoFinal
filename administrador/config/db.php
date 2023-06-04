<?php 
    $host = "localhost";
    $database = "inmobiliaria";
    $usuario = "root";
    $contrasenia = "";

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$database", $usuario, $contrasenia);
        // if($conexion) { echo "Conectando... a sistema";}
    }
    catch (Exception $ex) {
        echo $ex -> getMessage();
    }
?>

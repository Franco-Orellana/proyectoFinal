<?php 
    $host = "containers-us-west-16.railway.app";
    $database = "inmobiliaria";
    $usuario = "root";
    $contrasenia = "As2tJUERfJ6nQNnERg19";
    $port = "6469";
    $dbname ="railway";

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$database", $usuario, $contrasenia);
        // if($conexion) { echo "Conectando... a sistema";}
    }
    catch (Exception $ex) {
        echo $ex -> getMessage();
    }
?>

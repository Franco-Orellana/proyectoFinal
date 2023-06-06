<?php 
    $host = $_ENV["DB_HOST"];
    $usuario = $_ENV["DB_USER"];
    $contrasenia = $_ENV["DB_PASSWORD"];
    $database = $_ENV["DB_NAME"];
    $port = $_ENV["DB_PORT"];

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$database", $usuario, $contrasenia);
        // if($conexion) { echo "Conectando... a sistema";}
    }
    catch (Exception $ex) {
        echo $ex -> getMessage();
    }
?>

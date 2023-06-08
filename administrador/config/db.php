<?php 
   /* $host = $_ENV["DB_HOST"];
    $usuario = $_ENV["DB_USER"];
    $contrasenia = $_ENV["DB_PASSWORD"];
    $database = $_ENV["DB_NAME"];
    $port = $_ENV["DB_PORT"];*/

    $host = "containers-us-west-16.railway.app";
    $usuario = "root";
    $contrasenia = "As2tJUERfJ6nQNnERg19";
    $database = "railway";

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$database", $usuario, $contrasenia);
        // if($conexion) { echo "Conectando... a sistema";}
    }
    catch (Exception $ex) {
        echo $ex -> getMessage();
    }
?>

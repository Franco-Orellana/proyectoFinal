<?php 
    $host = "containers-us-west-165.railway.app";
    $database = "inmobiliaria";
    $usuario = "root";
    $contrasenia = "e0WuMthO3MAc9wJcU5ge";
    $port = "6608";
    $dbname ="railway";

    try {
        $conexion = new PDO("mysql:host=$host;dbname=$database", $usuario, $contrasenia);
        // if($conexion) { echo "Conectando... a sistema";}
    }
    catch (Exception $ex) {
        echo $ex -> getMessage();
    }
?>

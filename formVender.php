<?php
    // Datos de cliente que completaron el formulario de la pagina vender
    $txtEmail = (isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
    $txtCliente = (isset($_POST['txtCliente']))?$_POST['txtCliente']:"";
    $txtTelefono = (isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
    $txtCategoria = (isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";
    $txtMensaje = (isset($_POST['txtMensaje']))?$_POST['txtMensaje']:"";


    include("administrador/config/db.php");

    if($txtEmail && $txtCliente && $txtTelefono && $txtCategoria && $txtMensaje){

        //Insertar datos en la tabla vender
        $sentenciaSQL = $conexion ->prepare("INSERT INTO vender (nombre_cliente, email_cliente, tel_cliente, tipo_propiedad, comentarios) VALUES (:nombre_cliente, :email_cliente, :tel_cliente, :tipo_propiedad, :comentarios)");
        $sentenciaSQL ->bindParam(':nombre_cliente',$txtCliente);
        $sentenciaSQL ->bindParam(':email_cliente',$txtEmail);
        $sentenciaSQL ->bindParam(':tel_cliente',$txtTelefono);
        $sentenciaSQL ->bindParam(':tipo_propiedad',$txtCategoria);
        $sentenciaSQL ->bindParam(':comentarios',$txtMensaje);
        $sentenciaSQL->execute();   
    }
?>  
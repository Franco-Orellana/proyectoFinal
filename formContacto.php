<?php
    // ID de la casa consultada
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";

    //  Recepcion de datos formulario Contacto 'Seccion Mensaje'
    $txtEmail = (isset($_POST['txtEmail']))?$_POST['txtEmail']:"";
    $txtCliente = (isset($_POST['txtCliente']))?$_POST['txtCliente']:"";
    $txtTelefono = (isset($_POST['txtTelefono']))?$_POST['txtTelefono']:"";
    $txtMensaje = (isset($_POST['txtMensaje']))?$_POST['txtMensaje']:"";

    //  Recepcion de datos formulario Contacto 'Seccion Visita'
    $txtEmailVisita = (isset($_POST['txtEmailVisita']))?$_POST['txtEmailVisita']:"";
    $txtClienteVisita = (isset($_POST['txtClienteVisita']))?$_POST['txtClienteVisita']:"";
    $txtTelVisita = (isset($_POST['txtTelVisita']))?$_POST['txtTelVisita']:"";
    $txtFecha = (isset($_POST['txtFecha']))?$_POST['txtFecha']:"";
    $txtHorario = (isset($_POST['txtHorario']))?$_POST['txtHorario']:"";


    include("administrador/config/db.php");

    if($txtID && $txtEmail && $txtCliente && $txtTelefono && $txtMensaje) {
        
        //Insertar datos en la tabla contacto
        $sentenciaSQL = $conexion ->prepare("INSERT INTO contacto (id_casa_consulta, email_cliente, nombre_cliente, tel_cliente, mensaje_cliente) VALUES (:id_casa_consulta, :email, :cliente, :telefono, :mensaje)");
        $sentenciaSQL ->bindParam(':id_casa_consulta',$txtID);
        $sentenciaSQL ->bindParam(':email',$txtEmail);
        $sentenciaSQL ->bindParam(':cliente',$txtCliente);
        $sentenciaSQL ->bindParam(':telefono',$txtTelefono);
        $sentenciaSQL ->bindParam(':mensaje',$txtMensaje);
        $sentenciaSQL ->execute();
    }

    if($txtID && $txtEmailVisita && $txtClienteVisita && $txtTelVisita && $txtFecha && $txtHorario) {
        
        //Insertar datos en la tabla visita
        $sentenciaSQL = $conexion ->prepare("INSERT INTO visita (id_casa_visita, cliente_visita, email_visita, telefono_visita, fecha_visita, horario_visita) VALUES (:id_casa_visita, :cliente_visita, :email_visita, :telefono_visita, :fecha_visita, :horario_visita)");
        $sentenciaSQL ->bindParam(':id_casa_visita',$txtID);
        $sentenciaSQL ->bindParam(':cliente_visita',$txtClienteVisita);
        $sentenciaSQL ->bindParam(':email_visita',$txtEmailVisita);
        $sentenciaSQL ->bindParam(':telefono_visita',$txtTelVisita);
        $sentenciaSQL ->bindParam(':fecha_visita',$txtFecha);
        $sentenciaSQL ->bindParam(':horario_visita',$txtHorario);
        $sentenciaSQL ->execute();
    }
?>

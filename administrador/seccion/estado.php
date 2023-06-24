<?php 
    
    include("../config/db.php");

    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";

    switch ($accion) {
        case 'btnVender':
            //Cambiar estado de los mensajes de venta
            $sentenciaSQL = $conexion ->prepare("SELECT estado FROM vender WHERE id_vender=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->execute();
            $estado = $sentenciaSQL->fetchColumn();
    
            $estado == 0 ? $estado = 1 : $estado = 0;
            
            $sentenciaSQL = $conexion ->prepare("UPDATE vender SET estado=:estado WHERE id_vender=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->bindParam(':estado', $estado);
            $sentenciaSQL ->execute();
            break;

        case 'btnVisita':
            //Cambiar estado de los mensajes de visita
            $sentenciaSQL = $conexion ->prepare("SELECT estado FROM visita WHERE id_visita=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->execute();
            $estado = $sentenciaSQL->fetchColumn();
    
            $estado == 0 ? $estado = 1 : $estado = 0;
            
            $sentenciaSQL = $conexion ->prepare("UPDATE visita SET estado=:estado WHERE id_visita=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->bindParam(':estado', $estado);
            $sentenciaSQL ->execute();
            break; 
        case 'btnConsultas':
            //Cambiar estado de los mensajes de consulta 
            $sentenciaSQL = $conexion ->prepare("SELECT estado FROM contacto WHERE id_contacto=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->execute();
            $estado = $sentenciaSQL->fetchColumn();
    
            $estado == 0 ? $estado = 1 : $estado = 0;
            
            $sentenciaSQL = $conexion ->prepare("UPDATE contacto SET estado=:estado WHERE id_contacto=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->bindParam(':estado', $estado);
            $sentenciaSQL ->execute();
            break; 
        case 'btnUsuario':
            //Cambiar estado de los mensajes de consulta 
            $sentenciaSQL = $conexion ->prepare("SELECT estado FROM usuarios WHERE id_usuario=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->execute();
            $estado = $sentenciaSQL->fetchColumn();
    
            $estado == 0 ? $estado = 1 : $estado = 0;
            
            $sentenciaSQL = $conexion ->prepare("UPDATE usuarios SET estado=:estado WHERE id_usuario=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->bindParam(':estado', $estado);
            $sentenciaSQL ->execute();
            break; 
    }
    
?>

<?php

    // Datos de presentacion en seccion productos
    $txtImagen = (isset($_FILES['txtImagen']['name']))?$_FILES['txtImagen']['name']:"";   
    $txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtUbicacion = (isset($_POST['txtUbicacion']))?$_POST['txtUbicacion']:"";
    $txtPrecio = (isset($_POST['txtPrecio']))?$_POST['txtPrecio']:"";
    $txtAnunciante = (isset($_POST['txtAnunciante']))?$_POST['txtAnunciante']:"";
    $txtCategoria = (isset($_POST['txtCategoria']))?$_POST['txtCategoria']:"";

    
    //Detalles de la casa
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
    $txtTitulo = (isset($_POST['txtTitulo']))?$_POST['txtTitulo']:"";
    $txtDescripcion = (isset($_POST['txtDescripcion']))?$_POST['txtDescripcion']:"";
    $txtMapa = (isset($_POST['txtMapa']))?$_POST['txtMapa']:"";
    $txtCantTotales = (isset($_POST['txtCantTotales']))?$_POST['txtCantTotales']:"";
    $txtCantCubiertos = (isset($_POST['txtCantCubiertos']))?$_POST['txtCantCubiertos']:"";
    $txtAmbientes = (isset($_POST['txtAmbientes']))?$_POST['txtAmbientes']:"";
    $txtBanios = (isset($_POST['txtBanios']))?$_POST['txtBanios']:"";
    $txtDormitorios = (isset($_POST['txtDormitorios']))?$_POST['txtDormitorios']:"";
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";


    include('../config/db.php'); 


    switch($accion) {

        case "Suspender":
            //Cambiar estado de la casa
            $sentenciaSQL = $conexion ->prepare("SELECT estado, fecha_venta FROM casas WHERE id=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->execute();
            $query = $sentenciaSQL->fetch(PDO::FETCH_LAZY);

            $estado = $query['estado'];
            $fecha = $query['fecha_venta'];
    
            $estado == 0 ? $estado = 1 : $estado = 0;
            $estado == 1 ? $fecha = date("Y-m-d") : $fecha = '';
            
            $sentenciaSQL = $conexion ->prepare("UPDATE casas SET estado=:estado, fecha_venta=:fecha WHERE id=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->bindParam(':estado', $estado);
            $sentenciaSQL ->bindParam(':fecha', $fecha);
            $sentenciaSQL ->execute();
        break;

        case "Agregar":
            //Insertar datos en la tabla detalles
            $sentenciaSQL = $conexion ->prepare("INSERT INTO detalles (titulo_completo, descripcion, mapa, cant_m2, cant_m2_cubierto, cant_ambientes, cant_banios, cant_dormitorios) VALUES (:titulo_completo, :descripcion, :mapa,:cant_m2, :cant_m2_cubierto, :cant_ambientes, :cant_banios, :cant_dormitorios)");
            $sentenciaSQL ->bindParam(':cant_m2',$txtCantTotales);
            $sentenciaSQL ->bindParam(':cant_m2_cubierto',$txtCantCubiertos);
            $sentenciaSQL ->bindParam(':cant_ambientes',$txtAmbientes);
            $sentenciaSQL ->bindParam(':cant_banios',$txtBanios);
            $sentenciaSQL ->bindParam(':cant_dormitorios',$txtDormitorios);
            $sentenciaSQL ->bindParam(':titulo_completo',$txtTitulo);
            $sentenciaSQL ->bindParam(':descripcion',$txtDescripcion);
            $sentenciaSQL ->bindParam(':mapa',$txtMapa);
            
            //Creacion de datos para las fotos ingresadas
            $file="";
            $file_tmp="";
            $data="";
            $fecha="";
            
            foreach ($_FILES["imagenes"]["name"] as $key => $val) {
                
                $fecha = new DateTime();
                $file=$fecha->getTimestamp()."_".$_FILES["imagenes"]["name"][$key];
                
                $file_tmp=$_FILES["imagenes"]["tmp_name"][$key];
                move_uploaded_file($file_tmp,"../../img/detalles/".$file);
                $data.=$file." ";
            }


            // Inserta los datos anteriores
            if($sentenciaSQL ->execute()){

                $id_tabla_detalles = $conexion ->lastInsertId();

                //Insertar datos en la tabla img al ejecutar la setencia anterio
                $sentenciaSQL = $conexion ->prepare("INSERT INTO imagenes (casa_img) VALUES (:imagenes)");
                $sentenciaSQL ->bindParam(':imagenes',$data);
            
                
                // Inserta los datos anteriores
                if($sentenciaSQL ->execute()){

                    $id_tabla_imagenes = $conexion ->lastInsertId();


                    //Insertar datos en la tabla casas
                    $sentenciaSQL = $conexion ->prepare("INSERT INTO casas (img_principal, titulo, id_categoria, anunciante, ubicacion, precio, id_detalles, id_imagenes) VALUES (:img_principal, :titulo, :categoria, :anunciante, :ubicacion, :precio, :id_detalles, :id_imagenes)");
                    $sentenciaSQL ->bindParam(':id_detalles',$id_tabla_detalles);
                    $sentenciaSQL ->bindParam(':id_imagenes',$id_tabla_imagenes);
                    $sentenciaSQL ->bindParam(':anunciante',$txtAnunciante);


                    $sentenciaSQL ->bindParam(':categoria',$txtCategoria);
                    $sentenciaSQL ->bindParam(':precio',$txtPrecio);

                    $primerLetra = ucfirst($txtNombre);
                    $sentenciaSQL ->bindParam(':titulo',$primerLetra);

                    $primerasLetrasMayus = ucwords($txtUbicacion);
                    $sentenciaSQL ->bindParam(':ubicacion',$primerasLetrasMayus);


                    $fecha = new DateTime();
                    $nombreArchivo = ($txtImagen != "")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";

                    $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

                    if($tmpImagen != "") {
                        move_uploaded_file($tmpImagen, "../../img/casas/".$nombreArchivo);
                    }

                    $sentenciaSQL ->bindParam(':img_principal',$nombreArchivo);
                    $sentenciaSQL ->execute();
                }
            }
            header("Location:../inicio.php");
        break;

        case "Modificar":

            $sentenciaSQL = $conexion ->prepare("UPDATE casas SET titulo=:nombre, id_categoria=:categoria, anunciante=:anunciante, ubicacion=:ubicacion, precio=:precio WHERE id=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->bindParam(':precio',$txtPrecio);
            $sentenciaSQL ->bindParam(':categoria',$txtCategoria);
            $sentenciaSQL ->bindParam(':anunciante',$txtAnunciante);


            $primerLetra = ucfirst($txtNombre);
            $sentenciaSQL ->bindParam(':nombre',$primerLetra);

            $primerasLetrasMayus = ucwords($txtUbicacion);
            $sentenciaSQL ->bindParam(':ubicacion',$primerasLetrasMayus);
            $sentenciaSQL ->execute();

            //Cargo datos de foto ingresada y borro la existente
            if($txtImagen != "") { 
                $fecha = new DateTime();
                $nombreArchivo = ($txtImagen != "")?$fecha->getTimestamp()."_".$_FILES["txtImagen"]["name"]:"imagen.jpg";   
                $tmpImagen = $_FILES["txtImagen"]["tmp_name"];

                move_uploaded_file($tmpImagen, "../../img/casas/".$nombreArchivo);

                $sentenciaSQL = $conexion ->prepare("SELECT img_principal FROM casas WHERE id=:id");
                $sentenciaSQL ->bindParam(':id',$txtID);
                $sentenciaSQL ->execute();
                $casa = $sentenciaSQL ->fetch(PDO::FETCH_LAZY);

                

                if(isset($casa["img_principal"]) && ($casa["img_principal"] != "imagen.jpg")){
                    if(file_exists("../../img/casas/".$casa["img_principal"])) {
                        unlink("../../img/casas/".$casa["img_principal"]);
                    }
                }

                $sentenciaSQL = $conexion ->prepare("UPDATE casas SET img_principal=:imagen WHERE id=:id");
                $sentenciaSQL ->bindParam(':id',$txtID);
                $sentenciaSQL ->bindParam(':imagen',$txtImagen);
                $sentenciaSQL ->execute();
            }

            $sentenciaSQL = $conexion ->prepare("SELECT id_detalles, id_imagenes FROM casas WHERE id=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->execute();
            $casa = $sentenciaSQL ->fetch(PDO::FETCH_LAZY);

            //Guardo las id de las tablas necesarias en variables
            $id_tabla_detalles = $casa["id_detalles"];
            $id_tabla_imagenes = $casa["id_imagenes"];



            //Actualizacion tabla detalles
            $sentenciaSQL = $conexion ->prepare("UPDATE detalles 
                                                SET titulo_completo=:titulo_completo, descripcion=:descripcion, mapa=:mapa, cant_m2=:cant_m2,
                                                    cant_m2_cubierto=:cant_m2_cubierto, cant_ambientes=:cant_ambientes, 
                                                    cant_banios=:cant_banios, cant_dormitorios=:cant_dormitorios
                                                WHERE id_detalles=:id_detalles
                                                ");

            $sentenciaSQL ->bindParam(':id_detalles',$id_tabla_detalles);
            $sentenciaSQL ->bindParam(':cant_m2',$txtCantTotales);
            $sentenciaSQL ->bindParam(':cant_m2_cubierto',$txtCantCubiertos);
            $sentenciaSQL ->bindParam(':cant_ambientes',$txtAmbientes);
            $sentenciaSQL ->bindParam(':cant_banios',$txtBanios);
            $sentenciaSQL ->bindParam(':cant_dormitorios',$txtDormitorios);
            $sentenciaSQL ->bindParam(':titulo_completo',$txtTitulo);
            $sentenciaSQL ->bindParam(':descripcion',$txtDescripcion);
            $sentenciaSQL ->bindParam(':mapa',$txtMapa);
            $sentenciaSQL ->execute();
            

            if((count($_FILES["imagenes"]["name"])) == 10){

                //Creacion de datos para las fotos ingresadas
                $file="";
                $file_tmp="";
                $data="";
                $fecha="";
                
                foreach ($_FILES["imagenes"]["name"] as $key => $val) {
                    
                    $fecha = new DateTime();
                    $file=$fecha->getTimestamp()."_".$_FILES["imagenes"]["name"][$key];
                    
                    $file_tmp=$_FILES["imagenes"]["tmp_name"][$key];
                    move_uploaded_file($file_tmp,"../../img/detalles/".$file);
                    $data.=$file." ";
                }


                //Busco la imagen en la carpeta y la borro
                $sentenciaSQL = $conexion->prepare("SELECT casa_img FROM imagenes WHERE id_img=:id_imagenes");
                $sentenciaSQL ->bindParam(':id_imagenes',$id_tabla_imagenes);
                $sentenciaSQL->execute();
                $listadoDeImagenes = $sentenciaSQL->fetch(PDO::FETCH_BOTH);

                $res = $listadoDeImagenes['casa_img'];
                
                $res = explode(" ", $res);
                $count = count($res);

                for ($i=0; $i < $count; ++$i) { 
                    if(is_file("../../img/detalles/".$res[$i])) {
                        unlink("../../img/detalles/".$res[$i]);
                    }
                }

                //Insertar datos en la tabla imagenes al ejecutar la setencia anterio
                $sentenciaSQL = $conexion ->prepare("UPDATE imagenes SET casa_img=:imagenes WHERE id_img=:id_imagenes");
                $sentenciaSQL ->bindParam(':imagenes',$data);
                $sentenciaSQL ->bindParam(':id_imagenes',$id_tabla_imagenes);
                $sentenciaSQL ->execute();

            }
            header("Location:../inicio.php");

        break;

        case "Borrar":

            $sentenciaSQL = $conexion ->prepare("SELECT * FROM casas WHERE casas.id=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);
            $sentenciaSQL ->execute();

            // Guarda todos los datos obtenidos en un array
            $casa = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

            //Guardo los valores de las llaves en variables 
            $id_tabla_detalles = $casa['id_detalles'];
            $id_tabla_imagenes = $casa['id_imagenes'];

            //Busco la imagen en la carpeta y la borro
            if(isset($casa["img_principal"]) && ($casa["img_principal"] != "imagen.jpg")){
                if(file_exists("../../img/casas/".$casa["img_principal"])) {
                    unlink("../../img/casas/".$casa["img_principal"]);
                }
            }


            //Busco la imagen en la carpeta y la borro
            $sentenciaSQL = $conexion->prepare("SELECT casas.id, imagenes.casa_img FROM casas INNER JOIN imagenes  ON casas.id_imagenes = imagenes.id_img WHERE casas.id");
            $sentenciaSQL->execute();
            $listadoDeImagenes = $sentenciaSQL->fetch(PDO::FETCH_BOTH);

            $res = $listadoDeImagenes['casa_img'];
            
            $res = explode(" ", $res);
            $count = count($res);

            for ($i=0; $i < $count; ++$i) { 
                if(file_exists("../../img/detalles/".$res[$i])) {
                    unlink("../../img/detalles/".$res[$i]);
                }
            }

            //Borro todos los datos de las tablas de la base de datos
            $sentenciaSQL = $conexion ->prepare("DELETE FROM contacto WHERE id_casa_consulta=:id");
            $sentenciaSQL ->bindParam(':id',$txtID);

            if($sentenciaSQL ->execute()) {
                $sentenciaSQL = $conexion ->prepare("DELETE FROM detalles WHERE id_detalles=:id_tabla_detalles");
                $sentenciaSQL ->bindParam(':id_tabla_detalles',$id_tabla_detalles); 
                
                if($sentenciaSQL ->execute()){
                    $sentenciaSQL = $conexion ->prepare("DELETE FROM imagenes WHERE id_img=:id_tabla_imagenes");
                    $sentenciaSQL ->bindParam(':id_tabla_imagenes',$id_tabla_imagenes);
    
                    if($sentenciaSQL ->execute()){
                        $sentenciaSQL = $conexion ->prepare("DELETE FROM casas WHERE id=:id");
                        $sentenciaSQL ->bindParam(':id',$txtID);
                        $sentenciaSQL ->execute();
        
                    }
                }
            }

            header("Location:../inicio.php");
        break;
    }

?>
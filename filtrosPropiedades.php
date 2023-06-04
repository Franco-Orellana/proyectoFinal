<?php 

    include("./administrador/config/db.php");


    // Uso de los botones de categorias
    $selectMin = (isset($_POST['selectMin']))?$_POST['selectMin']:"0";    
    $selectMax = (isset($_POST['selectMax']))?$_POST['selectMax']:"100000000000";    
    $anunciante = (isset($_POST['anunciante']))?$_POST['anunciante']:"";    
    $propiedad = (isset($_POST['propiedad']))?$_POST['propiedad']:"";    
    $superficie = (isset($_POST['superficie']))?$_POST['superficie']:"";    
    $ambientes = (isset($_POST['ambientes']))?$_POST['ambientes']:"";    
    $dormitorios = (isset($_POST['dormitorios']))?$_POST['dormitorios']:"";    
    $banios = (isset($_POST['banios']))?$_POST['banios']:"";    
    $supDesde = (!empty($_POST['supDesde']))?$_POST['supDesde']:"0";    
    $supHasta = (!empty($_POST['supHasta']))?$_POST['supHasta']:"100000";   


    //query para filtros
    $extra_query = " ";

    if($propiedad){

        $casas["categorias.nombre_categoria"] = $propiedad;

        $values = [];
        $query = [];

        foreach ($casas as $key => $value) {
            foreach($value as $valor){
                $values [$key][] = "{$key} = '{$valor}'";
            }
        }

        foreach($values as $key => $value){
            $query [$key] = "(".implode(" OR ", $value).")";
        }
            
        $extra_query.= " AND ".implode(" ", $query);
    }

    //Sentencia de busqueda
    if($superficie == 'Cubierta'){

        $query ="SELECT casas.id, casas.titulo, casas.ubicacion, casas.precio, casas.anunciante, casas.img_principal
                FROM casas 
                INNER JOIN detalles ON casas.id_detalles = detalles.id_detalles
                INNER JOIN categorias  ON casas.id_categoria = categorias.id_categoria
                WHERE casas.bajado = 0
                AND detalles.cant_ambientes LIKE '%$ambientes'
                AND detalles.cant_dormitorios LIKE '%$dormitorios' 
                AND detalles.cant_banios LIKE '%$banios'
                AND anunciante LIKE '%$anunciante' 
                AND detalles.cant_m2_cubierto BETWEEN ".$supDesde." AND ".$supHasta."
                AND precio BETWEEN ".$selectMin." AND ".$selectMax."
            ".$extra_query;

        $sentenciaSQL = $conexion->prepare($query);
        $sentenciaSQL ->execute();
        $listadoDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);  

    }else if ($superficie == 'Total') {
        $query ="SELECT casas.id, casas.titulo, casas.ubicacion, casas.precio, casas.anunciante, casas.img_principal
                FROM casas 
                INNER JOIN detalles ON casas.id_detalles = detalles.id_detalles
                INNER JOIN categorias  ON casas.id_categoria = categorias.id_categoria
                WHERE casas.bajado = 0
                AND detalles.cant_ambientes LIKE '%$ambientes'
                AND detalles.cant_dormitorios LIKE '%$dormitorios' 
                AND detalles.cant_banios LIKE '%$banios' 
                AND anunciante LIKE '%$anunciante' 
                AND detalles.cant BETWEEN ".$supDesde." AND ".$supHasta."
                AND precio BETWEEN ".$selectMin." AND ".$selectMax."
            ".$extra_query;

        $sentenciaSQL = $conexion->prepare($query);
        $sentenciaSQL ->execute();
        $listadoDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);  
    }

    // Grid de card de las casas
    foreach($listadoDeCasas as $casas) {
        echo' 
            <div class="productos__card" data-sort='.$casas['precio'].'>
                <div class="productos__card__img"><img src="./img/casas/'.$casas['img_principal'].'" alt=""></div>
                <div class="productos__card__desc">
                    <div class="productos__card__desc__titulo">
                        <h3>'.$casas['titulo'].'</h3>
                        <span class="venta">venta</span>
                    </div>
                    <span><i class="bi bi-geo-alt-fill"></i></span>
                    <span class="productos__card__desc--ubicacion">'.$casas['ubicacion'].'</span>
                    <div class="productos__card__precio">
                        <h3>$'.number_format($casas['precio'], 0, ',', '.').' USD</h3>
                        <a href="./detalles.php?producto='.$casas['id'].'" target="_blank" class="btn-productos">Ver detalles</a>       
                    </div>
                </div>
            </div>
        ';
    }
    ;
?>
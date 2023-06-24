<?php include('template/cabezera.php'); ?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Información Importante</h1>
    </div>

    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cantidad de prop. en venta</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                
                                <?php
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT COUNT(*) total FROM casas WHERE estado = 0");
                                    $resultado->execute();
                                    $total = $resultado->fetchColumn();
                                    echo $total;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Valuación en total de las prop.</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT SUM(precio) AS value_sum FROM casas WHERE estado = 0");
                                    $resultado->execute();

                                    $row = $resultado->fetch(PDO::FETCH_ASSOC);
                                    $sum = $row['value_sum'];

                                    if ($sum == 0) echo '$ '. 0;
                                    else echo '$ ' . number_format($sum, 0, ',', '.');
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Consultas pendientes</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT COUNT(*) total FROM contacto WHERE estado = 0");
                                    $resultado->execute();
                                    $total = $resultado->fetchColumn();
                                    echo $total;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="d-flex align-items-center">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Solicitudes de venta</div>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Solicitudes recibidas en la última semana" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT COUNT(*) total FROM vender WHERE estado = 0");
                                    $resultado->execute();
                                    $total = $resultado->fetchColumn();
                                    echo $total;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-home fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="d-flex align-items-center">
                                <div class="text-xs font-weight-bold text-primary text-uppercase">Cantidad de ingresos</div>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresos registrados en la última semana" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button>  
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $hoy = date("Y-m-d");
                                    $fecha2 = date("Y-m-d", strtotime($hoy ."- 7 days"));

                                    $resultado = $conexion->prepare("SELECT COUNT(*) FROM casas WHERE fecha_venta = '0000-00-00' AND fecha_alta BETWEEN '$fecha2' AND '$hoy'");
                                    $resultado->execute();
                                    $cant = $resultado->fetchColumn();
                                    echo $cant;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-plus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="d-flex align-items-center">
                                <div class="text-xs font-weight-bold text-success text-uppercase">Valuación de últ. ingresos</div>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cálculo realizado en base a los ingresos de la última semana" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $hoy = date("Y-m-d");
                                    $fecha2 = date("Y-m-d", strtotime($hoy ."- 7 days"));

                                    $resultado = $conexion->prepare("SELECT SUM(precio) AS value_sum FROM casas WHERE fecha_venta = '0000-00-00' AND fecha_alta BETWEEN '$fecha2' AND '$hoy';");
                                    $resultado->execute();
                                    $sum = $resultado->fetchColumn();

                                    if ($sum == 0) echo '$ '. 0;
                                    else echo '$ ' . number_format($sum, 0, ',', '.');
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="d-flex align-items-center">
                                <div class="text-xs font-weight-bold text-info text-uppercase">Prop. más consultada</div>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="En base a las consultas realizadas en la última semana" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT icv.id_casa_visita,COUNT(*)
                                        FROM visita icv 
                                        GROUP BY icv.id_casa_visita
                                        HAVING COUNT(*)=(
                                        SELECT MAX(n) FROM (
                                            SELECT icv.id_casa_visita, COUNT(*) n
                                                FROM visita icv
                                                GROUP BY icv.id_casa_visita  
                                        ) c1  
                                        );
                                    ");

                                    $resultado->execute();
                                    $casa = $resultado->fetchColumn();

                                    echo "<a href='../detalles.php?producto=$casa' target='_blank' class='text-dark'>Ver propiedad</a>";
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-arrow-circle-up fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="d-flex align-items-center">
                                <div class="text-xs font-weight-bold text-danger text-uppercase">Prop. menos consultada</div>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="En base a las consultas realizadas en la última semana" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php

                                    //https://es.stackoverflow.com/questions/446997/consulta-mysql-%c3%banicamente-del-registro-que-m%c3%a1s-se-repite
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT icv.id_casa_visita,COUNT(*)
                                        FROM visita icv
                                        GROUP BY icv.id_casa_visita
                                        HAVING COUNT(*)=(
                                        SELECT MIN(n) FROM (
                                            SELECT icv.id_casa_visita, COUNT(*) n
                                                FROM visita icv
                                                GROUP BY icv.id_casa_visita  
                                        ) c1  
                                        );
                                    ");

                                    $resultado->execute();
                                    $casa = $resultado->fetchColumn();

                                    echo "<a href='../detalles.php?producto=$casa' target='_blank' class='text-dark'>Ver propiedad</a>";
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-arrow-circle-down fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="d-flex align-items-center"> 
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Cantidad de ventas</div>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="En base a las propiedades que fueron dadas de baja del sitio en la última semana" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $hoy = date("Y-m-d");
                                    $fecha2 = date("Y-m-d", strtotime($hoy ."- 7 days"));

                                    $resultado = $conexion->prepare("SELECT COUNT(*) FROM casas WHERE fecha_venta BETWEEN '$fecha2' AND '$hoy'");
                                    $resultado->execute();
                                    $cant = $resultado->fetchColumn();
                                    echo $cant;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-minus fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="d-flex align-items-center"> 
                                <div class="text-xs font-weight-bold text-success text-uppercase">Dinero obtenido por ventas</div>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cálculo realizado en base a las ventas registradas en la última semana" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $hoy = date("Y-m-d");
                                    $fecha2 = date("Y-m-d", strtotime($hoy ."- 7 days"));

                                    $resultado = $conexion->prepare("SELECT SUM(precio) AS value_sum FROM casas WHERE fecha_venta BETWEEN '$fecha2' AND '$hoy';");
                                    $resultado->execute();
                                    $sum = $resultado->fetchColumn();

                                    if ($sum == 0) echo '$ '. 0;
                                    else echo '$ ' . number_format($sum, 0, ',', '.');
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Zona con más prop. en venta</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT c.ubicacion,COUNT(*)
                                        FROM casas c 
                                        WHERE c.estado = 0
                                        GROUP BY c.ubicacion
                                        HAVING COUNT(*)=(
                                        SELECT MAX(2) FROM (
                                            SELECT c.ubicacion, COUNT(*) n
                                                FROM casas c
                                                GROUP BY c.ubicacion
                                        ) c1
                                        );
                                    ");

                                    $resultado->execute();
                                    $zona = $resultado->fetchColumn();

                                    echo $zona == '' ? 'N/D' : $zona;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Zona con menos prop. en venta</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                    include("./config/db.php");

                                    $resultado = $conexion->prepare("SELECT c.ubicacion,COUNT(*)
                                        FROM casas c 
                                        WHERE c.estado = 0
                                        GROUP BY c.ubicacion
                                        HAVING COUNT(*)=(
                                        SELECT MIN(n) FROM (
                                            SELECT c.ubicacion, COUNT(*) n
                                                FROM casas c
                                                GROUP BY c.ubicacion  
                                        ) c1  
                                        );
                                    ");

                                    $resultado->execute();
                                    $zona = $resultado->fetchColumn();

                                    echo $zona == '' ? 'N/D' : $zona;
                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Begin Page Content -->

    <div class="container-fluid px-0 mt-5">
        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">Propiedades registradas</h1>
        
        <button type="button" class="d-flex align-items-center btn btn-success mb-4" data-bs-toggle="modal" data-bs-target="#agregarCasa">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            <span class="ml-1">Agregar propiedad</span>
        </button>


        <?php  
            include("./config/db.php");
            
            $sentenciaSQL = $conexion->prepare("SELECT  casas.id, casas.img_principal, casas.anunciante, casas.ubicacion, casas.precio, casas.estado,
                                                        casas.categoria, detalles.titulo_completo, 
                                                        detalles.descripcion, detalles.mapa, detalles.cant_m2, detalles.cant_m2_cubierto, 
                                                        detalles.cant_ambientes, detalles.cant_banios, detalles.cant_dormitorios, imagenes.casa_img
                                                FROM casas 
                                                INNER JOIN detalles ON casas.id_detalles = detalles.id_detalles
                                                INNER JOIN imagenes  ON casas.id_imagenes = imagenes.id_img
                                            ");
            $sentenciaSQL->execute();
            $listadoDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?> 

        <div class="table-responsive">
            <table id="dataTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th style="min-width: 150px">Imagen Principal</th>
                        <th>Categoría</th>
                        <th style="min-width: 200px">Anunciante</th>
                        <th style="min-width: 200px">Ubicación</th>
                        <th style="min-width: 70px">Precio</th>
                        <th style="min-width: 70px">Detalles</th>
                        <th>Acción</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listadoDeCasas as $casas) {?>

                        <tr>
                            <td class="align-middle"><?php echo $casas['id']?></td> 
                            <td><img style="height: 50px;" src="../img/casas/<?php echo $casas['img_principal']?>" alt=""></td>
                            <td class="align-middle"><?php echo $casas['categoria']?></td>
                            <td class="align-middle"><?php echo $casas['anunciante']?></td>
                            <td class="align-middle"><?php echo $casas['ubicacion']?></td>
                            <td class="align-middle">$<?php echo number_format($casas['precio'], 0, ',', '.')?></td>
                            <td>
                                <form method="POST" action="./seccion/tablaDetalles.php" target="_self">
                                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $casas['id']?>">
                                    <button type="submit" name="Ver" value="Ver" class="btn btn-dark w-100">VER</button>
                                </form>
                            </td> 
                            <td>
                                <div class="d-flex">
                                   <form>
                                        <button type="submit" id="btnSuspender" value="<?php echo $casas['id']?>" class="btn <?php echo $casas['estado'] == 0 ? 'btn-success' : 'btn-danger'?>">
                                            <i class="bi <?php echo $casas['estado'] == 0 ? 'bi-check-lg' : 'bi-x-lg'?>"></i>
                                        </button>
                                    </form> 
                                    <form id="formModificarDatos" class="mx-2">
                                        <button type="submit" id="btnModificar" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modificarCasa" value="<?php echo $casas['id']?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <form method="POST" action="./seccion/crud.php" target="_self">
                                        <input type="hidden" name="txtID" id="txtID" value="<?php echo $casas['id']?>">
                                        <button type="submit" name="accion" value="Borrar" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    <!-- /.container-fluid -->



    <!-- Modal INSERTAR DATO-->
    <div class="modal fade" id="agregarCasa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Registrar una nueva propiedad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="./seccion/crud.php" target="_self" id="formPresentacion">
                    <div class="modal-body container p-0">
                        <div class="row align-items-center gy-2 card-body">
                            <div class="form-group col-lg-4 col-md-6">
                                <label for="txtImagen" class="mb-2">Imagen Principal:</label>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar la foto más representativa de la propiedad." style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                                <input type="file" name="txtImagen" id="txtImagen" class="form-control" required>
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label for="txtNombre" class="mb-2">Título acortado:</label>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar un texto menor a 23 letras, contando los espacios, de lo contrario este no entrará en la presentación." style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                                <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ej: Casa lujosa" required>
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label for="txtUbicacion" class="mb-2">Ubicación:</label>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar lugar donde se sitúa la propiedad." style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                                <input type="text" name="txtUbicacion" id="txtUbicacion" class="form-control" placeholder="Ej: Palermo, Buenos Aires" required>
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label for="txtDireccion" class="mb-2">Dirección:</label>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar la dirección específica de la propiedad." style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                                <input type="text" name="txtDireccion" id="txtDireccion" class="form-control" placeholder="Ej: 11 de Septiembre 1900" required>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <label for="txtAnunciante" class="mb-2">Anunciante:</label>
                                <select class="form-select" name="txtAnunciante">
                                    <option selected disabled>Seleccionar</option>
                                    <option>Inmobiliaria</option>
                                    <option>Dueño directo</option>   
                                </select>
                            </div>
                            <div class="form-group col-lg-3 col-md-6">
                                <label for="txtCategoria" class="mb-2">Tipo de propiedad:</label>
                                <select class="form-select" name="txtCategoria">
                                <option selected disabled>Seleccionar</option>
                                    <?php 
                                        include("./config/db.php");
                    
                                        $sentenciaSQL = $conexion -> prepare("SELECT * FROM categorias");
                                        $sentenciaSQL -> execute();
                                        foreach ($sentenciaSQL as $categorias) {
                                            echo "<option value='".$categorias['nombre_categoria']."'>".$categorias['nombre_categoria']."</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group col-lg-2 col-md-6">
                                <label for="txtPrecio" class="mb-2">Precio:</label>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingresar precio sin puntos ni comas." style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                                <input type="text" name="txtPrecio" id="txtPrecio" class="form-control" placeholder="Ej: 23415" required>
                            </div>
                        </div>
                        <div class="dropdown-divider mb-2 mt-0"></div>
                        <div class="row align-items-center gy-2 card-body">
                            <div class="form-group col-lg-4 col-md-6">
                                <label for="txtTitulo" class="mb-2">Titulo completo:</label>
                                <input type="text" name="txtTitulo" id="txtTitulo" class="form-control" placeholder="Ej: Casa lujosa con vista al mar" required>
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label for="txtMapa" class="mb-2">Ubicación en mapa:</label>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Luego de ir a 'compartir', en la pestaña 'Incorporar un mapa', copie el texto que se encuentra entre comillas dentro de 'src' y peguelo aquí" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button> 
                                <input type="text" id="txtMapa" name="txtMapa"class="form-control" placeholder="Ej: https://www.google.com/maps/..." required>
                            </div>
                            <div class="form-group col-lg-4 col-md-6">
                                <label for="formFileMultiple" class="form-label">Fotos de la propiedad:</label>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Ingrese 10 fotos, las primeras 4 fotos deben ser del exterior de la propiedad y las 6 restantes del interior" style="border:none; background:none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                                    </svg>
                                </button>    
                                    
                                <input class="form-control" type="file" name="imagenes[]" id="formFileMultiple" multiple required>
                            </div>
                            
                            <div class="form-group col-lg col-sm-12 col-md-6">
                                <label for="txtCantTotales" class="mb-2">Cantidad de m² totales:</label>
                                <input type="text" name="txtCantTotales" id="txtCantTotales" class="form-control" placeholder="Ej: 105" required>
                            </div>
                            <div class="form-group col-lg col-sm-12 col-md-6">
                                <label for="txtCantCubiertos" class="mb-2">Cantidad de m² cubiertos:</label>
                                <input type="text" name="txtCantCubiertos" id="txtCantCubiertos" class="form-control" placeholder="Ej: 84" required>
                            </div>
                            <div class="form-group col-lg col-sm-12 col-md-6">
                                <label for="txtAmbientes" class="mb-2">Cantidad de ambientes:</label>
                                <input type="text" name="txtAmbientes" id="txtAmbientes" class="form-control" placeholder="Ej: 3" required>
                            </div>
                            <div class="form-group col-lg col-sm-12 col-md-6">
                                <label for="txtBanios" class="mb-2">Cantidad de baños:</label>
                                <input type="text" name="txtBanios" id="txtBanios" class="form-control" placeholder="Ej: 2" required>
                            </div>
                            <div class="form-group col-lg col-sm-12 col-md-6">
                                <label for="txtDormitorios" class="mb-2">Cantidad de dormitorios:</label>
                                <input type="text" name="txtDormitorios" id="txtDormitorios" class="form-control" placeholder="Ej: 2" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="txtDescripcion" class="mb-2">Descripción:</label>
                                <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="10" style="resize:none;" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" role="group">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" name="accion" value="Agregar" class="btn btn-success">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal MODIFICAR DATOS -->
    <div class="modal fade" id="modificarCasa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalToggleLabel">Modificar datos de propiedad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data" action="./seccion/crud.php" target="_self" id="formModificarCasa">
                    
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<script>
    $(document).on('click', '#btnSuspender', function(e){

        e.preventDefault();

        $(this).toggleClass("btn-success btn-danger");
        $(this).children("i").toggleClass("bi-check-lg bi-x-lg");

        if (this.click) {

            var dato = { txtID : $( this ).val(), accion: 'Suspender'};
            console.log( dato );
    
            $.ajax({
                type: "POST",
                url: "./seccion/crud.php",
                data: dato
            });
        }
    });
</script>

<script>
    
    $(document).ready(function(){

        $(document).on('click', '#btnModificar', function(e){

            e.preventDefault();

            if (this.click) {

                var dato = { id : $( this ).val()};
                console.log( dato );
        
                $.ajax({
                    type: "POST",
                    url: "./formModificarCasa.php",
                    data: dato,
                    success: function(data) {
                        document.getElementById("formModificarCasa").innerHTML = data;
                        document.getElementById("formModificarDatos").reset();
                    }
                });
            }

        });
    });
</script>


<?php include('template/pie.php'); ?>


<?php include("../template/cabezera.php") ?>    

</style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detalles de la propiedad</h1>
        <p class="mb-4">Tabla con los detalles de la propiedad seleccionada.</p>

        <a class="d-flex align-items-center btn btn-outline-dark mb-4" href="../inicio.php" style="width: fit-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            <span class="mx-2">Inicio</span>
        </a>

        <?php  
            include("../config/db.php");

            $txtID = (isset($_POST['txtID']))?$_POST['txtID']:"";
            
            $sentenciaSQL = $conexion->prepare("SELECT casas.id, casas.ubicacion, casas.direccion, detalles.titulo_completo, detalles.descripcion, 
                                                detalles.mapa,detalles.cant_m2, detalles.cant_m2_cubierto, 
                                                detalles.cant_ambientes, detalles.cant_banios, detalles.cant_dormitorios, imagenes.casa_img
                                                FROM casas 
                                                INNER JOIN detalles ON casas.id_detalles = detalles.id_detalles
                                                INNER JOIN imagenes  ON casas.id_imagenes = imagenes.id_img
                                                WHERE casas.id LIKE '%$txtID'
                                            ");
            $sentenciaSQL->execute();
            $listadoDeDetallesDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?> 


        <div class="table-responsive">
            <table id="tableDesc" class="display" style="width:100%">
                <thead>
                   <tr>
                        <th style="min-width: 70px">ID</th>
                        <th style="min-width: 180px">Título completo</th> 
                        <th>Imagenes</th>
                        <th>Descripción</th>
                        <th>Ubicación</th>
                        <th style="min-width: 130px">Cant. m² totales</th>
                        <th style="min-width: 160px">Cant. m² cubiertos</th>
                        <th style="min-width: 130px">Cant. ambientes</th>
                        <th style="min-width: 130px">Cant. baños</th>
                        <th style="min-width: 130px">Cant. dormitorios</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listadoDeDetallesDeCasas as $casas) {?>

                        <tr>
                            <td class="align-middle"><?php echo $casas['id']?></td>
                            <td class="align-middle"><?php echo $casas['titulo_completo']?></td> 
                            <td>
                                <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#modalImagenes">
                                    VER
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info w-100" data-bs-toggle="modal" data-bs-target="#ModalDescripcion">
                                    VER
                                </button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#modalUbicacion">
                                    VER
                                </button>
                            </td>
                            <td class="align-middle"><?php echo $casas['cant_m2']?></td>
                            <td class="align-middle"><?php echo $casas['cant_m2_cubierto']?></td>
                            <td class="align-middle"><?php echo $casas['cant_ambientes']?></td>
                            <td class="align-middle"><?php echo $casas['cant_banios']?></td>
                            <td class="align-middle"><?php echo $casas['cant_dormitorios']?></td>
                        </tr>


                        <!-- Modal VER IMAGENES-->
                        <div class="modal fade" id="modalImagenes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Imagenes de la propiedad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <div class="row g-2 overflow-hidden">
                                        <?php
                                            $sentenciaSQL = $conexion->prepare("SELECT casas.id, imagenes.casa_img FROM casas INNER JOIN imagenes  ON casas.id_imagenes = imagenes.id_img WHERE casas.id LIKE '%$txtID'");
                                            $sentenciaSQL->execute();
                                            $listadoDeCasas = $sentenciaSQL->fetch(PDO::FETCH_BOTH);

                                            $res = $listadoDeCasas['casa_img'];
                                            
                                            $res = explode(" ", $res);

                                            $count = count($res);

                                            for ($i=$count; $i > 0; --$i) { 
                                                ?>
                                                    <img class="rounded" src="../../img/detalles/<?php echo $res[$i]?>" alt="">
                                                <?php
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        

                        <!-- Modal VER DETALLES-->
                        <div class="modal fade" id="ModalDescripcion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Descripción de la propiedad</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php echo nl2br($casas['descripcion'])?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        
                        
                        <!-- Modal VER UBICACION EN MAPA-->
                        <div class="modal fade" id="modalUbicacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ubicación de la propiedad</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="d-inline-block w-100 mb-3">
                                        <h2 class="fs-5 text-dark">Ubicación específica</h2>
                                        <p><?php echo $casas['direccion'].", ".$casas['ubicacion']?></p>
                                    </div>
                                    <div class="d-inline-block w-100">
                                        <h2 class="fs-5 text-dark mb-3">Mapa de google</h2>
                                        <iframe src="<?php echo $casas['mapa']?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </tbody>
            </table>                
        </div>
    </div>
    <!-- /.container-fluid -->


<?php include("../template/pie.php") ?>    

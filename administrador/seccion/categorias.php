<?php
    // Datos de presentacion en seccion productos
    $txtID = (isset($_POST['txtID']))?$_POST['txtID']:""; 
    $txtNombre = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";


    include('../config/db.php'); 


    switch($accion) {
        case "Agregar":
            //Insertar datos en la tabla categorias
            $sentenciaSQL = $conexion ->prepare("INSERT INTO categorias (nombre_categoria) VALUES (:nombre_categoria)");
            
            $primerLetra = ucfirst($txtNombre);

            $sentenciaSQL->bindParam(':nombre_categoria',$primerLetra);
            $sentenciaSQL->execute();   

            header("Location: " . $_SERVER['PHP_SELF']);
            break;
            
        case "Borrar":
            //Borra datos en la tabla categorias 
            $sentenciaSQL = $conexion->prepare("DELETE FROM categorias WHERE id_categoria=:id");
            $sentenciaSQL->bindParam(':id',$txtID);
            $sentenciaSQL->execute();

            header("Location: " . $_SERVER['PHP_SELF']);
            break;
            
    }
?>  



<?php include("../template/cabezera.php") ?>    

</style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tipo de propiedad</h1>
        <p class="mb-4">Tabla con los diferentes tipos cargados hasta el momento.</p>

        <div class="d-flex align-items-center mb-4">
            <a class="d-flex align-items-center btn btn-outline-dark" href="../inicio.php" style="width: fit-content">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>
                <span class="mx-2">Inicio</span>
            </a>
    
            <button type="button" class="d-flex align-items-center btn btn-success ml-4" data-bs-toggle="modal" data-bs-target="#agregarCategoria">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                </svg>
                <span class="ml-1">Agregar categoría</span>
            </button>
        </div>

        <?php  
            include("../config/db.php");
            
            $sentenciaSQL = $conexion->prepare("SELECT * FROM categorias");
            $sentenciaSQL->execute();
            $listadoDeCategorias = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?> 


        <div class="table-responsive">
            <table id="tableDesc" class="display" style="width:100%">
                <thead>
                   <tr>
                        <th>N°</th>
                        <th>Tipo de propiedad</th>
                        <th style="max-width: 60px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listadoDeCategorias as $categorias) {?>

                        <tr>
                            <td class="align-middle"><?php echo $categorias['id_categoria']?></td>
                            <td class="align-middle"><?php echo $categorias['nombre_categoria']?></td>
                            <td class="align-middle">
                                <form method="POST" class="d-flex align-items-center justify-content-center">
                                    <input type="hidden" name="txtID" id="txtID" value="<?php echo $categorias['id_categoria']?>">
                                    <button type="submit" name="accion" value="Borrar" class="btn btn-danger">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>                
        </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Modal AGREGAR TIPO DE PROPIEDAD-->
    <div class="modal fade" id="agregarCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo tipo de propiedad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-body"> 
                        <div class="form-group col">
                            <label for="txtNombre" class="mb-2">Nombre:</label>
                            <input type="text" name="txtNombre" id="txtNombre" class="form-control" placeholder="Ej: Departamento, Casa, Local...">
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


<?php include("../template/pie.php") ?>  
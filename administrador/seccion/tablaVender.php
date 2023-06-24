<?php
    // Datos de cliente que completaron el formulario de la pagina vender
    $txtEmail = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtCliente = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtTelefono = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtCategoria = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";
    $txtMensaje = (isset($_POST['txtNombre']))?$_POST['txtNombre']:"";


    include('../config/db.php'); 

    if($txtEmail && $txtCliente && $txtTelefono && $txtCategoria && $txtMensaje){

        //Insertar datos en la tabla vender
        $sentenciaSQL = $conexion ->prepare("INSERT INTO vender (nombre_cliente, email_cliente, tel_cliente, tipo_propiedad, comentarios) VALUES (:nombre_cliente, :email_cliente, :tel_cliente, :tipo_propiedad, :comentarios)");
        $sentenciaSQL ->bindParam(':nombre_cliente',$txtCliente);
        $sentenciaSQL ->bindParam(':email_cliente',$txtEmail);
        $sentenciaSQL ->bindParam(':tel_cliente',$txtTelefono);
        $sentenciaSQL ->bindParam(':tipo_propiedad',$txtCategoria);
        $sentenciaSQL ->bindParam(':comentarios',$txtMensaje);
        $sentenciaSQL->execute();   

        header("Location: " . $_SERVER['PHP_SELF']);
    }
?>  

<?php include("../template/cabezera.php") ?>    

 
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading --> 
        <h1 class="h3 mb-2 text-gray-800">Ingresos posibles</h1> 
        <p class="mb-4">Tabla con los datos de personas con la intención de publicar su propiedad en el sitio.</p>

        <a class="d-flex align-items-center btn btn-outline-dark mb-4" href="../inicio.php" style="width: fit-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            <span class="mx-2">Inicio</span>
        </a>

        <?php  
            include("../config/db.php");

            $sentenciaSQL = $conexion->prepare("SELECT * FROM vender");
            $sentenciaSQL->execute();
            $listadoDeIngresos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?> 


        <div class="table-responsive">
            <table id="tableDesc" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Propiedad</th>
                        <th>Comentarios</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listadoDeIngresos as $ingresos) {?>
                        <?php
                            $originalDate = $ingresos['fecha_recibo'];
                            $newDate = date("d/m/Y", strtotime($originalDate));
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $ingresos['id_vender']?></td>
                            <td class="align-middle"><?php echo $ingresos['nombre_cliente']?></td>
                            <td class="align-middle"><?php echo $ingresos['email_cliente']?></td>
                            <td class="align-middle"><?php echo $ingresos['tel_cliente']?></td>
                            <td class="align-middle"><?php echo $ingresos['tipo_propiedad']?></td>
                            <td class="align-middle"><?php echo $ingresos['comentarios']?></td>
                            <td class="align-middle"><?php echo $newDate?></td>
                            <td>
                                <form>
                                    <button type="submit" id="btnEstado" value="<?php echo $ingresos['id_vender']?>" class="btn <?php echo $ingresos['estado'] == 0 ? 'btn-danger' : 'btn-success'?>">
                                        <i class="bi <?php echo $ingresos['estado'] == 0 ? 'bi-x-lg' : 'bi-check-lg'?>"></i>
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


<?php include("../template/pie.php") ?>    

<script>
    $(document).on('click', '#btnEstado', function(e){

        e.preventDefault();
        $(this).toggleClass("btn-success btn-danger");
        $(this).children("i").toggleClass("bi-check-lg bi-x-lg");

        
        if (this.click) {

            var dato = { txtID : $( this ).val(), accion: 'btnVender'};
            console.log( dato );
    
            $.ajax({
                type: "POST",
                url: "./estado.php",
                data: dato
            });
        }
    });
</script>
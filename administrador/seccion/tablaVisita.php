<?php include("../template/cabezera.php");?>    


</style>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Visita a una propiedad</h1>
        <p class="mb-4">Tabla con los datos de personas interesadas en visitar una propiedad.</p>

        <a class="d-flex align-items-center btn btn-outline-dark mb-4" href="../inicio.php" style="width: fit-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            <span class="mx-2">Inicio</span>
        </a>
        

        <?php  
            include("../config/db.php");

            $sentenciaSQL = $conexion->prepare("SELECT * FROM visita");
            $sentenciaSQL->execute();
            $listadoDeVisitas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?> 

        <div class="table-responsive">
            <table id="tableDesc" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Registro creado</th>
                        <th>Casa</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Momento del día</th>
                        <th>Fecha de visita</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listadoDeVisitas as $visitas) {?>
                        <?php
                            $originalDate = $visitas['fecha_registro'];
                            $newDate = date("d/m/Y H:i:s", strtotime($originalDate));

                            $originalDateVisita = $visitas['fecha_visita'];
                            $newDateVisita = date("d/m/Y", strtotime($originalDateVisita));
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $visitas['id_visita']?></td>
                            <td class="align-middle"><?php echo $newDate?></td>
                            <td class="align-middle">
                                <a href="../../detalles.php?producto=<?php echo $visitas['id_casa_visita']?>" target="_blank" class="btn btn-link">Ver</a>       
                            </td>
                            <td class="align-middle"><?php echo $visitas['cliente_visita']?></td>
                            <td class="align-middle"><?php echo $visitas['email_visita']?></td>
                            <td class="align-middle"><?php echo $visitas['telefono_visita']?></td>
                            <td class="align-middle"><?php echo "Por la ".$visitas['horario_visita']?></td>
                            <td class="align-middle"><?php echo $newDateVisita?></td>
                            <td>
                                <form>
                                    <button type="submit" id="btnEstado" value="<?php echo $visitas['id_visita']?>" class="btn <?php echo $visitas['estado'] == 0 ? 'btn-danger' : 'btn-success'?>">
                                        <i class="bi <?php echo $visitas['estado'] == 0 ? 'bi-x-lg' : 'bi-check-lg'?>"></i>
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

            var dato = { txtID : $( this ).val(), accion: 'btnVisita'};
            console.log( dato );
    
            $.ajax({
                type: "POST",
                url: "./estado.php",
                data: dato
            });
        }
    });
</script>
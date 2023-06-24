<?php include('../template/cabezera.php'); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Consultas recibidas</h1> 
    <p class="mb-4">Tabla con los datos de personas interesadas en las propiedades publicadas.</p>

    <a class="d-flex align-items-center btn btn-outline-dark mb-4" href="../inicio.php" style="width: fit-content">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
        </svg>
        <span class="mx-2">Inicio</span>
    </a>
    
    <?php  
        include("../config/db.php");

        $sentenciaSQL = $conexion->prepare("SELECT * FROM contacto");
        $sentenciaSQL->execute();
        $listadoMensajes = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);          
    ?> 

    <table id="dataTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>N°</th>
                <th>Casa</th>
                <th style="min-width: 180px">Email</th>
                <th style="min-width: 50px">Nombre</th>
                <th style="min-width: 150px">Teléfono</th>
                <th>Mensaje</th>
                <th>Fecha</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($listadoMensajes as $mensajes) {?>
                <?php
                    $originalDate = $mensajes['fecha_de_recibo'];
                    $newDate = date("d/m/Y", strtotime($originalDate));
                ?>

                <tr>
                    <td class="align-middle" id="idContacto"><?php echo $mensajes['id_contacto']?></td>
                    <td class="align-middle">
                        <a href="../../detalles.php?producto=<?php echo $mensajes['id_casa_consulta']?>" target="_blank" class="btn btn-link">Ver</a>       
                    </td>
                    <td class="align-middle"><?php echo $mensajes['email_cliente']?></td>
                    <td class="align-middle"><?php echo $mensajes['nombre_cliente']?></td>
                    <td class="align-middle"><?php echo $mensajes['tel_cliente']?></td>
                    <td class="align-middle"><?php echo $mensajes['mensaje_cliente']?></td>
                    <td class="align-middle"><?php echo $newDate?></td>
                    <td>
                        <form>
                            <button type="submit" id="btnEstado" value="<?php echo $mensajes['id_contacto']?>" class="btn <?php echo $mensajes['estado'] == 0 ? 'btn-danger' : 'btn-success'?>">
                                <i class="bi <?php echo $mensajes['estado'] == 0 ? 'bi-x-lg' : 'bi-check-lg'?>"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<!-- /.container-fluid -->

    
<?php include('../template/pie.php'); ?>

<script>
    $(document).on('click', '#btnEstado', function(e){

        e.preventDefault();
        $(this).toggleClass("btn-success btn-danger");
        $(this).children("i").toggleClass("bi-check-lg bi-x-lg");

        
        if (this.click) {

            var dato = { txtID : $( this ).val(), accion: 'btnConsultas'};
            console.log( dato );
    
            $.ajax({
                type: "POST",
                url: "./estado.php",
                data: dato
            });
        }
    });
</script>
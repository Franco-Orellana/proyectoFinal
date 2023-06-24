<?php include("../template/cabezera.php") ?>    

 
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading --> 
        <h1 class="h3 mb-2 text-gray-800">Usuarios registrados</h1> 
        <p class="mb-4">Tabla con los datos de usuarios registrados en el sistema.</p>

        <a class="d-flex align-items-center btn btn-outline-dark mb-4" href="../inicio.php" style="width: fit-content">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
            </svg>
            <span class="mx-2">Inicio</span>
        </a>

        <?php  
            include("../config/db.php");

            $sentenciaSQL = $conexion->prepare("SELECT * FROM usuarios");
            $sentenciaSQL->execute();
            $listadoDeUsuarios = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?> 


        <div class="table-responsive">
            <table id="tableDesc" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre de usuario</th> 
                        <th>Fecha de registro</th>
                        <th>Estado</th>
                        <th style="max-width: 60px">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($listadoDeUsuarios as $usuario) {?>
                        <?php
                            $originalDate = $usuario['fecha_registro'];
                            $newDate = date("d/m/Y H:i:s", strtotime($originalDate));
                        ?>
                        <tr>
                            <td class="align-middle"><?php echo $usuario['id_usuario']?></td>
                            <td class="align-middle"><?php echo $usuario['nombre_usuario']?></td> 
                            <td class="align-middle"><?php echo $newDate?></td>
                            <td class="align-middle" id="estadoUsuario<?php echo $usuario['id_usuario']?>"><i class="me-1 bi bi-circle-fill <?php echo $usuario['estado'] == 1 ? 'text-success' : 'text-danger'?>"></i><strong class="<?php echo $usuario['estado'] == 1 ? 'text-success' : 'text-danger'?>"><?php echo $usuario['estado'] == 1 ? 'Activo' : 'Inactivo'?></strong></td>
                            <td>
                                <form>
                                    <button type="submit" id="btnEstado" value="<?php echo $usuario['id_usuario']?>" class="btn <?php echo $usuario['estado'] == 0 ? 'btn-danger' : 'btn-success'?>">
                                        <i class="bi <?php echo $usuario['estado'] == 0 ? 'bi-x-lg' : 'bi-check-lg'?>"></i>
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
        
        var usuario = "estadoUsuario"+$( this ).val();

        switch (usuario) {
            case 'estadoUsuario1':
                $('#estadoUsuario1').children("i").toggleClass("text-danger text-success");
                $('#estadoUsuario1').children("strong").toggleClass("text-danger text-success");
        
                if($('#estadoUsuario1').children("strong").hasClass('text-danger')) $('#estadoUsuario1').children("strong").text("Inactivo");
                else $('#estadoUsuario1').children("strong").text("Activo");
                break;
        
            case 'estadoUsuario2':
                $('#estadoUsuario2').children("i").toggleClass("text-danger text-success");
                $('#estadoUsuario2').children("strong").toggleClass("text-danger text-success");
        
                if($('#estadoUsuario2').children("strong").hasClass('text-danger')) $('#estadoUsuario2').children("strong").text("Inactivo");
                else $('#estadoUsuario2').children("strong").text("Activo");
            break; 
        }


        if (this.click) {

            var dato = { txtID : $( this ).val(), accion: 'btnUsuario'};
            console.log( dato );
    
            $.ajax({
                type: "POST",
                url: "./estado.php",
                data: dato
            });
        }
    });
</script>
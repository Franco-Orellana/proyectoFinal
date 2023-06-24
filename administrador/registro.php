<?php 
    $nombreUsuario = (isset($_POST['usuario']))?$_POST['usuario']:"";
    $contraUsuario = (isset($_POST['contrasenia']))?$_POST['contrasenia']:""; 
    $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

    $password = password_hash($contraUsuario, PASSWORD_DEFAULT);

    include("./config/db.php");

    //Seleccionar datos en la tabla usuario
    $sentenciaSQL = $conexion ->prepare("SELECT * FROM usuarios WHERE nombre_usuario=:nombre");
    $sentenciaSQL ->bindParam(':nombre',$nombreUsuario); 
    $sentenciaSQL ->execute();
    $usuario = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);


    if($accion == 'registrar'){

        if(empty($_POST['usuario']) || empty($_POST['contrasenia']) || empty($_POST['repetirContrasenia'])){
            $mensaje = "Error: Hay campos vacios";
        } 
        elseif($_POST['repetirContrasenia'] != $_POST['contrasenia']){
            $mensaje = "Error: No repitió la misma contraseña";
        }
        elseif(!empty($usuario) && $nombreUsuario == $usuario['nombre_usuario']){
            $mensaje = "Error: Usuario no disponible";
        }
        else {
            // //Insertar datos en la tabla usuario
            // $sentenciaSQL = $conexion ->prepare("INSERT INTO usuarios (nombre_usuario, contra_usuario, alias_usuario) VALUES (:nombre, :contrasenia, :alias)");
            // $sentenciaSQL ->bindParam(':nombre',$nombreUsuario);
            // $sentenciaSQL ->bindParam(':contrasenia',$password);

            // $alias = "ADMIN"."-".$nombreUsuario."-".rand(1001, 1999);
            // $sentenciaSQL ->bindParam(':alias',$alias);

            // $sentenciaSQL ->execute();

            // header("Location: " . $_SERVER['PHP_SELF']);
            //Insertar datos en la tabla usuario
            $sentenciaSQL = $conexion ->prepare("INSERT INTO usuarios (nombre_usuario, contra_usuario) VALUES (:nombre, :contrasenia)");
            $sentenciaSQL ->bindParam(':nombre',$nombreUsuario);
            $sentenciaSQL ->bindParam(':contrasenia',$password);

            $sentenciaSQL ->execute();

            header("Location: " . $_SERVER['PHP_SELF']);
        }
    }

?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario - Sitio web</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="../css/login.css" rel="stylesheet">

</head>

<style>
    @media only screen and (max-width: 768px){
        main {
            background-image: url(https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1175&q=80);
            background-repeat: no-repeat;
            background-size: cover;
        }
    }
</style>
  
<body class="w-100 min-vh-100 p-0">
    
    <main class="d-flex w-100 h-100">

        <div class="w-50 h-100 form-img">
            <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1175&q=80" alt="">
        </div>

        <div class="m-auto form-inicio">

            <a class="d-flex mb-4 mb-md-5 enlace-volver" href="./index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
              </svg>
              VOLVER
            </a>
            
            <?php if(isset($mensaje)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php } ?> 

            <form class="w-100 mb-4 mb-md-2" method="POST" action="">
                <h1 class="h3 mb-md-5 mb-4 pb-4 form-titulo">Registro de usuario</h1>
    
                <div class="mb-4 pb-2 form-group">
                    <label class="mb-2">Usuario</label>
                    <input type="text" name="usuario" class="form-control p-2" placeholder="Ingrese un nombre de usuario">
                </div>

                <div class="mb-4 pb-2 form-group">
                    <label class="mb-2">Contraseña</label>
                    <input type="password" name="contrasenia" class="form-control p-2" placeholder="Ingrese una contraseña">
                </div>
    
                <div class="mb-md-4 mb-3 pb-4 form-group">
                    <label class="mb-2">Repetir contraseña</label>
                    <input type="password" name="repetirContrasenia" class="form-control p-2" placeholder="Vuelva a ingresar su contraseña">
                </div>
    
                <button class="w-100 mb-md-4 mb-0 btn btn-lg btn btn-outline-success" type="submit" name="accion" value="registrar">Registrar</button>
            </form>

            <span class="me-2">¿Ya tenés cuenta?</span><a href="./index.php">Ingresá acá</a>
        </div>
    </main>
</body>
</html>


            <!-- <span class="me-2">¿No tenés una cuenta?</span><a href="./registro.php">Registrarse</a>  -->
            <!-- <span class="me-2">¿Olvidaste tu contraseña?</span><a href="./recuperarContra.php">Ingresá acá</a> -->
<?php 

    include("./config/db.php");

    session_start();
 
    if($_POST) {

        if(empty($_POST['usuario']) || empty($_POST['contrasenia'])){
            $mensaje = "Error: Hay campos vacios";
        }
        else{
            $sentenciaSQL = $conexion ->prepare("SELECT * FROM usuarios WHERE nombre_usuario =:usuario"); 
            $sentenciaSQL ->bindParam(':usuario',$_POST['usuario']);
            $sentenciaSQL ->execute();
            $cuentas = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);

            if(!empty($cuentas) && $cuentas['estado'] != 1){
                $mensaje = "Error: El usuario está bloqueado";
            }
            elseif(!empty($cuentas) && password_verify($_POST['contrasenia'], $cuentas['contra_usuario'])){
                $_SESSION['usuario'] = 'ok';
                $_SESSION['nombreUsuario'] = $cuentas['nombre_usuario'];
                header('Location:inicio.php');
            }
            else {
                $mensaje = "Error: Usuario o Contraseña incorrectos";
            } 
        }
    } 
?>


<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión - Sitio web</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="../css/login.css" rel="stylesheet">

</head>
  
<body class="w-100 min-vh-100 p-0">
    
    <main class="d-flex w-100 h-100">

        <div class="w-50 h-100 form-img">
            <img src="../img/img-login.jpg" alt="">
        </div>

        <div class="m-auto form-inicio">

            <a class="d-flex mb-4 mb-md-5 enlace-volver" href="../index.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
              </svg>
              VOLVER
            </a>
        

            <?php if(isset($mensaje)) { ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $mensaje; ?>
                </div>
            <?php } ?>

            <form  class="w-100 mb-4 mb-md-2" method="POST">
                <h1 class="h3 mb-md-5 mb-4 pb-4 form-titulo">Iniciar sesión</h1>
    
                <div class="mb-4 pb-2 form-group">
                    <label class="mb-3">Usuario</label>
                    <input type="text" name="usuario" class="form-control p-2" placeholder="Ingrese su usuario">
                </div>
    
                <div class="mb-md-4 mb-3 pb-4 form-group">
                    <label class="mb-3">Contraseña</label>
                    <input type="password" name="contrasenia" class="form-control p-2" placeholder="Ingrese su contraseña">
                </div>
    
                <button class="w-100 mb-md-4 mb-0 btn btn-lg btn btn-outline-success" type="submit">Ingresar</button>
            </form>
        </div>
    </main>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ropa+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>


    <!-- Hojas de estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/propiedades.css">
    <link rel="stylesheet" href="./css/detalles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <title>Vendé tu propiedad</title>
</head>

<style>
    #txtCategoria-error {
        display: none !important;   
    }

    .toast-top-right {
        top: 77px;
        right: 0;
    }
    .toast-message {
        font-size: 15px;
    }
</style>

<body class="w-100 h-100 d-flex flex-column">


    <header class="position-relative">

        <div class="logo">
            <img src="./img/logo2.svg" alt="">
        </div>

        <div class="navbar-overlay" onclick="toggleMenuOpen()"></div>

        <button type="button" class="navbar-burger" onclick="toggleMenuOpen()">
            <span class="material-icons">menu</span>
        </button>

        <nav class="navbar-menu">
            <ul class="nav__lista m-0">
                <li><a href="./index.php#inicio" class="enlace">Inicio</a></li>
                <li><a href="./index.php#elegirnos" class="enlace">Por qué elegirnos</a></li>
                <li><a href="./index.php#horizontes" class="enlace">Nuevos horizontes</a></li>
                <li><a href="./index.php#propiedades" class="enlace">Propiedades</a></li>
                <li><a href="./index.php#clientes" class="enlace">Testimonios</a></li>
                <li><a href="./vender.php" class="enlace">Vender</a></li>
            </ul>
        </nav>
    </header>

    <main class="container-fluid m-0 w-100">
        <section class="row">
            <article class="form-vender col px-5 my-5 order-2 order-md-1">
                <div class="mb-5">
                    <p class="fs-1 fw-bold text-center text-black">Vendé tu propiedad</p>
                    <p class="fs-4 text-center text-muted">Completá el formulario y nos pondremos en contacto con vos para continuar con el proceso</p>
                </div>
                <form class="row pt-4 g-2 needs-validation" novalidate id="formVender">
                    <div class="form__grupo col-sm-12 form-floating">
                        <input onkeyup="mensajeChange()" type="text" class="form-control px-3" name="txtCliente" id="txtCliente" pattern="[a-zA-Z ]{2,30}" maxlength="30" placeholder="Roberto Rodríguez" required>
                        <label for="floatingInput" class="px-4 text-black-50">Nombre y apellido</label>
                        <div class="fs-5 invalid-feedback">Ingresá tu nombre. Ej: Roberto Rodríguez</div>
                    </div>
                    <div class="form__grupo col-sm-12 form-floating my-4">
                        <input onkeyup="mensajeChange()" type="email" class="form-control px-3" name="txtEmail" id="txtEmail" placeholder="ejemplo@gmail.com" maxlength="40" required>
                        <label for="floatingInput" class="px-4 text-black-50">Email</label>
                        <div class="fs-5 invalid-feedback">Ingresá tu email. Ej: robertorodríguez@gmail.com</div>
                    </div>
                    <div class="form__grupo col-sm-12 form-floating m-0">
                        <input onkeyup="mensajeChange()" type="tel" class="form-control px-3" name="txtTelefono" id="txtTelefono" placeholder="1123456789" pattern="^\d+$" minlength="10" maxlength="10" required>
                        <label for="floatingInput" class="px-4 text-black-50">Teléfono</label>
                        <div class="fs-5 invalid-feedback">Ingresá tu teléfono. Ej: 1123456789</div>
                    </div>
                    <div class="col-sm-12 my-4">
                        <select class="form-select m-0 text-black-50" id="txtCategoria" aria-label="label select example" required>
                            <option selected disabled value="">Tipo de propiedad</option>
                            <?php 
                                include("./administrador/config/db.php");
            
                                $sentenciaSQL = $conexion -> prepare("SELECT * FROM categorias");
                                $sentenciaSQL -> execute();
                                foreach ($sentenciaSQL as $categorias) {
                                    echo "<option value='".$categorias['nombre_categoria']."'>".$categorias['nombre_categoria']."</option>";
                                }
                            ?>
                            <option>Otro</option>
                        </select>
                        <div class="fs-5 invalid-feedback">Elegí una categoría</div>
                    </div>

                    <div class="form__grupo form-floating m-0">
                        <textarea onkeyup="mensajeChange()" class="form-control pt-5 ps-3" name="txtMensaje" placeholder="Ingresé un comentario" id="txtMensaje" style="height: 130px; resize: none;" required></textarea>
                        <label for="floatingTextarea" class="px-4 text-black-50">Comentarios</label>
                        <div class="fs-5 invalid-feedback">Ingresá un mensaje.</div>
                    </div>
                    <button type="submit" id="enviar" value="Enviar" class="btn btn-contacto py-3 mb-2 mt-4" disabled>Enviar</button>
                    <p class="fs-5 text-black">Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p>
                </form>
            </article>
            <article class="col-sm-0 col-md-7 col-lg-8 p-0 overflow-hidden order-md-2" >
                <img class="d-inline d-md-none" src="./img/illustration.svg" alt="">
                <img class="w-100 h-100 object-fit-cover d-none d-md-inline" src="./img/img-vender.jpg" alt="" style="object-position:center;">
            </article>
        </section>
    </main>

    <footer class="footer m-5 px-lg-5 px-0 py-5">
        <div class="footer__logo">
            <a href="#inicio"><img src="./Img/logo.svg" alt=""></a>
            <p>1999-2023, &#9400; Franco Orellana. Todos los derechos reservados.</p>
        </div>
        <ul class="footer__lista">
            <li>Sobre Nosotros</li>                 
            <li><a href="#elegirnos" class="link">Por qué elegirnos</a></li>           
            <li><a href="#horizontes" class="link">Nuevos horizontes</a></li>
            <li><a href="#propiedades" class="link">Propiedades</a></li>
            <li><a href="#clientes" class="link">Testimonios</a></li>
        </ul>
        <ul class="footer__lista">
            <li>Información Importante</li>           
            <li><a href="#" class="link">Términos y condiciones</a></li>           
            <li><a href="#" class="link">Soporte</a></li>
            <li><a href="#" class="link">FAQs</a></li>
        </ul>
        <div class="footer__contacto">
            <p>Contacto</p>
            <ul class="footer__contacto__list">
                <li><a href="https://www.instagram.com/" aria-label="perfil-de-instagram" target="_blank"><i class="bi-instagram link"></i></a></li>
                <li><a href="https://es-la.facebook.com/" aria-label="perfil-de-facebook" target="_blank"><i class="bi-facebook link"></i></a></li>
                <li><a href="https://twitter.com/" aria-label="perfil-de-twitter" target="_blank"><i class="bi-twitter link"></i></a></li>
                <li><a href="https://www.youtube.com/" aria-label="perfil-de-youtube" target="_blank"><i class="bi-youtube link"></i></a></li>
            </ul>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Abrir menu mobile -->
    <script src="./js/navbar.js"></script>

    <!-- Validacion de formulario bootstrap -->
    <script src="./js/validacionBootstrap.js"></script>

    <!-- Validacion de campos de formulario NO VACIOS  -->
    <script src="./js/validacionForm.js"></script>


    <!-- Validacion de formulario y luego envio del mismo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>    

    <script>
        $(document).ready(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    const alerta = document.querySelector('#enviar');
                    toastr.success('Se ha enviado correctamente.', "",{"progressBar": true})

                    var parametros = {
                        "txtEmail": $('input[type="email"][name="txtEmail"]').val(), 
                        "txtCliente": $('input[type="text"][name="txtCliente"]').val(), 
                        "txtTelefono": $('input[type="tel"][name="txtTelefono"]').val(), 
                        "txtCategoria": $('option:selected').val(), 
                        "txtMensaje":$('textarea[name="txtMensaje"]').val(),
                    };

                    console.log(parametros);

                    $.ajax({
                        type: 'POST',
                        url: './formVender.php',
                        data: parametros,
                    }).done(function(data){
                        $('#formVender').trigger("reset");
                        $("#enviar").attr("disabled", "disabled");
                    });
                }
            });
            $("#formVender").submit(function(e) {
                e.preventDefault(); 
            }).validate({
                rules: {
                    "txtEmail": {
                        required: true,
                        email: true
                    },
                    "txtCliente": {
                        required: true,
                        pattern: "[a-zA-Z ]{2,30}",
                        maxlength: 30
                    },
                    "txtTelefono": {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    },
                    "txtCategoria": {
                        required: true,
                    },
                    "txtMensaje": {
                        required: false
                    },
                },
                messages: {
                    txtEmail: "",
                    txtCliente: "",
                    txtTelefono: "",
                    txtMensaje: ""
                }
            });
        });
    </script>


</body>
</html>
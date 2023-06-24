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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

    <!-- Hoja de estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/detalles.css">
    <link rel="stylesheet" href="./css/propiedades.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Fuente de titulos -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

    <title>Inmobiliaria</title>
</head>
<body>

    <style>
        header {
            position: absolute;
            padding: 25px 7vw;
            background-color: var(--color-header);
        }

        .toast-message {
          font-size: 15px;
        }

        .swiper-button-next.swiper-button-disabled, .swiper-button-prev.swiper-button-disabled {
            opacity: 0;
        }

        .swiperFecha .swiper-button-prev:after, .swiperFecha .swiper-rtl .swiper-button-next:after,
        .swiperFecha .swiper-button-next:after, .swiperFecha .swiper-rtl .swiper-button-prev:after {
            content: '';
        }

        .swiperFecha .swiper-button-prev, .swiperFecha .swiper-rtl .swiper-button-next {
            left: 1px;
        }
        .swiperFecha .swiper-button-next, .swiperFecha .swiper-rtl .swiper-button-prev {
            right: 1px; 
        }

        .btn-check:checked+.btn, .btn.active, .btn.show, .btn:first-child:active, :not(.btn-check)+.btn:active {
            border-color: rgb(255, 85, 0) !important;
            background: rgb(255, 85, 0, .1) !important;
        }

        .form-check-input.is-valid~.form-check-label, .was-validated .form-check-input:valid~.form-check-label {
            color: #000 !important;
        }

        .form-check-input.is-invalid~.form-check-label, .was-validated .form-check-input:invalid~.form-check-label {
            border-color: var(--bs-danger) !important;
        }
    </style>

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

    <div class="contacto__movile btn-group px-sm-5">
        <a class="btn btn-chat py-sm-3 mr-3" href="https://wa.me/541141873847?text=¡Hola!%20Quiero%20que%20se%20comuniquen%20conmigo%20por%20esta%20propiedad%20en%20alquiler%20que%20vi%20en%20Zonaprop." target="_blank" role="button" aria-label="Chat en WhatsApp" style="border-radius: 10px">
            <span class="contacto__movile__texto">Contactar por WhatsApp</span>
            <i class="bi bi-whatsapp ms-sm-3"></i>
        </a>

        <button type="button" class="btn btn-contacto py-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Contactar</button>
    </div>

    <main>

        <?php  
            include("administrador/config/db.php");

            $producto = (isset($_GET['producto']))?$_GET['producto']:"";
            
            $sentenciaSQL = $conexion->prepare("SELECT  casas.id, casas.img_principal, casas.categoria, casas.titulo, casas.ubicacion, casas.direccion, casas.precio, casas.anunciante, casas.estado,detalles.titulo_completo, 
                                                        detalles.descripcion, detalles.mapa, detalles.cant_m2, detalles.cant_m2_cubierto, 
                                                        detalles.cant_ambientes, detalles.cant_banios, detalles.cant_dormitorios, imagenes.casa_img
                                                FROM casas 
                                                INNER JOIN detalles ON casas.id_detalles = detalles.id_detalles
                                                INNER JOIN imagenes  ON casas.id_imagenes = imagenes.id_img
                                                WHERE casas.id LIKE '%$producto'
                                            ");
            $sentenciaSQL->execute();
            $listadoDeDetallesDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
            
        ?>     

        <?php 
            if(empty($listadoDeDetallesDeCasas)){
                echo '
                    <div class="w-100 py-5">
                        <div class="productos__sin__datos w-100 my-5 py-5 container flex-wrap">
                            <img class="col-lg col-sm-12 col-md-6" src="./img/search-no-results.svg" alt="">
                            <div class="productos__sin__datos__leyenda col-lg col-sm-12 col-md-4 d-flex flex-column ms-md-5 ms-lg-0 mt-5 mt-md-0 text-sm-center text-md-start">
                                <span>OOPS!</span>
                                <span>Propiedad vendida</span>
                            </div>
                        </div>
                    </div>
                ';
            }
        ?>

        <?php foreach($listadoDeDetallesDeCasas as $casas) { ?>

        <input type="hidden" name="txtID" id="txtID" value="<?php echo $casas['id']?>">

        <section class="sec__breadcrumb">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item fs-4"><a class="breadcrumb-inicio" href="./index.php">Inicio</a></li>
                    <li class="breadcrumb-item fs-4"><a class="breadcrumb-inicio" href="./propiedades.php">Propiedades</a></li>
                    <li class="breadcrumb-item active fs-4" aria-current="page"><?php echo $casas['titulo']?></li>
                </ol>
            </nav>
        </section>
        
        <section class="detalles">

            <article class="detalles__imagen">

                <div class="swiper mySwiper carousel">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="d-block w-100 h-100 object-fit-cover" src="./img/casas/<?php echo $casas['img_principal']?>" alt="">
                        </div>
                        <?php
                            $sentenciaSQL = $conexion->prepare("SELECT casas.id, imagenes.casa_img FROM casas INNER JOIN imagenes  ON casas.id_imagenes = imagenes.id_img WHERE casas.id LIKE '%$producto'");
                            $sentenciaSQL->execute();
                            $listadoDeCasas = $sentenciaSQL->fetch(PDO::FETCH_BOTH);

                            $res = $listadoDeCasas['casa_img'];
                            
                            $res = explode(" ", $res);

                            // for ($i=0; $i < 4; ++$i) {
                            for ($i = 9; $i > 5; --$i) { 
                                ?>
                                    <div class="swiper-slide">
                                        <img class="d-block w-100 h-100 object-fit-cover" src="./img/detalles/<?php echo $res[$i]?>" alt="">
                                    </div>
                                <?php
                            }
                        ?>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                

                <h1 class="detalles__imagen__titulo"><?php echo $casas['titulo_completo']?></h1>
                <p class="detalles__imagen__ubicacion"><?php echo $casas['direccion'] .", ".$casas['ubicacion']?></p>
                
                <div class="detalles__imagen__grid">
                    <img src="./img/casas/<?php echo $casas['img_principal']?>" alt="">

                <?php
                    $res = $listadoDeCasas['casa_img'];
                    
                    $res = explode(" ", $res);
                    // for ($i=0; $i < 4; ++$i) { 

                    for ($i = 9; $i > 5; --$i) { 
                        ?>
                            <img src="./img/detalles/<?php echo $res[$i]?>" alt="">
                        <?php
                    }
                ?>
                </div>
            </article>
            
            <article class="detalles__descripcion container w-auto mw-100 pt-4 px-0">

                <div class="row g-2">
                    
                    <div class="col-12 col-xl-8 me-lg-5">
                        <div class="detalles__desc">
                            <h2 class="detalles__desc__titulo"><span class="venta" style="font-size: var(--font-size-precio);">venta</span>USD <?php echo number_format($casas['precio'], 0, ',', '.');?></h2>
                            <div class="detalles__desc__adicional">
                                <span class="fs-1"><?php echo $casas['cant_m2']?> m² Total</span>
                                <?php if($casas['cant_m2_cubierto'] != 0) {?>       
                                    <i class="bi bi-circle-fill mx-4 mx-md-0"></i>
                                    <span class="fs-1"><?php echo $casas['cant_m2_cubierto']?> m² Cubiertos</span>
                                <?php  } ?> 
                                <?php if($casas['cant_ambientes'] != 0) {?>       
                                    <i class="bi bi-circle-fill mx-4 mx-md-0"></i>
                                    <span class="fs-1"><?php echo $casas['cant_ambientes']?> Ambientes</span>
                                <?php  } ?> 
                                <?php if($casas['cant_banios'] != 0) {?> 
                                    <i class="bi bi-circle-fill mx-4 mx-md-0"></i>
                                    <span class="fs-1"><?php echo $casas['cant_banios']?> Baños</span>
                                <?php  } ?> 
                                <?php if($casas['cant_dormitorios'] != 0) {?>       
                                    <i class="bi bi-circle-fill mx-4 mx-md-0"></i>
                                    <span class="fs-1"><?php echo $casas['cant_dormitorios']?> Dormitorios</span>
                                <?php  } ?> 
                            </div>
                        </div>
        
                        <div class="detalles__texto bordes-article">
                            <p class="detalles__texto__titulo mb-4">Descripción</p>
                            <p class="mb-0 texto__descripcion" style="font-family:Poppins,sans-serif;" id="descripcionCasa"><?php echo nl2br($casas['descripcion'])?></p>
                                
                            <div class="collapse" id="collapseExample">
                                <div class="card card-body card__descripcion">
                                    <?php echo nl2br($casas['descripcion'])?>
                                </div>
                            </div>
                            
                            <p>
                                <button class="btn-ver-mas d-flex aling-items-center mt-3" id="masDescripcion" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                    Ver más
                                    <i id="iconoMas" class="bi bi-plus-lg ms-2"></i>
                                    <i id="iconoMenos" class="bi bi-dash-lg ms-2" style="display:none;"></i>
                                </button>
                            </p>
                        </div>
        
                        <div class="detalles__interior bordes-article">
                            <!-- <?php 
                                // if($casas['categoria'] != 'Terrenos y lotes') echo '<h2 class="detalles__interior__titulo mb-5">¿Como es el interior?</h2>';
                              
                                //else echo  '<h2 class="detalles__interior__titulo mb-5">Más imagenes</h2>';
                            ?> -->
                            <h2 class="detalles__interior__titulo mb-5">Más imagenes</h2>
                            <div class="detalles__interior__grid row g-3">
                            <?php
                                // $count = count($res);

                                // for ($i=4; $i < $count; ++$i) { 
                                for ($i = 0; $i < 6; ++$i) { 
                                    ?>
                                        <img class="col-md-6" src="./img/detalles/<?php echo $res[$i]?>" alt="">
                                    <?php
                                }
                            ?>
                            </div>

                            <!-- SLIDE FOTOS INTERIO MOVIL -->
                            <div id="carouselExampleIndicators" class="carousel slide rounded-3 overflow-hidden m-0" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                </div>
                                <div class="carousel-inner w-100 h-100">
                                    <?php
                                        // $count = count($res);

                                        for ($i=0; $i < 1; ++$i) { 
                                            ?>
                                                <div class="carousel-item w-100 h-100 active">
                                                    <img class="d-block w-100 h-100 object-fit-cover" src="./img/detalles/<?php echo $res[$i]?>" alt="">
                                                </div>
                                            <?php
                                        }
                                        
                                        // for ($i=5; $i < $count - 1; ++$i) { 
                                        for ($i = 1; $i < 6; ++$i) { 
                                            ?>
                                                <div class="carousel-item w-100 h-100">
                                                    <img class="d-block w-100 h-100 object-fit-cover" src="./img/detalles/<?php echo $res[$i]?>" alt="">
                                                </div>
                                            <?php
                                        }
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="detalles__lugar">
                                <h2 class="detalles__lugar__titulo">¿Qué ofrece este lugar?</h2>
                                <div class="detalles__lugar__info">
                                    <div class="detalles__lugar__info__card">
                                        <img src="./img/total-surface.svg" alt="">
                                        <p>Superficie total: <?php echo $casas['cant_m2']?> m²</p>
                                    </div>
                                    <?php if($casas['cant_m2_cubierto'] != 0) {?> 
                                        <div class="detalles__lugar__info__card">
                                            <img src="./img/covered-surface.svg" alt="">
                                            <p>Superficie cubierta: <?php echo $casas['cant_m2_cubierto']?> m²</p>
                                        </div>
                                    <?php  } ?> 

                                    <?php if($casas['cant_ambientes'] != 0) {?> 
                                        <div class="detalles__lugar__info__card">
                                            <img src="./img/rooms.svg" alt="">
                                            <p>Ambientes: <?php echo $casas['cant_ambientes']?></p>
                                        </div>
                                    <?php  } ?> 
                                        
                                    <?php if($casas['cant_banios'] != 0) {?> 
                                        <div class="detalles__lugar__info__card">
                                            <img src="./img/bathrooms.svg" alt="">
                                            <p>Baños: <?php echo $casas["cant_banios"]?></p>
                                        </div>
                                    <?php  } ?> 
                                        
                                    <?php if($casas['cant_dormitorios'] != 0) {?> 
                                        <div class="detalles__lugar__info__card">
                                            <img src="./img/bed-2-svgrepo-com.svg" alt="">
                                            <p>Dormitorios: <?php echo $casas['cant_dormitorios']?></p>
                                        </div>
                                    <?php  } ?> 

                                    <?php if($casas['categoria'] != 'Terrenos y lotes') {?> 

                                        <div class="detalles__lugar__info__card">
                                            <img src="./img/electricity-svgrepo-com.svg" alt="">
                                            <p>Electricidad: Si</p>
                                        </div>
                                        <div class="detalles__lugar__info__card">
                                            <img src="./img/water-drop-4-svgrepo-com.svg" alt="">
                                            <p>Agua Corriente: Si</p>
                                        </div>
                                        <div class="detalles__lugar__info__card">
                                            <img src="./img/fire-svgrepo-com.svg" alt="">
                                            <p>Gas Natural: Si</p>
                                        </div>
                                    <?php  } ?> 
                                    
                                </div>
                                <p class="detalles__lugar__parrafo" style="color: #fd472c;">Y mucho más...</p>
                            </div>
                        </div>

                        <div class="formulario col position-sticky px-0" style="top: 15%">
                            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link active w-100 fs-4 py-3 text-dark" id="mensaje-tab" data-bs-toggle="tab" data-bs-target="#mensaje" type="button" role="tab" aria-controls="mensaje" aria-selected="true">Mensaje</button>
                                </li>
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link w-100 fs-4 py-3 text-dark" id="visita-tab" data-bs-toggle="tab" data-bs-target="#visita" type="button" role="tab" aria-controls="visita" aria-selected="false">Solicitar visita</button>
                                </li>
                            </ul>


                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="mensaje" role="tabpanel" aria-labelledby="mensaje-tab">
                                    <form class="row g-2 needs-validation m-4" novalidate id="formContacto">
                                        <p class="formulario__parrafo">Contáctese con nosotros por la propiedad</p>
                                        <div class="form__grupo col-md-12 form-floating mb-4">
                                            <input onkeyup="mensajeChange()" type="email" class="form-control px-3" name="txtEmail" id="txtEmail" placeholder="ejemplo@gmail.com" required>
                                            <label for="floatingInput" class="px-3">Email</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu email. Ej: juanperez@gmail.com</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating">
                                            <input onkeyup="mensajeChange()" type="text" class="form-control px-3" name="txtCliente" id="txtCliente" placeholder="roberto" pattern="[a-zA-Z ]{2,30}" maxlength="30" required>
                                            <label for="floatingInput" class="px-3">Nombre</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu nombre.</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating">
                                            <input onkeyup="mensajeChange()" type="tel" class="form-control px-3" name="txtTelefono" id="txtTelefono" placeholder="1123456789" pattern="^\d+$" minlength="10" maxlength="10" required>
                                            <label for="floatingInput" class="px-3">Teléfono</label>
                                            <div class="fs-5 invalid-feedback">Ejemplo: 1123456789</div>
                                        </div>
                                        <div class="form__grupo col-md-12 form-floating my-4">
                                            <textarea onkeyup="mensajeChange()" class="form-control pt-5" name="txtMensaje" id="txtMensaje" placeholder="Ingresé un mensaje" style="height: 100px; resize: none;" required>¡Hola! Quiero que se comuniquen conmigo por esta propiedad en venta que vi en el sitio.</textarea>
                                            <label for="floatingTextarea" class="px-3">Mensaje</label>
                                            <div class="fs-5 invalid-feedback">Ingresá un mensaje.</div>
                                        </div>
                                        <div class="d-grid gap-2 btn-group">
                                            <button type="submit" id="enviar" value="Enviar" class="btn btn-contacto py-3 mb-2" disabled>Contactar</button>
                                            <a class="btn btn-chat py-3 mb-3" href="https://wa.me/541141873847?text=¡Hola!%20Quiero%20que%20se%20comuniquen%20conmigo%20por%20esta%20propiedad%20en%20alquiler%20que%20vi%20en%20Zonaprop." target="_blank" role="button" aria-label="Chat en WhatsApp" style="border-radius: 10px">Contactar por WhatsApp<i class="bi bi-whatsapp ms-3"></i></a>
                                        </div>
                                        <p>Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p>
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="visita" role="tabpanel" aria-labelledby="visita-tab">
                                    <form class="row g-2 needs-validation m-4" novalidate id="formVisita">
                                        <div class="swiper mySwiper swiperFecha w-100">
                                            <div class="swiper-wrapper justify-content-between align-items-center">
                                                <?php 
                                                    setlocale(LC_TIME, 'Spanish_Argentina');

                                                    $hoy = date("Y-m-d");
                                                    $fecha1 = date("Y-m-d", strtotime($hoy ."+ 1 days"));
                                                    $fecha2 = date("Y-m-d", strtotime($fecha1 ."+ 7 days"));
                                                    $k = 0;
                                                
                                                    for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days")))
                                                    {   
                                                        $k += 1;
                                                        ?>
                                                            <div class="swiper-slide d-flex flex-column aling-items-center ">
                                                                <input type="radio" class="btn-check form-check-input" name="txtFecha" id="validationFormCheck<?php echo $k?>" value="<?php echo $i?>" required>
                                                                <label class="d-flex flex-column btn w-100 py-3 border border-2 rounded-2 form-check-label" for="validationFormCheck<?php echo $k?>">
                                                                    <span class="fs-4"><?php echo utf8_encode(strftime("%a", strtotime($i)))?></span>
                                                                    <span class="fs-4 fw-bold"><?php echo utf8_encode(strftime("%d", strtotime($i)))?></span>
                                                                    <span class="fs-4"><?php echo utf8_encode(strftime("%b", strtotime($i)))?></span>    
                                                                </label>
                                                                <?php if($k == 1) echo '<div class="fs-5 invalid-feedback ps-1">Elija fecha</div>';?>
                                                            </div>
                                                        <?php 
                                                    }
                                                ?>
                                            </div>
                                            <div class="swiper-button-next button-next">
                                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 5.33333; overflow: visible;"><g fill="none"><path d="m12 4 11.2928932 11.2928932c.3905243.3905243.3905243 1.0236893 0 1.4142136l-11.2928932 11.2928932"></path></g></svg>
                                            </div>
                                            <div class="swiper-button-prev button-prev">
                                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 5.33333; overflow: visible;"><g fill="none"><path d="m20 28-11.29289322-11.2928932c-.39052429-.3905243-.39052429-1.0236893 0-1.4142136l11.29289322-11.2928932"></path></g></svg>
                                            </div>
                                        </div> 
                                        
                                        <div class="form__grupo d-flex flex-row col-md-12 my-4 px-0">
                                            <div>
                                                <input type="radio" class="btn-check form-check-input" name="txtHorario" value="Mañana" id="validationFormCheckM" required>
                                                <label class="btn border border-2 rounded-2 me-3 form-check-label" for="validationFormCheckM">Por la mañana</label>
                                                <div class="fs-5 invalid-feedback ps-1">Elija una franja horaria</div>
                                            </div>
                                            <div>
                                                <input type="radio" class="btn-check form-check-input" name="txtHorario" value="Tarde" id="validationFormCheckT" required>
                                                <label class="btn border border-2 rounded-2 form-check-label" for="validationFormCheckT">Por la tarde</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form__grupo col-md-12 form-floating mb-4">
                                            <input onkeyup="mensajeChange()" type="email" class="form-control px-3" name="txtEmailVisita" id="txtEmailVisita" placeholder="ejemplo@gmail.com" required>
                                            <label for="floatingInput" class="px-3">Email</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu email. Ej: juanperez@gmail.com</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating">
                                            <input onkeyup="mensajeChange()" type="text" class="form-control px-3" name="txtClienteVisita" id="txtClienteVisita" placeholder="roberto" pattern="[a-zA-Z ]{2,30}" maxlength="30" required>
                                            <label for="floatingInput" class="px-3">Nombre</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu nombre.</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating mb-4">
                                            <input onkeyup="mensajeChange()" type="tel" class="form-control px-3" name="txtTelVisita" id="txtTelVisita" placeholder="1123456789" pattern="^\d+$" minlength="10" maxlength="10" required>
                                            <label for="floatingInput" class="px-3">Teléfono</label>
                                            <div class="fs-5 invalid-feedback">Ejemplo: 1123456789</div>
                                        </div>
                                        <button type="submit" id="enviarVisita" value="Enviar" class="btn btn-contacto py-3 mb-2" disabled>Contactar</button>
                                        <p>Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p>
                                    </form>
                                </div>
                            </div>
                            <!-- <form class="row g-2 needs-validation m-4" novalidate id="formContacto">
                                <p class="formulario__parrafo">Contáctese con nosotros por la propiedad <?php echo $casas['titulo']?>, ubicada en <?php echo $casas['ubicacion']?></p>
                                <div class="form__grupo col-md-12 form-floating mb-4">
                                    <input onkeyup="mensajeChange()" type="email" class="form-control px-3" name="txtEmail" id="txtEmail" placeholder="ejemplo@gmail.com" required>
                                    <label for="floatingInput" class="px-3">Email</label>
                                    <div class="fs-5 invalid-feedback">Ingresá tu email. Ej: juanperez@gmail.com</div>
                                </div>
                                <div class="form__grupo col-md-6 form-floating">
                                    <input onkeyup="mensajeChange()" type="text" class="form-control px-3" name="txtCliente" id="txtCliente" placeholder="roberto" pattern="[a-zA-Z ]{2,30}" maxlength="30" required>
                                    <label for="floatingInput" class="px-3">Nombre</label>
                                    <div class="fs-5 invalid-feedback">Ingresá tu nombre.</div>
                                </div>
                                <div class="form__grupo col-md-6 form-floating">
                                    <input onkeyup="mensajeChange()" type="tel" class="form-control px-3" name="txtTelefono" id="txtTelefono" placeholder="1123456789" pattern="^\d+$" minlength="10" maxlength="10" required>
                                    <label for="floatingInput" class="px-3">Teléfono</label>
                                    <div class="fs-5 invalid-feedback">Ejemplo: 1123456789</div>
                                </div>
                                <div class="form__grupo col-md-12 form-floating my-4">
                                    <textarea onkeyup="mensajeChange()" class="form-control pt-5" name="txtMensaje" id="txtMensaje" placeholder="Ingresé un mensaje" style="height: 100px; resize: none;" required>¡Hola! Quiero que se comuniquen conmigo por esta propiedad en venta que vi en el sitio.</textarea>
                                    <label for="floatingTextarea" class="px-3">Mensaje</label>
                                    <div class="fs-5 invalid-feedback">Ingresá un mensaje.</div>
                                </div>
                                <div class="d-grid gap-2 btn-group">
                                    <button type="submit" id="enviar" value="Enviar" class="btn btn-contacto py-3 mb-2" disabled>Contactar</button>
                                    <a class="btn btn-chat py-3 mb-3" href="https://wa.me/541141873847?text=¡Hola!%20Quiero%20que%20se%20comuniquen%20conmigo%20por%20esta%20propiedad%20en%20alquiler%20que%20vi%20en%20Zonaprop." target="_blank" role="button" aria-label="Chat en WhatsApp" style="border-radius: 10px">Contactar por WhatsApp<i class="bi bi-whatsapp ms-3"></i></a>
                                </div>
                                <p>Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p>
                            </form> -->
                        </div>
                    </div>
                </div>
            </article>

            <article class="detalles__mapa bordes-article">
                <h2 class="detalles__mapa__titulo">¿Dónde se ubica?</h2>
                <iframe src="<?php echo $casas['mapa']?>" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </article>
            <?php } ?>
        </section>

    </main>

    <footer class="footer margin__general">
        <div class="footer__logo">
            <a href="./index.php#inicio"><img src="./Img/logo.svg" alt=""></a>
            <p>1999-2023, &#9400; Franco Orellana. Todos los derechos reservados.</p>
        </div>
        <ul class="footer__lista">
            <li>Sobre Nosotros</li>                 
            <li><a href="./index.php#elegirnos" class="link">Por qué elegirnos</a></li>           
            <li><a href="./index.php#horizontes" class="link">Nuevos horizontes</a></li>
            <li><a href="./index.php#propiedades" class="link">Propiedades</a></li>
            <li><a href="./index.php#clientes" class="link">Testimonios</a></li>
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


       <!-- Modal CONTACTO -->
       <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- <div class="modal-header border-0 px-4">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> -->
                <div class="modal-body p-0">
                        <div class="d-block d-md-none col position-sticky px-0">
                            <ul class="nav nav-tabs w-100" id="myTab" role="tablist">
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link active w-100 fs-4 py-3 text-dark" id="mensaje-tab" data-bs-toggle="tab" data-bs-target="#mensajeMobile" type="button" role="tab" aria-controls="mensaje" aria-selected="true">Mensaje</button>
                                </li>
                                <li class="nav-item w-50" role="presentation">
                                    <button class="nav-link w-100 fs-4 py-3 text-dark" id="visita-tab" data-bs-toggle="tab" data-bs-target="#visitaMobile" type="button" role="tab" aria-controls="visita" aria-selected="false">Solicitar visita</button>
                                </li>
                            </ul>


                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="mensajeMobile" role="tabpanel" aria-labelledby="mensaje-tab">
                                    <form class="row g-2 needs-validation m-4" novalidate id="formContacto">
                                        <p class="formulario__parrafo">Contáctese con nosotros por la propiedad.</p>
                                        <div class="form__grupo col-md-12 form-floating mb-4">
                                            <input onkeyup="mensajeChange()" type="email" class="form-control px-3" name="txtEmail" id="txtEmail" placeholder="ejemplo@gmail.com" required>
                                            <label for="floatingInput" class="px-3">Email</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu email. Ej: juanperez@gmail.com</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating">
                                            <input onkeyup="mensajeChange()" type="text" class="form-control px-3" name="txtCliente" id="txtCliente" placeholder="roberto" pattern="[a-zA-Z ]{2,30}" maxlength="30" required>
                                            <label for="floatingInput" class="px-3">Nombre</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu nombre.</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating">
                                            <input onkeyup="mensajeChange()" type="tel" class="form-control px-3" name="txtTelefono" id="txtTelefono" placeholder="1123456789" pattern="^\d+$" minlength="10" maxlength="10" required>
                                            <label for="floatingInput" class="px-3">Teléfono</label>
                                            <div class="fs-5 invalid-feedback">Ejemplo: 1123456789</div>
                                        </div>
                                        <div class="form__grupo col-md-12 form-floating my-4">
                                            <textarea onkeyup="mensajeChange()" class="form-control pt-5" name="txtMensaje" id="txtMensaje" placeholder="Ingresé un mensaje" style="height: 100px; resize: none;" required>¡Hola! Quiero que se comuniquen conmigo por esta propiedad en venta que vi en el sitio.</textarea>
                                            <label for="floatingTextarea" class="px-3">Mensaje</label>
                                            <div class="fs-5 invalid-feedback">Ingresá un mensaje.</div>
                                        </div>
                                        <div class="d-grid gap-2 btn-group">
                                            <button type="submit" id="enviar" value="Enviar" class="btn btn-contacto py-3 mb-2" disabled>Contactar</button>
                                            <a class="btn btn-chat py-3 mb-3" href="https://wa.me/541141873847?text=¡Hola!%20Quiero%20que%20se%20comuniquen%20conmigo%20por%20esta%20propiedad%20en%20alquiler%20que%20vi%20en%20Zonaprop." target="_blank" role="button" aria-label="Chat en WhatsApp" style="border-radius: 10px">Contactar por WhatsApp<i class="bi bi-whatsapp ms-3"></i></a>
                                        </div>
                                        <!-- <p>Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p> -->
                                    </form>
                                </div>
                                <div class="tab-pane fade" id="visitaMobile" role="tabpanel" aria-labelledby="visita-tab">
                                    <form class="row g-2 needs-validation m-4" novalidate id="formVisita">
                                        <div class="swiper mySwiper swiperFecha w-100">
                                            <div class="swiper-wrapper justify-content-between align-items-center">
                                                <?php 
                                                    setlocale(LC_TIME, 'Spanish_Argentina');

                                                    $hoy = date("Y-m-d");
                                                    $fecha1 = date("Y-m-d", strtotime($hoy ."+ 1 days"));
                                                    $fecha2 = date("Y-m-d", strtotime($fecha1 ."+ 7 days"));
                                                    $k = 0;
                                                
                                                    for($i=$fecha1;$i<=$fecha2;$i = date("Y-m-d", strtotime($i ."+ 1 days")))
                                                    {   
                                                        $k += 1;
                                                        ?>
                                                            <div class="swiper-slide d-flex flex-column aling-items-center ">
                                                                <input type="radio" class="btn-check form-check-input" name="txtFecha" id="validationFormCheck<?php echo $k?>" value="<?php echo $i?>" required>
                                                                <label class="d-flex flex-column btn w-100 py-3 border border-2 rounded-2 form-check-label" for="validationFormCheck<?php echo $k?>">
                                                                    <span class="fs-4"><?php echo utf8_encode(strftime("%a", strtotime($i)))?></span>
                                                                    <span class="fs-4 fw-bold"><?php echo utf8_encode(strftime("%d", strtotime($i)))?></span>
                                                                    <span class="fs-4"><?php echo utf8_encode(strftime("%b", strtotime($i)))?></span>    
                                                                </label>
                                                                <?php if($k == 1) echo '<div class="fs-5 invalid-feedback ps-1">Elija fecha</div>';?>
                                                            </div>
                                                        <?php 
                                                    }
                                                ?>
                                            </div>
                                            <div class="swiper-button-next button-next">
                                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 5.33333; overflow: visible;"><g fill="none"><path d="m12 4 11.2928932 11.2928932c.3905243.3905243.3905243 1.0236893 0 1.4142136l-11.2928932 11.2928932"></path></g></svg>
                                            </div>
                                            <div class="swiper-button-prev button-prev">
                                                <svg viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; fill: none; height: 12px; width: 12px; stroke: currentcolor; stroke-width: 5.33333; overflow: visible;"><g fill="none"><path d="m20 28-11.29289322-11.2928932c-.39052429-.3905243-.39052429-1.0236893 0-1.4142136l11.29289322-11.2928932"></path></g></svg>
                                            </div>
                                        </div> 
                                        
                                        <div class="form__grupo d-flex flex-row col-md-12 my-4 px-0">
                                            <div>
                                                <input type="radio" class="btn-check form-check-input" name="txtHorario" value="Mañana" id="validationFormCheckM" required>
                                                <label class="btn border border-2 rounded-2 me-3 form-check-label" for="validationFormCheckM">Por la mañana</label>
                                                <div class="fs-5 invalid-feedback ps-1">Elija una franja horaria</div>
                                            </div>
                                            <div>
                                                <input type="radio" class="btn-check form-check-input" name="txtHorario" value="Tarde" id="validationFormCheckT" required>
                                                <label class="btn border border-2 rounded-2 form-check-label" for="validationFormCheckT">Por la tarde</label>
                                            </div>
                                        </div>
                                        
                                        <div class="form__grupo col-md-12 form-floating mb-4">
                                            <input onkeyup="mensajeChange()" type="email" class="form-control px-3" name="txtEmailVisita" id="txtEmailVisita" placeholder="ejemplo@gmail.com" required>
                                            <label for="floatingInput" class="px-3">Email</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu email. Ej: juanperez@gmail.com</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating">
                                            <input onkeyup="mensajeChange()" type="text" class="form-control px-3" name="txtClienteVisita" id="txtClienteVisita" placeholder="roberto" pattern="[a-zA-Z ]{2,30}" maxlength="30" required>
                                            <label for="floatingInput" class="px-3">Nombre</label>
                                            <div class="fs-5 invalid-feedback">Ingresá tu nombre.</div>
                                        </div>
                                        <div class="form__grupo col-md-6 form-floating mb-4">
                                            <input onkeyup="mensajeChange()" type="tel" class="form-control px-3" name="txtTelVisita" id="txtTelVisita" placeholder="1123456789" pattern="^\d+$" minlength="10" maxlength="10" required>
                                            <label for="floatingInput" class="px-3">Teléfono</label>
                                            <div class="fs-5 invalid-feedback">Ejemplo: 1123456789</div>
                                        </div>
                                        <button type="submit" id="enviarVisita" value="Enviar" class="btn btn-contacto py-3 mb-2" disabled>Contactar</button>
                                        <!-- <p>Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p> -->
                                    </form>
                                </div>
                            </div>
                </div>
                <div class="modal-footer border-0 px-4 pt-0 pb-4">
                    <p class="m-auto fs-5">Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal CONTACTO -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0 px-4">
                    <h4 class="modal-title" id="exampleModalLabel">Contáctese con nosotros</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                    <form class="row g-2 needs-validation m-4 mt-0" id="formContactoMobile" novalidate>
                        <p class="formulario__parrafo">Por la propiedad <?php echo $casas['titulo']?>, ubicada en <?php echo $casas['ubicacion']?></p>
                        <div class="form__grupo col-md-12 form-floating mb-4">
                            <input onkeyup="mensajeChangeMobile()" type="email" class="form-control px-3" id="txtEmailMobile" name="txtEmail" placeholder="ejemplo@gmail.com" required>
                            <label for="floatingInput" class="px-3">Email</label>
                            <div class="fs-5 invalid-feedback">Ingresá tu email. Ej: juanperez@gmail.com</div>
                        </div>
                        <div class="form__grupo col-md-12 form-floating mb-4">
                            <input onkeyup="mensajeChangeMobile()" type="text" class="form-control px-3" id="txtClienteMobile" name="txtCliente" placeholder="roberto" pattern="[A-Za-z]+" minlength="2" maxlength="11" required>
                            <label for="floatingInput" class="px-3">Nombre</label>
                            <div class="fs-5 invalid-feedback">Ingresá tu nombre. Ej: Roberto</div>
                        </div>
                        <div class="form__grupo col-md-12 form-floating mb-2">
                            <input onkeyup="mensajeChangeMobile()" type="tel" class="form-control px-3" id="txtTelefonoMobile" name="txtTelefono" placeholder="1123456789" pattern="^\d+$" minlength="10" maxlength="10" required>
                            <label for="floatingInput" class="px-3">Teléfono</label>
                            <div class="fs-5 invalid-feedback">Ingresá tu teléfono. Ej: 1123456789</div>
                        </div>
                        <div class="form__grupo col-md-12 form-floating my-4">
                            <textarea onkeyup="mensajeChangeMobile()" class="form-control pt-5" id="txtMensajeMobile" name="txtMensaje" style="height: 100px; resize: none;" required>¡Hola! Quiero que se comuniquen conmigo por esta propiedad en venta que vi en el sitio.</textarea>
                            <label for="floatingTextarea2" class="px-3">Mensaje</label>
                        </div>
                        <div class="d-grid gap-2 btn-group">
                            <button type="submit" id="enviarMobile" value="Enviar" class="btn btn-contacto py-3 mb-2" disabled>Contactar</button>
                        </div>
                    </form> 
                </div>
                <div class="modal-footer border-0 px-4 pt-0 pb-4">
                    <p>Al enviar estás aceptando los <span class="terminos">Términos y Condiciones de Uso y la Política de Privacidad</span></p>
                </div>
            </div>
        </div>
    </div> -->


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <!-- toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <!-- Abrir menu mobile -->
    <script src="./js/navbar.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
            },
        });
    </script>

    <script>
        var swiperFecha = new Swiper(".swiperFecha", {
            navigation: {
            nextEl: ".button-next",
            prevEl: ".button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                480: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                640: {
                    slidesPerView: 4,
                    spaceBetween: 10
                }
            }
        });
    </script>

    <!-- BOTON VER MAS -->
    <script>
        var boton = document.getElementById('masDescripcion');

        boton.onclick = function(){ 

            if (document.getElementById ("descripcionCasa").style.display == 'none') { document.getElementById ("descripcionCasa").style.display = 'block'; }
            else { document.getElementById ("descripcionCasa").style.display = 'none'; }
            
            if (document.getElementById ("iconoMas").style.display == 'none') {
                document.getElementById ("iconoMas").style.display = 'block';
                document.getElementById ("iconoMenos").style.display = 'none';
            }
            else {
                document.getElementById ("iconoMas").style.display = 'none';
                document.getElementById ("iconoMenos").style.display = 'block';
            }
        };
    </script>

    <script>
        // Eliminar label que molesta a la hora de elegir 'Primer fecha'
        document.getElementById("validationFormCheck1").onclick = function() {myFunction()};

        // Eliminar label que molesta a la hora de elegir 'Por la mañana'
        document.getElementById("validationFormCheckM").onclick = function() {myFunction()};
        
        function myFunction() {
            const nodo = document.getElementById("txtHorario-error");
            if(nodo) nodo.remove();

            const nodoDos = document.getElementById("txtFecha-error");
            if(nodoDos) nodoDos.remove();
        }
    </script>

    
    <!-- Validacion de campos de formulario NO VACIOS y enviod de notificacion  -->
    <script src="./js/validacionForm.js"></script>


    <!-- Validacion de formulario bootstrap -->
    <script src="./js/validacionBootstrap.js"></script>

    <!-- Validacion de formulario y luego envio del mismo -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    

 

    <script>
        $(document).ready(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    // alert("Enviado");
                    const alerta = document.querySelector('#enviar');
                    
                    toastr.success('Se ha enviado correctamente.', "",{"progressBar": true})


                    // alerta.addEventListener('click', () => {
                        // toastr.success('Se ha enviado correctamente.', "",{"progressBar": true})
                    // })

                    var parametros = {
                        "txtEmail": $('input[type="email"][name="txtEmail"]').val(), 
                        "txtCliente": $('input[type="text"][name="txtCliente"]').val(), 
                        "txtTelefono": $('input[type="tel"][name="txtTelefono"]').val(), 
                        "txtMensaje":$('textarea[name="txtMensaje"]').val(),
                        "txtID": $('input[type="hidden"][name="txtID"]').val(),
                    };

                    console.log(parametros);

                    $.ajax({
                        type: 'POST',
                        url: './formContacto.php',
                        data: parametros,
                    }).done(function(data){
                        $('#formContacto').trigger("reset");
                        $("#enviar").attr("disabled", "disabled");
                    });
                }
            });
            $("#formContacto").submit(function(e) {
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
                    "txtMensaje": {
                        required: true
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

    <script>
        $(document).ready(function() {
            $.validator.setDefaults({
                submitHandler: function() {
                    // alert("Enviado");
                    const alerta = document.querySelector('#enviar');
                    
                    toastr.success('Se ha enviado correctamente.', "",{"progressBar": true})

                    var parametros = {
                        "txtEmailVisita": $('input[type="email"][name="txtEmailVisita"]').val(), 
                        "txtClienteVisita": $('input[type="text"][name="txtClienteVisita"]').val(), 
                        "txtTelVisita": $('input[type="tel"][name="txtTelVisita"]').val(), 
                        "txtFecha": $('input[type="radio"][name="txtFecha"]:checked').val(), 
                        "txtHorario": $('input[type="radio"][name="txtHorario"]:checked').val(), 
                        "txtID": $('input[type="hidden"][name="txtID"]').val(),
                    };

                    console.log(parametros);

                    $.ajax({
                        type: 'POST',
                        url: './formContacto.php',
                        data: parametros,
                    }).done(function(data){
                        $('#formVisita').trigger("reset");
                        $("#enviarVisita").attr("disabled", "disabled");
                    });
                }
            });
            $("#formVisita").submit(function(e) {
                e.preventDefault(); 
            }).validate({
                rules: {
                    "txtFecha": {
                        required: true
                    },
                    "txtHorario": {
                        required: true
                    },
                    "txtEmailVisita": {
                        required: true,
                        email: true
                    },
                    "txtClienteVisita": {
                        required: true,
                        pattern: "[a-zA-Z ]{2,30}",
                        maxlength: 30
                    },
                    "txtTelVisita": {
                        required: true,
                        minlength: 10,
                        maxlength: 10
                    },
                },
                messages: {
                    txtFecha: "",
                    txtHorario: "",
                    txtEmailVisita: "",
                    txtClienteVisita: "",
                    txtTelVisita: ""
                }
            });
        });
    </script>

    <!-- Envio de formulario por ajax -->
    <!-- <script>
        $('#formContactoMobile').submit(function(event){ 
            event.preventDefault(); // cancela el evento clic
            var parametros = {
                "txtEmail": $('input[type="email"][id="txtEmailMobile"]').val(), 
                "txtCliente": $('input[type="text"][id="txtClienteMobile"]').val(), 
                "txtTelefono": $('input[type="tel"][id="txtTelefonoMobile"]').val(), 
                "txtMensaje":$('textarea[id="txtMensajeMobile"]').val(),
                "txtID": $('input[type="hidden"][name="txtID"]').val(),
            };

            console.log(parametros);

            $.ajax({
                type: 'POST',
                url: './contacto.php',
                data: parametros,
            }).done(function(data){
                $('#formContactoMobile').trigger("reset");
                $("#enviarMobile").attr("disabled", "disabled");
            });
        });

        $('#formContacto').submit(function(event){ 
            event.preventDefault(); // cancela el evento clic
            var parametros = {
                "txtEmail": $('input[type="email"][name="txtEmail"]').val(), 
                "txtCliente": $('input[type="text"][name="txtCliente"]').val(), 
                "txtTelefono": $('input[type="tel"][name="txtTelefono"]').val(), 
                "txtMensaje":$('textarea[name="txtMensaje"]').val(),
                "txtID": $('input[type="hidden"][name="txtID"]').val(),
            };

            console.log(parametros);

            $.ajax({
                type: 'POST',
                url: './contacto.php',
                data: parametros,
            }).done(function(data){
                $('#formContacto').trigger("reset");
                $("#enviar").attr("disabled", "disabled");
            });
        });
    </script> -->
</body>
</html>
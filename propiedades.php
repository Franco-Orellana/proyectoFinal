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


    <!-- Fuente de titulos -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
    <!-- Iconos-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

    <!-- Hojas de estilos CSS -->
    <link rel="stylesheet" href="./css/detalles.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/propiedades.css">

    <title>Inmobiliaria</title>
</head>
<body>

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

    <main>
        <?php
            include("administrador/config/db.php");

            $sentenciaSQL = $conexion->prepare("SELECT * FROM casas WHERE estado = 0");
            $sentenciaSQL->execute();
            $listadoDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <section class="sec__breadcrumb px-5">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item fs-4"><a class="breadcrumb-inicio" href="./index.php">Inicio</a></li>
                    <li class="breadcrumb-item active fs-4" aria-current="page">Propiedades</li>
                </ol>
            </nav>
        </section>


        <section class="tipo__propiedad container m-0 mw-100 px-5 px-lg-0 pt-5">
            <div class="fs-4 mb-4 mb-sm-0">
                <span class="fw-bold" id="cantCasas">
                    <?php
                        $resultado = $conexion->prepare("SELECT COUNT(*) total FROM casas WHERE estado = 0");
                        $resultado->execute();
                        $total = $resultado->fetchColumn();
                        echo $total;

                        if($total == 0) echo '<style>.productos__inicio {display:none;}</style>';
                        else  {
                            echo '<style>.productos__grid {display:grid;}</style>';
                            echo '<style>.productos__sin__datos {display:none; margin:auto;}</style>';
                        }
                    ?>
                </span>
                <span> propiedades en venta</span>
            </div>

            <div class="d-flex">
                <select name="orden" id="orden" class="form-select pe-5" aria-label="Ordenar por" style="width: 170px">   
                    <option value="" selected disabled>Ordenar por</option>
                    <option value="ASC">Mayor Precio</option>
                    <option value="DESC">Menor Precio</option>
                </select>
                <button type="button" class="btn p-3 px-4 d-flex align-items-center ms-4 rounded-pill" data-bs-toggle="modal" data-bs-target="#modalFiltros" style="border: 1px solid #00000033; background: transparent;">
                    <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="presentation" focusable="false" style="display: block; height: 18px; width: 18px; fill: rgb(34, 34, 34);"><path d="M5 8c1.306 0 2.418.835 2.83 2H14v2H7.829A3.001 3.001 0 1 1 5 8zm0 2a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm6-8a3 3 0 1 1-2.829 4H2V4h6.17A3.001 3.001 0 0 1 11 2zm0 2a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path></svg>
                    <span class="ms-2 fs-5 fw-bold">Filtros</span>
                </button>
            </div>
        </section>


        <section class="productos px-5 m-0" id="propiedades">

            <div class="productos__sin__datos w-100 my-5 py-5 container flex-wrap">
                <img class="col-lg col-sm-12 col-md-6" src="./img/search-no-results.svg" alt="">
                <div class="productos__sin__datos__leyenda col-lg col-sm-12 col-md-4 d-flex flex-column ms-md-5 ms-lg-0 mt-5 mt-md-0 text-sm-center text-md-start">
                    <span>OOPS!</span>
                    <span>No existen propiedades</span>
                </div>
            </div>


            <article id="filtro" class="productos__grid productos__inicio">
                <?php foreach($listadoDeCasas as $casas) { ?>

                    <div class="productos__card" data-sort='<?php echo $casas['precio']?>'>
                        <div class="productos__card__img"><img src="./img/casas/<?php echo $casas['img_principal']?>" alt=""></div>
                        <div class="productos__card__desc">
                            <div class="productos__card__desc__titulo">
                                <h3><?php echo $casas['titulo']?></h3>
                                <span class="venta">venta</span>
                            </div>
                            <span><i class="bi bi-geo-alt-fill"></i></span>
                            <span class="productos__card__desc--ubicacion"><?php echo $casas['ubicacion']?></span>
                            <div class="productos__card__precio">
                                <h3>$<?php echo number_format($casas['precio'], 0, ',', '.');?> USD</h3>
                                <a href="./detalles.php?producto=<?php echo $casas['id']?>" target="_blank" class="btn-productos">Ver detalles</a>       
                            </div>
                        </div>
                    </div>
                <?php }?>
            </article>
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



    <!-- Modal de filtros -->
    <div class="modal fade" id="modalFiltros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="mx-auto my-3 modal-title fw-bold" id="exampleModalLabel">Filtros</h4>
                    <button type="button" class="ms-0 me-2 btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body container">
                    <form action="./filtrosPropiedades.php" method="POST" class="p-0 m-0" id="formFiltros">
                        <div class="row my-4 mx-3">
                            <h2 class="col-12 fs-2 mb-4 p-0">Rango de precios</h2>
                            <div class="col-12">
                                <div class="row">
                                    <input class="col-2 fw-bold fs-5" type="text" value="USD" disabled style="padding-left: 2rem">
                                    <div class="col selectMin form-floating p-0 mx-4">
                                        <select class="form-select h-100" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="0" selected>0</option>
                                            <option value="100000">100.000</option>
                                            <option value="200000">200.000</option>
                                            <option value="300000">300.000</option>
                                            <option value="400000">400.000</option>
                                            <option value="500000">500.000</option>
                                            <option value="600000">600.000</option>
                                            <option value="700000">700.000</option>
                                            <option value="800000">800.000</option>
                                            <option value="900000">900.000</option>
                                        </select>
                                        <label for="floatingSelect">Precio mínimo</label>
                                    </div>
                                    <div class="col selectMax form-floating p-0">
                                        <select class="form-select h-100" id="floatingSelect" aria-label="Floating label select example">
                                            <option value="100000">100.000</option>
                                            <option value="200000">200.000</option>
                                            <option value="300000">300.000</option>
                                            <option value="400000">400.000</option>
                                            <option value="500000">500.000</option>
                                            <option value="600000">600.000</option>
                                            <option value="700000">700.000</option>
                                            <option value="800000">800.000</option>
                                            <option value="900000">900.000</option>
                                            <option value="100000000" selected>1.000.000 +</option>
                                        </select>
                                        <label for="floatingSelect">Precio máximo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider mb-2 mt-0" style="border-top: 1px solid #00000011"></div>
                        <div class="row my-4 mx-3">
                            <h2 class="col-12 fs-2 mb-4 p-0">Tipo de anunciante</h2>
                            <div class="col-12 p-0 d-flex flex-column">
                                <div class="form-check form-check-inline my-0">
                                    <input class="form-check-input my-0" type="radio" name="anunciante" id="anuncianteRadio1" value="" checked>
                                    <label class="form-check-label fs-5 ms-3" for="anuncianteRadio1">Todos</label>
                                </div>
                                <div class="form-check form-check-inline my-3">
                                    <input class="form-check-input my-0" type="radio" name="anunciante" id="anuncianteRadio2" value="Inmobiliaria">
                                    <label class="form-check-label fs-5 ms-3" for="anuncianteRadio2">Inmobiliaria</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input my-0" type="radio" name="anunciante" id="anuncianteRadio3" value="Dueño directo">
                                    <label class="form-check-label fs-5 ms-3" for="anuncianteRadio3">Dueño directo</label>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider mb-2 mt-0" style="border-top: 1px solid #00000011"></div>
                        <div class="row my-4 mx-3">
                            <h2 class="col-12 fs-2 mb-4 p-0">Tipo de propiedad</h2>
                            <div class="col-12 p-0">
                                <div class="row row-cols-2 ms-0">
                                    <?php 
                                        include("./administrador/config/db.php");
                    
                                        $sentenciaSQL = $conexion -> prepare("SELECT * FROM categorias");
                                        $sentenciaSQL -> execute();
                                        foreach ($sentenciaSQL as $categorias) {
                                            echo "
                                                <div class='form-check mt-4 d-flex aling-items-center'>
                                                    <input class='form-check-input my-0' type='checkbox' value='".$categorias['nombre_categoria']."' id='flexCheck".$categorias['nombre_categoria']."' name='propiedad'>
                                                    <label class='form-check-label fs-5 ms-3' for='flexCheck".$categorias['nombre_categoria']."'>".$categorias['nombre_categoria']."</label>
                                                </div>
                                            ";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider mb-2 mt-0" style="border-top: 1px solid #00000011"></div>
                        <div class="row my-4 mx-3">
                            <h2 class="col-12 fs-2 mb-4 p-0">Superficie</h2>
                            <div class="col-12 p-0 mb-3">
                                <div class="form-check form-check-inline me-5">
                                    <input class="form-check-input text-success my-0" type="radio" name="superficie" id="inlineRadio1" value="Cubierta" checked>
                                    <label class="form-check-label fs-5 ms-3" for="inlineRadio1">Cubierta</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input text-success my-0" type="radio" name="superficie" id="inlineRadio2" value="Total">
                                    <label class="form-check-label fs-5 ms-3" for="inlineRadio2">Total</label>
                                </div>
                            </div>
    
                            <div class="col">
                                <div class="row">
                                    <input class="col-1 fw-bold pe-0 ps-3 fs-5" type="text" value="m²" disabled>
                                    <div class="col form-floating p-0 mx-4">
                                        <input type="text" class="form-control form-control-lg" name="superficieDesde" id="floatingInput" placeholder="Desde" pattern="[0-9]*" maxlength="5" value="">
                                        <label for="floatingInput">Desde</label>
                                    </div>
                                    <div class="col form-floating p-0">
                                        <input type="text" class="form-control form-control-lg" name="superficieHasta" id="floatingInput" placeholder="Hasta" pattern="[0-9]*" maxlength="5" value="">
                                        <label for="floatingInput">Hasta</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider mb-2 mt-0" style="border-top: 1px solid #00000011"></div>
                        <div class="row my-4 mx-3 p-0">
                            <h2 class="col-12 fs-2 mb-4 p-0">Ambientes</h2>
                            <div class="col-12 btn-group btn-group-lg p-0" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnAmbientes" id="btnAmbientes1" value="1" autocomplete="off">
                                <label class="btn rounded" for="btnAmbientes1">1</label>
    
                                <input type="radio" class="btn-check" name="btnAmbientes" id="btnAmbientes2" value="2" autocomplete="off">
                                <label class="btn rounded mx-3" for="btnAmbientes2">2</label>
    
                                <input type="radio" class="btn-check" name="btnAmbientes" id="btnAmbientes3" value="3" autocomplete="off">
                                <label class="btn rounded" for="btnAmbientes3">3</label>
    
                                <input type="radio" class="btn-check" name="btnAmbientes" id="btnAmbientes4" value="4" autocomplete="off">
                                <label class="btn rounded mx-3" for="btnAmbientes4">4</label>
    
                                <input type="radio" class="btn-check" name="btnAmbientes" id="btnAmbientes5" value="5" autocomplete="off">
                                <label class="btn rounded" for="btnAmbientes5">5+</label>
                            </div>
                        </div>
                        <div class="dropdown-divider mb-2 mt-0" style="border-top: 1px solid #00000011"></div>
                        <div class="row my-4 mx-3 p-0">
                            <h2 class="col-12 fs-2 mb-4 p-0">Dormitorios</h2>
                            <div class="col-12 btn-group btn-group-lg p-0" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnDormitorios" id="btnDormitorios1" value="1" autocomplete="off">
                                <label class="btn rounded" for="btnDormitorios1">1</label>
    
                                <input type="radio" class="btn-check" name="btnDormitorios" id="btnDormitorios2" value="2" autocomplete="off">
                                <label class="btn rounded mx-3" for="btnDormitorios2">2</label>
    
                                <input type="radio" class="btn-check" name="btnDormitorios" id="btnDormitorios3" value="3" autocomplete="off">
                                <label class="btn rounded" for="btnDormitorios3">3</label>
    
                                <input type="radio" class="btn-check" name="btnDormitorios" id="btnDormitorios4" value="4" autocomplete="off">
                                <label class="btn rounded mx-3" for="btnDormitorios4">4</label>
    
                                <input type="radio" class="btn-check" name="btnDormitorios" id="btnDormitorios5" value="5" autocomplete="off">
                                <label class="btn rounded" for="btnDormitorios5">5+</label>
                            </div>
                        </div>
                        <div class="dropdown-divider mb-2 mt-0" style="border-top: 1px solid #00000011"></div>
                        <div class="row my-4 mx-3 p-0">
                            <h2 class="col-12 fs-2 mb-4 p-0">Baños</h2>
                            <div class="col-12 btn-group btn-group-lg p-0" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check" name="btnBanios" id="btnBanios1" value="1" autocomplete="off">
                                <label class="btn rounded" for="btnBanios1">1</label>
    
                                <input type="radio" class="btn-check" name="btnBanios" id="btnBanios2" value="2" autocomplete="off">
                                <label class="btn rounded mx-3" for="btnBanios2">2</label>
    
                                <input type="radio" class="btn-check" name="btnBanios" id="btnBanios3" value="3" autocomplete="off">
                                <label class="btn rounded" for="btnBanios3">3</label>
    
                                <input type="radio" class="btn-check" name="btnBanios" id="btnBanios4" value="4" autocomplete="off">
                                <label class="btn rounded mx-3" for="btnBanios4">4</label>
    
                                <input type="radio" class="btn-check" name="btnBanios" id="btnBanios5" value="5" autocomplete="off">
                                <label class="btn rounded" for="btnBanios5">5+</label>
                            </div>
                        </div>
                    </div>
                        <div class="modal-footer justify-content-between p-4">
                            <input class="btn btn-light fs-4" type="reset" value="Limpiar">
                            <button type="submit" class="btn-filtros btn btn-dark fs-4" data-bs-dismiss="modal" aria-label="Close">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

    

    <!-- Abrir menu mobile -->
    <script src="./js/navbar.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
        slidesPerView: "auto",
        spaceBetween: 30,
        centeredSlides: true,
        centeredSlidesBounds: true,
        slideToClickedSlide: true,

        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            640: {
                centeredSlides: false,
                centeredSlidesBounds: false,
                slideToClickedSlide: false,
            }
        },
        });
    </script>

    <script>
        // Ordena descendentemente
        $(document).ready(function(){
            var product = $('.productos__card');   

            $('#orden').change(function(){

                if($('option:nth-of-type(2)').is(':selected')){

                    var result = $('.productos__card').sort(function (a, b) {
                        var contentA = parseInt( $(a).data('sort'));
                        var contentB = parseInt( $(b).data('sort'));
                        return contentA < contentB ? 1 : -1;
                    }).appendTo('.productos__grid');

                    $('.productos__grid').html(result);
                } 
                if($('option:nth-of-type(3)').is(':selected')){
                
                    var result = $('.productos__card').sort(function (a, b) {
                        var contentA =parseInt( $(a).data('sort'));
                        var contentB =parseInt( $(b).data('sort'));
                        return contentA > contentB ? 1 : -1;
                    });

                    $('.productos__grid').html(result);
                }           
            });
        });
    </script>

    <script>

        $(document).ready(function(){

            var val=[];
            $("input:checkbox").change(function() {
                val.length=0;
                $("input:checkbox").each ( function() {
                    if ($(this).is(':checked')) {
                        val.push($(this).val());
                    }
                });
            });

            $('#formFiltros').submit(function(event){ 
                event.preventDefault(); // cancela el evento clic


                var parametros = {
                    "selectMin": $('.selectMin option:selected').val(), 
                    "selectMax": $('.selectMax option:selected').val(), 
                    "anunciante": $("input[name=anunciante]:checked").val(),
                    "propiedad": val,
                    "superficie": $("input[name=superficie]:checked").val(),
                    "ambientes": $("input[name=btnAmbientes]:checked").val(),
                    "dormitorios": $("input[name=btnDormitorios]:checked").val(),
                    "banios": $("input[name=btnBanios]:checked").val(),
                    "supDesde": $('input[type="text"][name="superficieDesde"]').val(), 
                    "supHasta": $('input[type="text"][name="superficieHasta"]').val(),
                };

                console.log(parametros);

                $.ajax({
                    type: 'POST',
                    url: './filtrosPropiedades.php',
                    data: parametros,
                    success:function(response){
                        document.getElementById("filtro").innerHTML = response;
                        document.getElementById("cantCasas").innerHTML = $('.productos__card').length;

                        var cantCasas = $('.productos__card').length;

                        console.log(cantCasas);

                        if(cantCasas == 0){
                            $('.productos__grid').css("display","none");
                            $('.productos__sin__datos').css("display","flex");
                        }
                        else {
                            $('.productos__grid').css("display","grid");
                            $('.productos__sin__datos').css("display","none");
                        }
                    }
                });
            });
        });

    </script>
</html>
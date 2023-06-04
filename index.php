<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <!-- Hoja de estilos CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Hoja de estilos CSS Carrousel-->
    <link rel="stylesheet" href="./css/swiper-bundle.min.css">

    <!-- Fuentes -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Ropa+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Monda&display=swap" rel="stylesheet">
    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

    <title>Inmobiliaria</title>
</head>
<body>

    <header>
        <div class="logo">
            <img src="./img/logo2.svg" alt="">
        </div>

        <div class="navbar-overlay" onclick="toggleMenuOpen()"></div>

        <button type="button" class="navbar-burger" onclick="toggleMenuOpen()">
            <span class="material-icons">menu</span>
        </button>

        <nav class="navbar-menu">
            <ul class="nav__lista">
                <li><a href="#inicio" class="enlace">Inicio</a></li>           
                <li><a href="#elegirnos" class="enlace">Por qué elegirnos</a></li>           
                <li><a href="#horizontes" class="enlace">Nuevos horizontes</a></li>
                <li><a href="#propiedades" class="enlace">Propiedades</a></li>
                <li><a href="#clientes" class="enlace">Testimonios</a></li>
                <li><a href="./vender.php" class="enlace">Vender</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <section class="context" id="inicio">
            <div class="titulo">
                <h1>Encuentra tu hogar perfecto</h1>
                <p>Nos aseguramos de que obtenga la mejor oferta a un precio justo. Además de obtener otros beneficios inclusive.</p>
                <button type="button"class="ir-abajo">Explorar más</button> 
            </div>      
        </section>

        <section class="section__nosotros" id="elegirnos">
            <h2 class="titulo__secciones">Por qué elegirnos</h2>
            <p class="parrafo__secciones">Estamos muy contentos de acompañarte en cada paso con el mejor servicio</p>
            <article class="nosotros">
                <div class="nosotros__card">
                    <img class="nosotros-svg" src="./Img/ribbon-badge-svgrepo-com.svg" alt="imagen de experiencia">
                    <h3 class="nosotros__titulo">Experiencia</h3>
                    <p class="nosotros__parrafo">14 años en el mercado y millones de avisos publicados nos respaldan en la búsqueda de tu hogar.</p>
                </div>
                <div class="nosotros__card">
                    <img class="nosotros-svg" src="./Img/home-house-svgrepo-com.svg" alt="imagen de ventaja">
                    <h3 class="nosotros__titulo">Ventaja</h3>
                    <p class="nosotros__parrafo">Inmobiliarias y dueños directos de todo el país ofrecen las mejores opciones de propiedades para vos.</p>
                </div>
                <div class="nosotros__card">
                    <img class="nosotros-svg" src="./Img/business-management-stopwatch-svgrepo-com.svg" alt="imagen de búsqueda">
                    <h3 class="nosotros__titulo">Búsqueda clara y rápida</h3>
                    <p class="nosotros__parrafo">Pensamos nuestros filtros de avisos para simplificarte la experiencia mientras encuentras tu hogar.</p>
                </div>
            </article>
        </section>
        
        <section class="grid__categorias" id="horizontes">
            <h2 class="titulo__secciones">Descubre nuevos horizontes</h2>
            <p class="parrafo__secciones">Disfruta conociendo nuevos lugares de la mano de nuestra agencia</p>

            <article class="grid__categorias__img">
                <div class="grid__categorias__img--content grid__img--1">
                    <img src="./img/img-grid.webp" alt="">
                </div>
                <div class="grid__categorias__img--content grid__img--2">
                    <img src="./img/img.webp" alt="">
                </div>
                <div class="grid__categorias__img--content grid__img--3">
                    <img src="https://a0.muscache.com/im/pictures/444a8225-e657-4d62-97db-42f7423ae890.jpg?im_w=1200" alt="">
                </div>
                <div class="grid__categorias__img--content">
                    <img src="https://a0.muscache.com/im/pictures/miso/Hosting-50944616/original/174f22d1-fe22-422d-91a3-d8d8e68418b9.jpeg?im_w=1200" alt="">
                </div>
                <div class="grid__categorias__img--content">
                    <img src="https://a0.muscache.com/im/pictures/2a1ef0d3-1427-4f9c-a2ff-82e822caf39d.jpg?im_w=720" alt="">
                </div>
                <div class="grid__categorias__img--content">
                    <img src="https://a0.muscache.com/im/pictures/77f4e45a-f8b5-4ab1-99e9-b725c2521faf.jpg?im_w=960" alt="">
                </div>
            </article>
        </section>

        <?php  
            include("administrador/config/db.php");

            $sentenciaSQL = $conexion->prepare("SELECT * FROM casas WHERE estado = 0 LIMIT 6");
            $sentenciaSQL->execute();
            $listadoDeCasas = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <section class="productos" id="propiedades">
            <h2 class="titulo__secciones">Propiedades</h2>
            <p class="parrafo__secciones">Disfruta buscando en nuestra gran variedad de viviendas</p>

            <article class="productos__grid">
                <?php foreach($listadoDeCasas as $casas) { ?>
                    <div class="productos__card">
                        <div class="productos__card__img"><img src="./img/casas/<?php echo $casas['img_principal']?>" alt=""></div>
                        <div class="productos__card__desc">
                            <div class="productos__card__desc__titulo">
                                <h3><?php echo $casas['titulo']?></h3> 
                                <span class="venta">venta</span>
                            </div>
                            <div>
                                <span><i class="bi bi-geo-alt-fill"></i></span>
                                <span class="productos__card__desc--ubicacion"><?php echo $casas['ubicacion']?></span>                 
                            </div>                  
                            <div class="productos__card__precio">
                                <h3>$<?php echo number_format($casas['precio'], 0, ',', '.');?> USD</h3>      
                                <a href="./detalles.php?producto=<?php echo $casas['id']?>" target="_blank" class="btn-productos">Ver detalles</a>       
                            </div>
                        </div>
                    </div>
                <?php }?>
            </article>
            <a href="./propiedades.php" class="btn-productos-explorar">Explorar más</a>
        </section>

        <section class="testimonios" id="clientes">
            <h2 class="titulo__secciones">Testimonios de nuestros clientes</h2>
            <p class="parrafo__secciones">  Únete a la gran cantidad de personas que han tenido satisfacción con nuestros servicios</p>

            <article class="seccion__testimonios swiper">
                <div class="slide-content carrousel">
                    <div class="swiper-wrapper">
                        <div class="seccion__testimonio__card swiper-slide">
                            <div class="bi-comilla">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fd472c" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                    </svg>
                            </div>
    
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus ullam delectus possimus autem? Illum eveniet labore iste odit accusantium vel debitis, autem commodi maiores aspernatur perferendis voluptas necessitatibus expedita non.</p>
                            
                            <div class="seccion__testimonio__card__persona">
                                <div class="seccion__testimonio__card__persona__img">
                                    <img src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                                </div>
                                <div class="seccion__testimonio__card__persona__texto">
                                    <h4>Sergio</h4>
                                    <p>FECHA</p>
                                </div>
                            </div> 
                        </div>
                        <div class="seccion__testimonio__card swiper-slide">
                            <div class="bi-comilla">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fd472c" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                    </svg>
                            </div>
    
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus ullam delectus possimus autem? Illum eveniet labore iste odit accusantium vel debitis, autem commodi maiores aspernatur perferendis voluptas necessitatibus expedita non.</p>
                            
                            <div class="seccion__testimonio__card__persona">
                                <div class="seccion__testimonio__card__persona__img">
                                    <img src="https://images.unsplash.com/photo-1570295999919-56ceb5ecca61?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDR8fHBlcnNvbmF8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="seccion__testimonio__card__persona__texto">
                                    <h4>Julian</h4>
                                    <p>FECHA</p>
                                </div>
                            </div> 
                        </div>
                        <div class="seccion__testimonio__card swiper-slide">
                            <div class="bi-comilla">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fd472c" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                    </svg>
                            </div>
    
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus ullam delectus possimus autem? Illum eveniet labore iste odit accusantium vel debitis, autem commodi maiores aspernatur perferendis voluptas necessitatibus expedita non.</p>
                            
                            <div class="seccion__testimonio__card__persona">
                                <div class="seccion__testimonio__card__persona__img">
                                    <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDd8fHBlcnNvbmF8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="seccion__testimonio__card__persona__texto">
                                    <h4>Martina</h4>
                                    <p>FECHA</p>
                                </div>
                            </div> 
                        </div>
                        <div class="seccion__testimonio__card swiper-slide">
                            <div class="bi-comilla">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fd472c" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                    </svg>
                            </div>
    
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus ullam delectus possimus autem? Illum eveniet labore iste odit accusantium vel debitis, autem commodi maiores aspernatur perferendis voluptas necessitatibus expedita non.</p>
                            
                            <div class="seccion__testimonio__card__persona">
                                <div class="seccion__testimonio__card__persona__img">
                                    <img src="https://images.unsplash.com/photo-1564564321837-a57b7070ac4f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8ODl8fHBlcnNvbmF8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="seccion__testimonio__card__persona__texto">
                                    <h4>Roberto</h4>
                                    <p>FECHA</p>
                                </div>
                            </div> 
                        </div>
                        <div class="seccion__testimonio__card swiper-slide">
                            <div class="bi-comilla">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fd472c" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                    </svg>
                            </div>
    
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus ullam delectus possimus autem? Illum eveniet labore iste odit accusantium vel debitis, autem commodi maiores aspernatur perferendis voluptas necessitatibus expedita non.</p>
                            
                            <div class="seccion__testimonio__card__persona">
                                <div class="seccion__testimonio__card__persona__img">
                                    <img src="https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8OTN8fHBlcnNvbmF8ZW58MHx8MHx8&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="seccion__testimonio__card__persona__texto">
                                    <h4>Francisco</h4>
                                    <p>FECHA</p>
                                </div>
                            </div> 
                        </div>
                        <div class="seccion__testimonio__card swiper-slide">
                            <div class="bi-comilla">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="#fd472c" class="bi bi-quote" viewBox="0 0 16 16">
                                    <path d="M12 12a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1h-1.388c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 9 7.558V11a1 1 0 0 0 1 1h2Zm-6 0a1 1 0 0 0 1-1V8.558a1 1 0 0 0-1-1H4.612c0-.351.021-.703.062-1.054.062-.372.166-.703.31-.992.145-.29.331-.517.559-.683.227-.186.516-.279.868-.279V3c-.579 0-1.085.124-1.52.372a3.322 3.322 0 0 0-1.085.992 4.92 4.92 0 0 0-.62 1.458A7.712 7.712 0 0 0 3 7.558V11a1 1 0 0 0 1 1h2Z"/>
                                    </svg>
                            </div>
    
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus ullam delectus possimus autem? Illum eveniet labore iste odit accusantium vel debitis, autem commodi maiores aspernatur perferendis voluptas necessitatibus expedita non.</p>
                            
                            <div class="seccion__testimonio__card__persona">
                                <div class="seccion__testimonio__card__persona__img">
                                    <img src="https://images.unsplash.com/photo-1594745561149-2211ca8c5d98?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjU1fHxwZXJzb25hfGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="">
                                </div>
                                <div class="seccion__testimonio__card__persona__texto">
                                    <h4>Irene</h4>
                                    <p>FECHA</p>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="swiper-button-next swiper-navbtn"></div>
                    <div class="swiper-button-prev swiper-navbtn"></div>
                </div>
            </article>
        </section>

        <section class="seccion__logos">
            <article class="seccion__logos__content">
                <img src="./img/airbnb.svg" alt="">
                <img src="./img/logo-meli.png" alt="">
                <img src="./img/logo-zonaprop.svg" alt="">
                <img src="./img/logo-remax-argentina.svg" alt="">
            </article>
        </section>
    </main>

    <footer class="footer margin__general">
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
</body>

    <!-- Swiper JS -->
    <script src="./js/swiper-bundle.min.js"></script>

    <!-- JavaScript carrousel-->
    <script src="./js/script.js"></script>

    <!-- JavaScript efecto abajo-->
    <script src="./js/header.js"></script>

    <!-- Abrir menu mobile -->
    <script src="./js/navbar.js"></script>

    <script>
        const irAbajo = document.querySelector(".ir-abajo");

        irAbajo.addEventListener('click', () => {
            window.scrollTo({
                top: 750,
                left: 750,
                behavior: 'smooth'
            });
        });
    </script>
</html>
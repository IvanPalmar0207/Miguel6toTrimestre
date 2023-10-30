<?php

$_SESSION = true;

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <!--Meta Datos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--CDN de BootStrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!--CDN de los iconos de BootStrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!--Estilos de la pestaña-->
    <link rel="stylesheet" href="../css/paginaPrincipal.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la pestaña-->
    <title>HOME - HOTEL PEGASUS</title>
</head>

<body>
    <!--Barra de navegacion (BootStrap)-->
    <div>
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler" aria-controls="navbar-toggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbar-toggler">
                <a class="navbar-brand">
                    <img src="../img/playa.png" width="90px" alt="Logo de la pagina web">
                </a>
                <p>HOTEL PEGASUS CIDE</p>
                <ul class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="./reservar.php">RESERVAR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./servicios.php">SERVICIOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">CERRAR SESION</a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>

    <!--Descripcion-->
    <section class="aboutHotel">
        <div class="container contenedor">
            <p class="seccion-texto">El Centro Industrial y de Desarrollo empresarial te trae la nueva
                iniciativa la cual es, la hoteleria en Soacha y Sibate uniendo estos dos municipios para
                poder brindar la mejor acesoria en recepcion hotelera, con multiples opciones como lo son;
                los servicios, las reserva, una parte de logeo para asi mismo poder guardar las credenciales
                de los usuarios. Con esta iniciativa se quiere incentivar mas el turismo en los municipios tanto
                de Soacha como de Sibate.
            </p>
        </div>
    </section>

    <!--Seccion de Servicios-->
    <section id="experience" class="servicios">
        <div class="container text-center">
            <div class="row">
                <!--Servicio de Restaurante-->
                <div class="columna col-12 col-md-4">
                    <i class="bi bi-cup-hot"></i>
                    <p class="servicios-titulo">Servicio de Restaurante</p>
                    <p>Cuando hablamos de los diferentes tipos de servicios en restaurantes, nos referimos a las diferentes formas de presentar y servir la comida al cliente. Esta clasificación es esencial para determinar el protocolo de interacción y entrega de alimentos y bebidas a los comensales.</p>
                </div>
                <!--Servicios de Bar-->
                <div class="columna col-12 col-md-4">
                    <i class="bi bi-cup-straw"></i>
                    <p class="servicios-titulo">Servicio de Bar</p>
                    <p>Las bebidas preparadas y tragos de los bartenders derivan de algunas recetas sencillas con tequila, ginebra, ron o vodka. Se dice que si un barman puede hacer una margarita, daiquiri, una piña colada y un martini, debe ser capaz de hacer casi cualquier bebida coctelera que se le pida.</p>
                </div>
                <!--Serivicios de Piscina-->
                <div class="columna col-12 col-md-4">
                    <i class="bi bi-umbrella-fill"></i>
                    <p class="servicios-titulo">Servicio de Piscina</p>
                    <p>Deja atrás el cansancio del día a día y adquiere esta práctica libre de turco y sauna. Aquí podrás relajar tu sistema nervioso, hidratar tu piel si sufres de resequedad, otorgándole un aspecto fresco y radiante, además de mejorar tu respiración.</p>
                </div>
            </div>
        </div>
    </section>

    <!--Seccion de Opiniones-->
    <section id="testimonies" class="testimonios">
    <div id="testimonios-carrusel" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <h2 class="opinionTexto">OPINIONES - CLIENTES</h2>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <img class="testimonios-imagen rounded-circle" src="../img/personaNro1.jpg" alt="Compañero Numero Uno">
                    <p class="testimonio-texto">Es una experiencia increible, me han gustado todas las secciones del hotel, es un proyecto algo nuevo pero me siento muy entusiasmada por haber provado ya este hotel.</p>
                    <div class="testimonio-info">
                        <p class="personaOpinion">Alejandra Pulido</p>
                        <p class="fecha">Fecha: 9-02-2023</p>
                    </div>
                </div>
            </div>
          <div class="carousel-item">
            <div class="container">
                <img class="testimonios-imagen rounded-circle" src="../img/personaNro2.jpg" alt="Compañero Numero Uno">
                <p class="testimonio-texto">Me quedé impresionada por este nuevo hotel. Desde el momento en que entré, me sorprendió la elegante decoración y la limpieza impecable. La habitación era espaciosa y estaba equipada con todas las comodidades modernas que necesitaba.</p>
                <div class="testimonio-info">
                    <p class="personaOpinion">Jimena Martinez</p>
                    <p class="fecha">Fecha: 9-10-2023</p>
                </div>
            </div>
        </div>
          <div class="carousel-item">
            <div class="container">
                <img class="testimonios-imagen rounded-circle" src="../img/personaNro3.jpg" alt="Compañero Numero Uno">
                <p class="testimonio-texto">El personal fue excepcionalmente atento y servicial en todo momento. La ubicación también era perfecta. Sin duda, recomendaría este hotel a cualquier persona que busque una experiencia de alojamiento de primera clase.</p>
                <div class="testimonio-info">
                    <p class="personaOpinion">Esteban Rodriguez</p>
                    <p class="fecha">Fecha: 8-20-2023</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonios-carrusel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonios-carrusel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>
    </section>

    <!--Footer y las redes sociales-->
    <footer class="d-flex flex-column align-items-center justify-content-center">
        <p class="footer-texto text-center">El SENA quiere brindarte la mejor estadia.
            <br>Ven, comparte y disfruta en nuestro Hotel.</p>
        <div class="iconos-redes-sociales d-flex flex-wrap align-items-center justify-content-center">
            <a href="https://web.facebook.com/sena.soacha/?locale=es_LA&_rdc=1&_rdr" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://twitter.com/SENASoacha?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-twitter"></i>
            </a>
            <a href="https://senasoachacide.blogspot.com/" target="_blank" rel="noopener noreferrer">
                <i class="bi bi-mortarboard-fill"></i>
            </a>
            <a href="mailto:servicioalciudadano@sena.edu.co " target="_blank" rel="noopener noreferrer">
                <i class="bi bi-envelope"></i>
            </a>
        </div>
        <div class="derechos-de-autor">Creado por: Centro Industrial y de Desarrollo Empresarial &#169;</div> 
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>
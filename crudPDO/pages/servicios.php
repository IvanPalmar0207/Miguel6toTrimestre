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
    <link rel="stylesheet" href="../css/servicios.css">
    <!--Icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Titulo de la pestaña-->
    <title>SERVICIOS PEGASUS</title>
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
                <p>SERVICIOS DEL HOTEL PEGASUS</p>
                <ul class="navbar-nav d-flex justify-content-center align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="./paginaPrincipal.php">INICIO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./reservar.php">RESERVAR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">CERRAR SESION</a>
                    </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>

    <!--Servicios Carrousel-->

    <section class=" seccion-blanca carrousel">
        <div class="container contenedor">
            <div id="carouselExampleIndicators" class="carousel slide carrusel">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../img/servicios/sRestaurante.jpg" class="d-block w-100" alt="servicioRestaurante">
                    </div>
                  <div class="carousel-item">
                    <img src="../img/servicios/sBar.jpg" class="d-block w-100" alt="servicioBar">
                  </div>
                  <div class="carousel-item">
                    <img src="../img/servicios/sSPA.jpg" class="d-block w-100" alt="servicioSPA">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Siguiente</span>
                </button>
              </div>
        </div>
    </section>

    <!--Servicio de Bar-->
    <section class="serviciosSection bar">
        <div class="container contenedor">
            <h1>BAR</h1>
            <img src="../img/servicios/sBar.jpg" alt="imagenServicioBar" width="380px">
            <p class="seccion-texto"><span class="titulos"><b>TRAGOS Y BEBIDAS</b></span> <br>
                Las bebidas preparadas y tragos de los bartenders derivan de algunas recetas sencillas con tequila, ginebra, ron o vodka. Se dice que si un barman puede hacer una margarita, daiquiri, una piña colada y un martini, debe ser capaz de hacer casi cualquier bebida coctelera que se le pida.
                <br>
                <br>
                <span class="titulos"><b>NUESTRO TOP DE BEBIDAS</b></span>
                <br>
                Estas son las bebidas y tragos favoritos de nuestros clientes:
            </p>
            <div class="contenedorCartas">

                <div class="barCards">
                    <img src="../img/servicios/cosmopolitan.jpg" class="card-img-top" alt="cosmopolitan">
                    <div class="card-body">
                      <h5 class="card-title">Cosmopolitan</h5>
                      <p class="card-text">Son una bebida preparada con vodka, además contiene Triple Sec (un licor con sabor a naranja), jugo de arándano y jugo de limón. Se sirven en copas de martini, a veces con una rodaja de limón para decorar.</p>
                    </div>
                  </div>

                  <div class="barCards">
                    <img src="../img/servicios/mojito.jpg" class="card-img-top" alt="mojito">
                    <div class="card-body">
                      <h5 class="card-title">El Mojito</h5>
                      <p class="card-text">Este trago es una de las bebidas preparadas con ron de origen cubano. Para prepararse, exprime suavemente jugo de limón, azúcar y hojas de menta con un «embrollo».</p>
                    </div>
                  </div>

                  <div class="barCards">
                    <img src="../img/servicios/margaritas.jpg" class="card-img-top" alt="margaritas">
                    <div class="card-body">
                      <h5 class="card-title">Margaritas</h5>
                      <p class="card-text">Son una bebida preparada con vodka, además contiene Triple Sec (un licor con sabor a naranja), jugo de arándano y jugo de limón. Se sirven en copas de martini, a veces con una rodaja de limón para decorar.</p>
                    </div>
                  </div>

            </div>
        </div>
    </section>

    <!--Servicio de Piscina-->

    <section class="serviciosSection piscina">
        <div class="container contenedor">
            <h1>PISCINA</h1>
            <img src="../img/servicios/sPiscina.jpg" alt="ImagenDescripcion" width="380px" height="300px">
            <p class="seccion-texto">Deja atrás el cansancio del día a día y adquiere esta práctica libre de turco y sauna. Aquí podrás relajar tu sistema nervioso, hidratar tu piel si sufres de resequedad, otorgándole un aspecto fresco y radiante, además de mejorar tu respiración.
                <br>
                Durante la sesión de este baño húmedo podrás eliminar toxinas a través del sudor, activar la circulación sanguínea y limpiar a profundidad los poros de tu rostro, evitando así la aparición de acné.
                <br>
                Y que mejor si después te relajas con una deliciosa sesión de masajes. ¿Tentador no? No lo pienses más. ¡Te esperamos!
                <br>
                Este servicio de 1 hora, está dirigido a personas de 18 años en adelante y se debe adquirir bajo previa reserva.
            </p>
        </div>
    </section>

    <!--Servicio de Restaurante-->

    <section class="serviciosSection bar">
        <div class="container contenedor">
            <h1>RESTAURANTE</h1>
            <img src="../img/servicios/sRestaurante.jpg" alt="imagenServicioBar" width="380px">
            <p class="seccion-texto">
                Cuando hablamos de los diferentes tipos de servicios en restaurantes, nos referimos a las diferentes formas de presentar y servir la comida al cliente. Esta clasificación es esencial para determinar el protocolo de interacción y entrega de alimentos y bebidas a los comensales.
                <br>
                <br>
                <span class="titulos">NUESTROS RESTAURANTES</span>
                <br>
                A continuación te mostraremos los tipos de servicios en restaurantes y hoteles más comunes que puedes encontrar, una clasificación esencial para entender cómo se brinda la atención al cliente en diversos establecimientos culinarios. Estos tipos de servicios son:

            </p>
            <div class="contenedorCartas">

                <div class="barCards">
                    <img src="../img/servicios/restauranteNro1.jpg" class="card-img-top" alt="cosmopolitan">
                    <div class="card-body">
                      <h5 class="card-title">Ser.A la Iglesia</h5>
                      <p class="card-text">En este tipo de servicio, los camareros sirven la comida directamente en el plato del comensal desde una bandeja o fuente que llevan en su mano izquierda.</p>
                    </div>
                  </div>

                  <div class="barCards">
                    <img src="../img/servicios/restauranteNro2.jpg" class="card-img-top" alt="mojito">
                    <div class="card-body">
                      <h5 class="card-title">Ser.A la Francesa</h5>
                      <p class="card-text">Este servicio es el más tradicional y formal. La comida se presenta en bandejas o platos al comensal para que él mismo se sirva. Los platos se presentan por la derecha y se retiran por la izquierda.</p>
                    </div>
                  </div>

                  <div class="barCards">
                    <img src="../img/servicios/restauranteNro3.jpg" class="card-img-top" alt="margaritas">
                    <div class="card-body">
                      <h5 class="card-title">Ser.A la Rusa</h5>
                      <p class="card-text">Este tipo de servicio se caracteriza por el uso de un carrito o gueridón donde se realizan los últimos preparativos del plato frente al comensal (por ejemplo, flambeado, fileteado, etc.).</p>
                    </div>
                  </div>

            </div>
        </div>
    </section>


    <!--Servicio de SPA-->

    <section class="serviciosSection piscina">
        <div class="container contenedor">
            <h1>SPA</h1>
            <img src="../img/servicios/sSPA.jpg" alt="ImagenDescripcion" width="380px" height="300px">
            <p class="seccion-texto">Un espacio de relajacion
                Las bebidas preparadas y tragos de los bartenders derivan de algunas recetas sencillas con tequila, ginebra, ron o vodka. Se dice que si un barman puede hacer una margarita, daiquiri, una piña colada y un martini, debe ser capaz de hacer casi cualquier bebida coctelera que se le pida.
                <br>
                Planes Corporativos y convenios
                <br>
                Promueve la salud y el bienestar para tus colaboradores con AR SPA Contamos con variedad de planes a nivel corporativo para la relajación del cuerpo y la salud mental, que fomentaran un clima organizacional favorable y un estilo de vida saludable
                <br>
                Si estás buscando premiar a tus empleados o regalar bonos a tus clientes, AR Spa se adapta a tus necesidades a través de un variado portafolio de servicios. Celebraciones para el día de la madre, día del padre, San Valentin, cumpleaños, día de la secretaria y mucho mas.
            </p>
        </div>
    </section>


    <!--Servicio de Room Service-->

    <section class="serviciosSection roomService">
        <div class="container contenedor">
            <h1>ROOM SERVICE</h1>
            <img src="../img/servicios/sRS.jpg" alt="ImagenDescripcion" width="380px" height="300px">
            <p class="seccion-texto">
                <span class="titulo"><b>Servicios a la habitacion</b></span>
                <br>
                Sin duda, el servicio de habitaciones de los hoteles es una vara de medir muy importante a la hora de elegir el hotel perfecto. Muchas personas se centran en algo especial y que diferencie el hotel de los demás, como una grande y elegante spa o un servicio de animación para niños que ayude los padres a descansar tras un año entero haciendo malabares con la escuela, los deportes y las rabietas.                
            </p>
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
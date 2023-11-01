<?php

$_SESSION = FALSE;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="shortcut icon" href="./img/logoPhp.png" type="image/x-icon">
    <!--CDN de los iconos de BootStrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--CDN de BootStrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>HOTEL PEGASUS</title>
</head>
<body>

    <!--Encabezado de la pagina-->
    <header>
        <div class="logoIzquierdo">
            <img src="./img/playa.png" alt="logoIzquierda">
        </div>
        <h1 class="tituloEncabezado">HOTEL PEGASUS</h1>
        <div class="logoIzquierdo">
            <img src="./img/playa.png" alt="logoIzquierda">
        </div>
    </header>

    <!--Barra de navegacion-->
    <div class="contenedorEnlaces">
        <ul>
            <li><a href="./pages/iniciarSesion.php">Iniciar Sesion</a></li>
            <li><a href="./pages/registrarCliente.php">Registrarse</a></li>
            <li><a href="./pages/validacionMostrar.php">Administrador</a></li>
            <li><a href="./pages/validacionRecepcionista.php">Recepcionista</a></li>
        </ul>
    </div>

    <!--Contenido de la pagina-->
    <section class="descripcionContenido">
        <div class="contenedorDescripcion">
            <h2><i class="bi bi-airplane-engines-fill"></i>PODRAS DISFRUTAR DE LA MEJOR COMPAÑIA<i class="bi bi-airplane-engines-fill"></i></h2>
            <div class="componentesDescripcion">
                <div class="textoDescripcion">
                    <p>El Hotel Pegasus es un oasis de elegancia y comodidad que desafía la imaginación. Ubicado en un escenario pintoresco en las faldas
                        de las majestuosas montañas del Valle de Serenidad, este hotel es un verdadero refugio de lujo. Desde el momento en que pones un pie en el vestíbulo,
                        te sumerges en un mundo de encanto y sofisticación.

                        La arquitectura del Hotel Pegasus combina elementos contemporáneos con un toque de la antigua Grecia, evocando la sensación de estar en un palacio de los dioses.
                        Las columnas esculpidas, los mosaicos relucientes y las esculturas mitológicas que decoran los espacios comunes te transportan a un mundo mágico.
                        Las habitaciones son santuarios de relajación y opulencia. Cada una de las habitaciones y suites está diseñada con una paleta de colores suaves y lujosos tejidos que te envuelven en un confort celestial.
                        Desde los balcones privados, podrás disfrutar de vistas panorámicas de los verdes valles y los picos nevados que se elevan hacia el cielo.
                    </p>
                </div>
                <div class="imagenDescripcion">
                    <img src="./img/spa.jpg" alt="imagenSpa" width="100px" height="100px">
                </div>
            </div>
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
        <div class="derechos-de-autor">Creado por: Ivan David Palmar Martinez&#169;</div> 
    </footer>
</body>
</html>
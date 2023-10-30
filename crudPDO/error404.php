<!DOCTYPE html>
<html lang="en">
<head>
    <!--Etiquetas Meta-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Enlaces a logo e iconos de Bootstrap-->
    <link rel="shortcut icon" href="./img/logoPhp.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--Titulo de la pestaña-->
    <title>Pagina No Encontrada</title>
</head>
<style>
    /*
        Tipografia
    */

    @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap');

    /*
        Cuerpo de la pagina de error 404
    */

    h2{
        text-align: center;
        font-family: 'Oswald', sans-serif;
        font-size: 50px;
        margin-top: 150px;
    }

    .contenedorImg{
        text-align: center;
    }

    p{
        text-align: center;
        font-family: 'Roboto', sans-serif;
    }

    .contenedorEnlace a{
        width: 100%;
        display: flex;
        justify-content: center;
    }

    a{
        font-family: 'Roboto', sans-serif;
        color: turquoise;
        font-weight: bold;
    }

    img{
        margin-top: 40px;
        width: 200px;
        height: 200px;
        border-radius: 30%;
    }
</style>
<body>
    <h2>PAGE NOT FOUND <i class="bi bi-bug-fill"></i> <br> ERROR 404</h2>
    <p>The request URL was not found on this server. That's all we khow currently.</p>
    <div class="contenedorEnlace">
        <a href="../index.php">Go Back?</a>
    </div>
    <div class="contenedorImg">
        <img src="../img/error404.jpg" alt="imagenError">
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <!--Etiqueta de MetaDatos-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link del icono de la pestaña-->
    <link rel="shortcut icon" href="../img/logoPhp.png" type="image/x-icon">
    <!--Link de iconos de BootStrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!--Nombre de la pestaña-->
    <title>Sin Permisos</title>
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

    i{
        color:crimson;
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
        color: crimson;
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

    <h2>YOU DON'T HAVE THE PERMISSIONS <i class="bi bi-hand-thumbs-down-fill"></i> <br> ERROR 403</h2>
    <p>We're sorry, but you don't have access to this page. That's all we khow.</p>
    <div class="contenedorEnlace">
        <a href="../index.php">Go Back?</a>
    </div>
    <div class="contenedorImg">
        <img src="../img/error403.png" alt="imagenError">
    </div>

</body>
</html>
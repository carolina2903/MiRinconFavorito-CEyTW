<?php session_start() ?>
<?php require 'conexionPDO.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Rincón Favorito</title>
    <!--CSS BOOTSTRAP-->
    <link rel="styleheet" href="css/bootstrap.css">
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <?php require 'estaticos/nav.php'; ?>

    <br><br><br>

    <?php require 'estaticos/jumbotron.php'; ?>

    <!-- JAVASCRIPT -->
    <script>
        function entrar() {
            window.location.assign("index_.php")
        }
    </script>

    <!-- HTML -->
    <div class="container">

        <form action="exito.php" method="POST">

            <div class='alert alert-info' style='width:33%'>¡Tu compra se ha realizado con éxito!</div>
            <a href="index_.php">Volver a la página principal</a>

        </form>
    </div> <br><br><br><br><br><br><br>




</body>

</html>


<!-- PHP -->
<?php
//AQUÍ SE AÑADE A LA BASE DE DATOS (INSERTS)


//Y CUANDO SE HA AÑADIDO, SE BORRA LA SESIÓN PARA QUE DESAPAREZCA DEL CARRITO
$_SESSION["carrito"] = array();
$_SESSION["familiares"] = array();
?>
<?php require 'estaticos/footer.php'; ?>
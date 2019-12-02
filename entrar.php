<?php session_start(); ?>
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
            <h3 class="text-center">Iniciar sesión</h3>
            <br>
            <form action="entrar.php" method="POST">
                <!-- <div class="form-group"> -->
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                <!-- </div> -->
                <!-- <div class="form-group"> -->
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                <!-- </div> -->
                <!-- <div class="form-check"> -->
                <!-- <button onclick="entrar()" name="entrar" style="float: right;">Entrar</button> -->
                <!-- <a class="btn btn-info" name="entrar" style="float: right;" onClick='entrar()'>Iniciar sesión</a> -->
                <!-- </div> -->

                <input type="submit" name="enviar" value="Enviar" />
                <input type="reset" name="reset" value="Borrar" />
            </form>
        </div> <br><br>


        <?php require 'estaticos/footer.php'; ?>


    </body>

    </html>


    <!-- PHP -->
    <?php

    if (isset($_POST['enviar'])) {

        $sql_select = "SELECT * FROM cliente WHERE email='" . $_POST["email"] . "'";
        $resultado_select = $conexionPDO->query($sql_select);

        if (!$resultado_select) {
            die("Error al realizar la consulta sql: $conexionPDO->errno: $conexionPDO->error");
        }

        $usuario_select = $resultado_select->fetch(PDO::FETCH_ASSOC); /* Recorremos las consultas */

        if (!$usuario_select) { /* Si el usuario no existe */
            echo "<div align='center' style='color:red'>El usuario no existe en el sistema. <br>Por favor, vuelva a intentarlo.</div>";
            //die(header('Location: entrar.php?fallo2=true')); //die para no seguir ejecutando
        } else {



            if ($_POST['password'] == $usuario_select['passwd']) { /* Si se ha encontrado usuario y su contraseña coincide con la introducida */

                $_SESSION['email'] = $_POST["email"]; /* Guardamos la sesion del usuario */


                /* Para establecer las cookies si se ha señalado checkbox recordar */
                // if (isset($_POST['recordar']) && $_POST['recordar'] == '1') {
                //     setcookie('usuariocookie', $_POST["usuario"], time() + (60 * 60 * 24 * 365));
                //     setcookie('passwordcookie', $_POST["password"], time() + (60 * 60 * 24 * 365));
                //     echo '<div class="alert alert-success">Cookie creada.</div>';
                // }

                echo "<script language='javascript'> entrar(); </script>";
                //header('Location: index_.php'); /* Nos redirigimos a index */
            } else {
                echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
                // header('Location: entrar.php?fallo1=true'); /* Si la contraseña no esta asociada a ese usuario volvemos a intentarlo */
            }
        }
    }
    //FEEDBACK para incorrecto
    // if (isset($_GET["fallo1"]) && $_GET["fallo1"] == 'true') {
    //     echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
    // }
    // if (isset($_GET["fallo2"]) && $_GET["fallo2"] == 'true') {
    //     echo "<div align='center' style='color:red'>El usuario no existe en el sistema. <br>Por favor, vuelva a intentarlo.</div>";
    // }
    // if (isset($_GET["fallonosesion"]) && $_GET["fallonosesion"] == 'true') {
    //     echo "<div align='center' style='color:red'>No hay sesión iniciada. <br>Para acceder a paginacliente hay que INICIAR SESION</div>";
    // }


    ?>
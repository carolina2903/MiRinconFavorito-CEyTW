<?php session_start()?>
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

                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
                <br>
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña">
                <br><br>

                <div class="form-group form-check">
        			<input type="checkbox" class="form-check-input" id="recordar" name="recordar" value="1">
        			<label class="form-check-label" for="recordar">Recordarme</label>
    			</div>

                <input type="submit" class="btn btn-info" style="float: right; width:200px;" name="enviar" value="Entrar" />

                
            </form>
        </div> <br><br><br><br><br><br><br>

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
        } else {
            
            $iguales = password_verify($_POST['password'], $usuario_select['passwd']);
            if ($iguales) {
                $_SESSION['email'] = $_POST["email"]; /* Guardamos la sesion del usuario */
            
                /* Para establecer las cookies si se ha señalado checkbox recordar */
                if (isset($_POST['recordar']) && $_POST['recordar'] == '1') {
                    setcookie('emailcookie', $_POST["email"], time() + (60 * 60 * 24 * 365));
                    echo '<div class="alert alert-success">Cookie creada.</div>';
                }
                
                echo "<script language='javascript'> entrar(); </script>";
                
            } else {
                echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
                echo '<br><br><br>';
            }
        }
    }
    ?>

<br><br><br><br><br><br>
    <?php require 'estaticos/footer.php'; ?>
    

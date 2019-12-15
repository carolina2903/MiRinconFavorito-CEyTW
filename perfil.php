<?php
session_start();
require 'conexionPDO.php';
?>


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

    <!-- JAVASCRIPT -->
    <script>
        function detailspedido() {
            window.location.assign("pedido.php");
        }

        function ocultarBoton() {
            document.getElementById('cambiarestado').style.display = 'none';
        }

        function mostrarBoton() {
            document.getElementById('cambiarestado').style.display = 'block';
        }
    </script>

    <?php require 'estaticos/jumbotron.php'; ?>


    <!-- JAVASCRIPT JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".boton").click(function() {
                var idpedido = "";
                // Obtenemos el id del pedido <td> de la fila
                // seleccionada
                $(this).parents("tr").find(".id").each(function() {
                    idpedido = $(this).html();
                });
                console.log(idpedido);
                
                /* Lo metemos en el enlace */
                document.getElementById("botondetalles").href = "pedido.php?idpedido=" + idpedido;
                window.location.assign("pedido.php?idpedido=" + idpedido);
            })
        });
    </script>

    <br><br>

    <!-- PARA LOS DATOS DEL USUARIO LOGGEADO -->

    <?php
    $sql = "SELECT * FROM cliente WHERE email='" . $_SESSION["email"] . "'";
    $resultado = $conexionPDO->query($sql);
    $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
    ?>

    <h3 class="text-left"><b>Mi perfil</b> </h3>
    <hr />
    <div class="container">
        <div class="row">
            <b>Nombre:</b>&nbsp;
            <?php echo $usuario['nombre']; ?>
        </div><br><br>
        <div class="row">
            <b>Apellidos:</b>&nbsp;
            <?php echo $usuario['apellidos']; ?>
        </div><br><br>
        <div class="row">
            <b>Teléfono:</b>&nbsp;
            <?php echo $usuario['telefono']; ?>
        </div><br><br>
        <div class="row">
            <b>Email:</b>&nbsp;
            <?php echo $usuario['email']; ?>
        </div><br><br>
    </div>

    <br><br><br>



    <?php
    if (isset($_SESSION['email'])) {
        if ($_SESSION['email'] != "carmen98mi@gmail.com") {
            ?>
            <!-- PARA LOS PEDIDOS DEL CLIENTE LOGGEADO - !ADMIN-->

            <h3 class="text-left"><b>Pedidos</b> </h3><br>

            <?php
            $sql3 = "SELECT * FROM pedido WHERE id_cliente='" . $usuario['id_cliente'] . "'"; //sacar ID cliente para pedidos
            $resultado2 = $conexionPDO->query($sql3);
            ?>

            <?php
            echo '<table class="table table-hover text-center" style="width=50%">
                <thead>
                    <tr>
                        <th scope="col">ID PEDIDO</th>
                        <th scope="col">TIPO ENVÍO</th>
                        <th scope="col">PRECIO TOTAL</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">ESTADO</th>
                        <th scope="col"></th>
                    </tr>
                </thead>';
            while ($pedido = $resultado2->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr><tbody>';
                echo '<td class="id">' . $pedido['id_pedido'] . '</td>';
                echo '<td>' . $pedido['tipo_envio'] . '</td>';
                echo '<td>' . $pedido['precio_total'] . '</td>';
                echo '<td>' . $pedido['fecha_compra'] . '</td>';
                echo '<td>' . $pedido['estado'] . '</td>';
                echo '<td><button class="boton" id="botondetalles" href="pedido.php?idpedido=0" target="_self" style="float:left;height:25px;width:60px;margin-top:0px;background-color:#44989b;color:black;font-size:small;">Detalles</button></td>';
                echo '</tr></tbody>';
            }
            echo  "</table>";

        }//if CLIENTE !ADMIN


        //////////////////////////////////////////////////
        /////////////////////////////////////////////////
        /////////////////////////////////////////////////


        else {
            /* MODO ADMINISTRADOR */
            //ver todos los pedidos
            ?>
            <!--para mouse over-->
            <h3 class="text-left"><b>Pedidos clientes</b> </h3><br>
            <form action="perfil.php" method="post">

                <select class="btn bg-white dropdown-toggle" STYLE="font-style: italic; " name="filtro" onchange="this.form.submit()">>Ordenar por:
                    <option value="empty" STYLE="font-style: italic; ">Seleccione filtro...</option>
                    <option value="fecha">Fecha</option>
                    <option value="tipoenvio">Tipo de envio</option>
                    <option value="estado">Estado</option>
                </select>

                <br>
            </form>

            <!--<form action="perfil.php" method="post">
            </form>
            -->
            <?php
                    if (isset($_POST['cambiarestado'])) {
                        $sql2 = array();
                        $nuevoestado = array();
                        $ids = array();
                        $i = 1;
                        $sql4 = "SELECT * FROM pedido INNER JOIN envio ON pedido.tipo_envio = envio.id_envio ORDER BY pedido.estado"; //sacar ID cliente para pedidos
                        $resultado = $conexionPDO->query($sql4);
                        ?>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID PEDIDO</th>
                            <th scope="col">FECHA</th>
                            <th scope="col">ESTADO</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>

                    <?php
                                $j = 0;
                                $ids = array();

                                while ($pedido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tbody class="pedido">';
                                    echo '<td>' . $pedido['id_pedido'] . '</td>';
                                    echo '<td>' . $pedido['fecha_compra'] . '</td>';
                                    echo '<td>';
                                    echo '<form action="perfil.php" method="post">';
                                    echo '<select class="btn bg-white dropdown-toggle" STYLE="font-style: italic; " name="estadonuevo' . $j . '">';
                                    echo    '<option value="tramitado">Tramitado</option>';
                                    echo    '<option value="enviado">Enviado</option>';
                                    echo    '<option value="recibido">Recibido</option>';
                                    echo    '<option value="cancelado">Cancelado</option>';
                                    echo '</from>';
                                    echo '</select>';
                                    echo '</td>';

                                    echo "<br>";

                                    $j++;
                                } //while TABLA

                                echo '</tbody>';
                                echo '</table>';
                                echo '<button style="float: right; width:200px;" class="btn btn-info" name="cambiarestadofinal" type="submit">Confirmar estado</button>';
                                echo '<br><br><br><br><br>';
                            } //if cambiar estado

                            $i = 0;
                            $sql2 = array();
                            $nuevoestado = array();

                            if (isset($_POST['cambiarestadofinal'])) {
                                while (isset($_POST['estadonuevo' . $i])) {
                                    $nuevoestado[] = $_POST['estadonuevo' . $i];
                                    //echo "<br>mi nuevo estado es: ".$nuevoestado[$i];
                                    $ids[] = $i + 1;
                                    //echo "mi numero de pedido es: ".$ids[$i];
                                    //echo "<br>mi numero de pedido es: ".$ids[$i];
                                    $sql2[] = "UPDATE pedido SET estado=? WHERE id_pedido=?";
                                    //echo "<br>mi sentencia es: ".$sql2[$i];
                                    $i++;
                                } //WHILE preparar sentencias
                            } //si se ha cambiado el estado pestañitas

                            if ($sql2 != NULL) {
                                for ($i = 0; $i < sizeof($sql2); $i++) {
                                    //echo "<br>".$sql2[$i];
                                    //echo "<br>".$ids[$i];
                                    //echo "<br>".$nuevoestado[$i];

                                    $stmt = $conexionPDO->prepare($sql2[$i])->execute([$nuevoestado[$i], $ids[$i]]);
                                    $sql == NULL;
                                } //for UPDATE
                            } 

                            //<?php
                            //||isset($_POST['cambiarestadofinal'])
                            if (!isset($_POST['cambiarestado'])) {
                                ?>
                    <form method="POST" action="perfil.php">
                        <button id="cambiarestado" style="float: left; width:200px;" class="btn btn-info" name="cambiarestado" type="submit">Cambiar estado</button>
                    </form><br><br><br><br><br>
                    <?php
                                //$sql == NULL;
                                if (isset($_POST['filtro']) || $sql == NULL) {
                                    if ($_POST['filtro'] == "fecha") {
                                        //echo "filtrando por fecha...";
                                        $sql = "SELECT * FROM pedido INNER JOIN envio ON pedido.tipo_envio = envio.id_envio ORDER BY pedido.fecha_compra"; //sacar ID cliente para pedidos
                                    } else if ($_POST['filtro'] == "tipoenvio") {
                                        //echo "filtrando por tipo de envio...";            
                                        $sql = "SELECT * FROM pedido INNER JOIN envio ON pedido.tipo_envio = envio.id_envio ORDER BY envio.id_envio"; //sacar ID cliente para pedidos
                                    } else if ($_POST['filtro'] == "estado") {
                                        //echo "filtrando por estado...";
                                        $sql = "SELECT * FROM pedido INNER JOIN envio ON pedido.tipo_envio = envio.id_envio ORDER BY pedido.estado"; //sacar ID cliente para pedidos
                                    }
                                } else {
                                    if ($sql == NULL) {
                                        //echo "hoy no se filtra.......es bromi, por fecha :3";
                                        $sql = "SELECT * FROM pedido INNER JOIN envio ON pedido.tipo_envio = envio.id_envio ORDER BY pedido.fecha_compra"; //sacar ID cliente para pedidos
                                    } else
                                        $sql = "SELECT * FROM pedido INNER JOIN envio ON pedido.tipo_envio = envio.id_envio ORDER BY pedido.fecha_compra"; //sacar ID cliente para pedidos

                                } //if FILTROS

                                // echo $sql;
                                $resultado = $conexionPDO->query($sql);

                                //cargamos tabla
                                ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID PEDIDO</th>
                                <th scope="col">TIPO ENVÍO</th>
                                <th scope="col">PRECIO TOTAL</th>
                                <th scope="col">FECHA</th>
                                <th scope="col">ESTADO</th>
                                <th scope="col">ANOTACIONES</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <?php
                                    //datos tabla
                                    while ($pedido = $resultado->fetch(PDO::FETCH_ASSOC)) {
                                        echo '<tbody class="pedido">';
                                        echo '<td>' . $pedido['id_pedido'] . '</td>';
                                        echo '<td>' . $pedido['tipo_envio'] . '</td>';
                                        echo '<td>' . $pedido['precio_total'] . '</td>';
                                        echo '<td>' . $pedido['fecha_compra'] . '</td>';
                                        echo '<td>' . $pedido['estado'] . '</td>';
                                        echo '<td>' . $pedido['anotaciones'] . '</td>';
                                    } //while
                                    ?>
                        </tbody>
                    </table>

        <?php
                } //visualización NORMAL  





            } //if ADMIN 
        }
        ?>




        <br><br><br><br>

        <?php 
        require 'estaticos/footer.php';
        $sql == NULL;
        ?>




</body>

</html>
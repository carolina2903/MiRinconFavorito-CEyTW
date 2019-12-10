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
                // window.sessionStorage.setItem("idpedido", idpedido);
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


    <!-- PARA LOS PEDIDOS DEL CLIENTE LOGGEADO -->

    <h3 class="text-left"><b>Pedidos</b> </h3><br>

    <?php
    $sql2 = "SELECT * FROM pedido WHERE id_cliente='" . $usuario['id_cliente'] . "'"; //sacar ID cliente para pedidos
    $resultado2 = $conexionPDO->query($sql2);
    ?>

    <?php

    echo '<table class="table">
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


    ?>


    <br><br><br><br>

    <?php require 'estaticos/footer.php'; ?>

</body>


</html>
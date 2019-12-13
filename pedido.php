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





    <?php

    $idpedido = $_GET['idpedido']; /* Coger el idpedido por get del link */

    $sql_select = "SELECT * FROM pedido WHERE id_pedido='" . $idpedido . "'";
    $resultado_select = $conexionPDO->query($sql_select);
    $pedido = $resultado_select->fetch(PDO::FETCH_ASSOC);

    ?>


    <h3 class="text-left">
        <b>Pedido número:</b>&nbsp;
        <?php echo $pedido['id_pedido']; ?>
    </h3>

    <hr />
    <div class="container">
        <div class="row">
            <b>Tipo envío:</b>&nbsp;
            <?php echo $pedido['tipo_envio']; ?>
        </div>
        <div class="row">
            <b>Cupón:</b>&nbsp;
            <?php echo $pedido['cupon']; ?>
        </div>
        <div class="row">
            <b>Precio total:</b>&nbsp;
            <?php echo $pedido['precio_total']; ?>
        </div>
        <div class="row">
            <b>Fecha compra:</b>&nbsp;
            <?php echo $pedido['fecha_compra']; ?>
        </div>
        <div class="row">
            <b>Anotaciones:</b>&nbsp;
            <?php echo $pedido['anotaciones']; ?>
        </div>
        <div class="row">
            <b>Estado:</b>&nbsp;
            <?php echo $pedido['estado']; ?>
        </div>
    </div>


    <!-- PARA LOS PRODUCTOS DEL PEDIDO SELECCIONADO -->
    <hr />
    <br>
    <h3 class="text-left"> <b>Productos</b> </h3>

    <?php
    $sql = "SELECT * FROM producto WHERE id_producto= (SELECT id_producto FROM linea_producto WHERE id_pedido = '" . $idpedido . "')";
    $resultado2 = $conexionPDO->query($sql);
    ?>

    <?php
    echo '<table class="table">
    <thead>
        <tr>
            <th scope="col">ID PRODUCTO</th>
            <th scope="col">ID TIPO PRODUCTO</th>
            <th scope="col">PRECIO UNIDAD</th>
            <th scope="col">TAMAÑO</th>
        </tr>
    </thead>';
    while ($productospedido = $resultado2->fetch(PDO::FETCH_ASSOC)) {

        echo '<tr><tbody>';
        echo '<td>' . $productospedido['id_producto'] . '</td>';
        echo '<td>' . $productospedido['id_tipo_producto'] . '</td>';
        echo '<td>' . $productospedido['precio_unidad'] . '</td>';
        echo '<td>' . $productospedido['tamaño'] . '</td>';
        echo '</tr></tbody>';
    }
    echo '</table>';
    ?>


    <br><br><br>
    <div class="container">
        <div class="row">
            <b>Subtotal:</b>&nbsp;
            <!-- <p>{{formatPrice order.subtotal}}</p> -->
        </div>
        <div class="row">
            <b>Tax:</b>&nbsp;
            <!-- <p>{{formatTax order.tax}}</p> -->
        </div>
        <div class="row">
            <b>Total:</b>&nbsp;
            <!-- <p>{{formatPrice order.total}}</p> -->
        </div>
    </div>

    <br><br><br><br><br>

    <?php include 'estaticos/footer.php'; ?>


</body>

</html>
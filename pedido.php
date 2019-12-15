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
        </div><br>
        <div class="row">
            <b>Cupón:</b>&nbsp;
            <?php echo $pedido['cupon']; ?>
        </div><br>
        <div class="row">
            <b>Precio total:</b>&nbsp;
            <?php echo $pedido['precio_total']; ?>
        </div><br>
        <div class="row">
            <b>Fecha compra:</b>&nbsp;
            <?php echo $pedido['fecha_compra']; ?>
        </div><br>
        <div class="row">
            <b>Anotaciones:</b>&nbsp;
            <?php echo $pedido['anotaciones']; ?>
        </div><br>
        <div class="row">
            <b>Estado:</b>&nbsp;
            <?php echo $pedido['estado']; ?>
        </div><br>
    </div>
    
    <br><br>

    <!-- PARA LOS PRODUCTOS DEL PEDIDO SELECCIONADO -->
    <hr />
    <br><br>
    <h3 class="text-left"> <b>Productos</b> </h3><br>

    <?php
    $sql = "SELECT * FROM producto WHERE id_producto IN (SELECT id_producto FROM linea_producto WHERE id_pedido = '" . $idpedido . "')";
    $resultado = $conexionPDO->query($sql);
    ?>


    <div class="container-fluid">
    <table class="table table-hover table-responsive">
        <thead class="thead-light">
            <tr class="text-center">
                <th style="width: 150px;" scope="col">PRECIO UNIDAD</th>
                <th style="width: 200px;" scope="col">TAMAÑO</th>
                <th style="width: 300px;" scope="col" class="text-left">NOMBRE</th>
                <th style="width: 200px;" scope="col"></th>  
            </tr>
        </thead>

    <?php

    echo '<tbody>';
    
    while ($productospedido = $resultado->fetch(PDO::FETCH_ASSOC)) {

        echo '<tr>';
        echo '<td class="text-center">' . $productospedido['precio_unidad'] . '</td>';
        echo '<td class="text-center">' . $productospedido['tamaño'] . '</td>';
        
        switch ($productospedido['id_tipo_producto']) {

            /* CORAZON DOBLE SR/SRA */
            case 1:    
                $sql1 = "SELECT * FROM cojines_corazon_dobles_senor_senora WHERE id_producto='" . $productospedido['id_producto'] . "'";
                $resultado1 = $conexionPDO->query($sql1);
                $cojintipo1 = $resultado1->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo1['nombre_tipo']."</td>";
                echo "<td class='text-center'>";
                ?>
                    <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item"><b>Cojín Señor: </b><?php echo $cojintipo1["nombre_senor"];?></a>
                        <a class="dropdown-item"><b>Cojín Señora:</b> <?php echo $cojintipo1["nombre_senora"];?></a>
                        <a class="dropdown-item"><b>Fecha: </b><?php echo $cojintipo1["fecha"]; ?></a>
                        <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $cojintipo1["tipo_letra"]; ?></a>
                    </div>
                <?php
                echo "</td></tr>";
            break;


            /* AMISTAD */
            case 2:
                $sql2 = "SELECT * FROM cojin_amistad WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado2 = $conexionPDO->query($sql2);
                $cojintipo2 = $resultado2->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo2['nombre_tipo']."</td>";
                echo "<td>";
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Género: </b><?php echo $cojintipo2["genero"]; ?></a>
                        </div>
                    </div>
                <?php
                echo "</td></tr>";
            break;


            /* CORAZONES DOBLE NORMAL */
            case 3:
                $sql3 = "SELECT * FROM cojin_corazones_dobles WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado3 = $conexionPDO->query($sql3);
                $cojintipo3 = $resultado3->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo3['nombre_tipo']."</td>";
                echo "<td>";
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Cojín izquierda:</b> <?php echo $cojintipo3["nombre_izquierda"]; ?></a>
                            <a class="dropdown-item"><b>Cojín derecha: </b><?php echo $cojintipo3["nombre_derecha"]; ?></a>
                            <a class="dropdown-item"><b>Fecha: </b><?php echo $cojintipo3["fecha"]; ?></a>
                            <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $cojintipo3["tipo_letra"]; ?></a>
                        </div>
                    </div>
                <?php
                echo "</td></tr>";
            break;


            /* DIBUJO INDIVIDUAL */
            case 4:
                $sql4 = "SELECT * FROM cojin_dibujo_individual WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado4 = $conexionPDO->query($sql4);
                $cojintipo4 = $resultado4->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo4['nombre_tipo']."</td>";
                echo "<td>";
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Dibujo: </b><?php echo $cojintipo4["dibujo"]; ?></a>
                            <a class="dropdown-item"><b>Fecha: </b><?php echo $cojintipo4["fecha"]; ?></a>
                            <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $cojintipo4["tipo_letra"]; ?></a>
                        </div>
                    </div>
                <?php
                echo "</td></tr>";
            break;


            /* FAMILIAR */
            case 5:
                $sql5 = "SELECT * FROM cojin_familia WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado5 = $conexionPDO->query($sql5);
                $cojintipo5 = $resultado5->fetch(PDO::FETCH_ASSOC);

                echo "<td>".$cojintipo5['nombre_tipo']."</td>";
                echo "<td>";
                $idinternocojin = $cojintipo5['idinterno'];

                $sql5M = "SELECT * FROM miembro WHERE id_miembro IN (SELECT id_miembro FROM linea_miembro WHERE idinterno_cojin ='" . $idinternocojin . "')";
                $resultado5M = $conexionPDO->query($sql5M);

                $sql_numerofamiliares = "SELECT count(*) FROM miembro WHERE id_miembro IN (SELECT id_miembro FROM linea_miembro WHERE idinterno_cojin ='" . $idinternocojin . "')";
                $resultado_numerofamiliares = $conexionPDO->query($sql_numerofamiliares);
                $numerofamiliares=0;
                while($numfamrow=$resultado_numerofamiliares->fetch(PDO::FETCH_ASSOC)){
                    $numerofamiliares++;
                }
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item"><b>Número de familiares: </b><?php echo $numerofamiliares; ?></a>
                        <a class="dropdown-item"><b>FAMILIARES:</b></a>
                            <?php
                            while($cojintipo5M=$resultado5M->fetch(PDO::FETCH_ASSOC)){
                            ?>
                                <a class="dropdown-item">&nbsp &nbsp<?php echo $cojintipo5M['tipo_familiar'];?> --> <?php echo $cojintipo5M["nombre"]; ?> </a>
                            <?php } ?>
                            <a class="dropdown-item"><b>Información adicional: </b><?php echo $cojintipo5["informacion_adicional"]; ?></a>
                        </div>
                    </div>         
                <?php
                echo "</td></tr>";
            break;


            /* NATALICIO */
            case 6:
                $sql6 = "SELECT * FROM cojin_natalicio WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado6 = $conexionPDO->query($sql6);
                $cojintipo6 = $resultado6->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo6['nombre_tipo']."</td>";
                echo "<td>";
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Nombre bebé: </b><?php echo $cojintipo6["nombre"]; ?></a>
                            <a class="dropdown-item"><b>Fecha nacimiento: </b><?php echo $cojintipo6["fecha"]; ?></a>
                            <a class="dropdown-item"><b>Hora nacimiento: </b><?php echo $cojintipo6["hora"]; ?></a>
                            <a class="dropdown-item"><b>Altura: </b><?php echo $cojintipo6["medida"]; ?></a>
                            <a class="dropdown-item"><b>Peso: </b><?php echo $cojintipo6["peso"]; ?></a>
                            <a class="dropdown-item"><b>Color primario: </b><?php echo $cojintipo6["color_primario"]; ?></a>
                            <a class="dropdown-item"><b>Color secundario: </b><?php echo $cojintipo6["color_secundario"]; ?></a>
                        </div>
                    </div>
                <?php
                echo "</td></tr>";
            break;


            /* PROFESION DOBLE sr/sra */
            case 7:
                $sql7 = "SELECT * FROM cojin_profesion_doble_sr_sra WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado7 = $conexionPDO->query($sql7);
                $cojintipo7 = $resultado7->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo7['nombre_tipo']."</td>";
                echo "<td>";
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Cojín izquierda: </b><?php echo $cojintipo7["srsraizquierda"];
                                echo "&nbsp";
                                echo $cojintipo7["nombreizquierda"];
                                echo " - " . $cojintipo7["profesionizquierda"]; ?></a>
                            <a class="dropdown-item"><b>Cojín derecha: </b><?php echo $cojintipo7["srsraderecha"];
                                echo "&nbsp";
                                echo $cojintipo7["nombrederecha"];
                                echo " - " . $cojintipo7["profesionderecha"]; ?></a>
                            <a class="dropdown-item"><b>Fecha: </b><?php echo $cojintipo7["fecha"]; ?></a>
                            <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $cojintipo7["tipo_letra"]; ?></a>
                        </div>
                    </div>
                <?php
                echo "</td></tr>";
            break;


            /* PROFESIONES DOBLE */
            case 8:
                $sql8 = "SELECT * FROM cojin_profesion_doble WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado8 = $conexionPDO->query($sql8);
                $cojintipo8 = $resultado8->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo8['nombre_tipo']."</td>";
                echo "<td>";
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Cojín izquierda: </b><?php echo $cojintipo8["nombre_izquierda"];
                                echo " - " . $cojintipo8["profesion_izquierda"]; ?></a>
                            <a class="dropdown-item"><b>Cojín derecha: </b><?php echo $cojintipo8["nombre_derecha"];
                                echo " - " . $cojintipo8["profesion_derecha"];  ?></a>
                            <a class="dropdown-item"><b>Fecha: </b><?php echo $cojintipo8["fecha"]; ?></a>
                            <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $cojintipo8["tipo_letra"]; ?></a>
                        </div>
                    </div>
                <?php
                echo "</td></tr>";
            break;


            /* PROFESION INDIVIDUAL */
            case 9:
                $sql9 = "SELECT * FROM cojin_profesion_individual WHERE id_tipo_producto='" . $productospedido['id_tipo_producto'] . "'";
                $resultado9 = $conexionPDO->query($sql9);
                $cojintipo9 = $resultado9->fetch(PDO::FETCH_ASSOC);
                echo "<td>".$cojintipo9['nombre_tipo']."</td>";
                echo "<td>";
                ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Nombre: </b><?php echo $cojintipo9["nombre"]; ?></a>
                            <a class="dropdown-item"><b>Profesión o hobby: </b><?php echo $cojintipo9["profesion"]; ?></a>
                            <a class="dropdown-item"><b>Fecha: </b><?php echo $cojintipo9["fecha"]; ?></a>
                            <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $cojintipo9["tipo_letra"]; ?></a>
                        </div>
                    </div>
                <?php
                echo "</td></tr>";
            break;
        } /* fin switch */
       
    } /* fin while */
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    ?>

    <br><br><br>


    <!-- PRECIOS -->
    <?php
        $precio_total=0;
        $precio_total = $pedido['precio_total'];
        $subtotal = $precio_total * 0.79;
        $impuestos = $precio_total * 0.21;
    ?>
    <div class="container">
        <div class="row">
            <b>Subtotal:</b>&nbsp;
            <?php echo $subtotal; ?>
        </div>
        <div class="row">
            <b>Tax:</b>&nbsp;
            <?php echo $impuestos; ?>
        </div>
        <div class="row">
            <b>Total:</b>&nbsp;
            <?php echo $precio_total; ?>
        </div>
    </div>


    <br><br><br><br><br>
    <?php include 'estaticos/footer.php'; ?>


</body>

</html>
<?php
session_start();
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


    <?php require 'estaticos/nav.php';

    ?>



    <br><br><br>

    <?php require 'estaticos/jumbotron.php'; ?>

    <script>
        function comprar() {
            window.location.assign("comprar.php");

        }
    </script>




</body>

</html>

<?php
//session_start();
require 'conexionPDO.php';
if (isset($_POST['vaciarcarritobutton'])) {
    $_SESSION["carrito"] = array();
    $_SESSION["familiares"] = array();
}


if (isset($_POST['comprarbutton'])) {

    if (count($_SESSION["carrito"]) > 0) {
        echo "<script>window.location.assign('comprar.php');</script>";
    } else {
        echo "<div class='alert alert-info' style='width:15%;'>El carrito está vacío</div>";
    }
}
//if(isset($_SESSION["carrito"])){ 
echo "<h3 class='text-left'><b>Carrito de la compra</b> </h3>";
echo "<hr>";
echo "<br>";

echo "<br>";
echo "<div class='container'>";
echo "<h3 class='text-left'> <b>Lista de productos</b> </h3>";
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>Nombre de producto</th>";
echo "<th scope='col'>Precio</th>";
echo "<th scope='col'>Total</th>";

echo "<th scope='col'></th>";

echo "</tr>";
$precio_carrito = 0;
//print_r($_SESSION["carrito"]);

if ($_SESSION["carrito"] != NULL) {

    for ($i = 0; $i < count($_SESSION["carrito"]); ++$i) {
        $precio = intval($_SESSION["carrito"][$i]["precio_unidad"]);
        echo "<tr>";
        echo "<th name='colnombre' id='colnombre' scope='col'>" . $_SESSION["carrito"][$i]["nombre"] . "</th>";
        echo "<th name='colprecio' id='colprecio' scope='col'>" . $precio . "</th>";
        echo "<th name='coltotal' id='coltotal' scope='col'>" . $precio . "</th>";
        echo "<th name='colid' id='colid' scope='col'></th>";
        switch ($_SESSION["carrito"][$i]["id_tipo_producto"]) {
            case 1:
                echo "<th>";
                ?>
                <div class='dropdown'>
                    <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item"><b>Cojín izquierda: </b><?php echo $_SESSION["carrito"][$i]["srsraizquierda"];
                                                                                        echo "&nbsp";
                                                                                        echo $_SESSION["carrito"][$i]["nombre_izquierda"]; ?></a>
                        <a class="dropdown-item"><b>Cojín derecha:</b> <?php echo $_SESSION["carrito"][$i]["srsraderecha"];
                                                                                    echo "&nbsp";
                                                                                    echo $_SESSION["carrito"][$i]["nombre_derecha"]; ?></a>
                        <a class="dropdown-item"><b>Fecha: </b><?php echo $_SESSION["carrito"][$i]["fechacojin"]; ?></a>
                        <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $_SESSION["carrito"][$i]["tipo_letra"]; ?></a>

                    </div>

                <?php
                            echo "</th>";
                            break;


                        case 2:
                            echo "<th>";
                            ?>
                    <div class='dropdown'>
                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item"><b>Género: </b><?php echo $_SESSION["carrito"][$i]["genero"]; ?></a>
                        </div>

                    <?php
                                echo "</th>";

                                break;


                            case 3:
                                echo "<th>";
                                ?>
                        <div class='dropdown'>
                            <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                            <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                <a class="dropdown-item"><b>Cojín izquierda:</b> <?php echo $_SESSION["carrito"][$i]["nombre_izquierda"]; ?></a>
                                <a class="dropdown-item"><b>Cojín derecha: </b><?php echo $_SESSION["carrito"][$i]["nombre_derecha"]; ?></a>
                                <a class="dropdown-item"><b>Fecha: </b><?php echo $_SESSION["carrito"][$i]["fechacojin"]; ?></a>
                                <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $_SESSION["carrito"][$i]["tipo_letra"]; ?></a>

                            </div>

                        <?php
                                    echo "</th>";
                                    break;


                                case 4:
                                    echo "<th>";
                                    ?>
                            <div class='dropdown'>
                                <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                                <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                    <a class="dropdown-item"><b>Nombre: </b><?php echo $_SESSION["carrito"][$i]["nombrecojin"]; ?></a>
                                    <a class="dropdown-item"><b>Dibujo: </b><?php echo $_SESSION["carrito"][$i]["dibujo"]; ?></a>
                                    <a class="dropdown-item"><b>Fecha: </b><?php echo $_SESSION["carrito"][$i]["fechacojin"]; ?></a>
                                    <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $_SESSION["carrito"][$i]["tipo_letra"]; ?></a>

                                </div>

                            <?php
                                        echo "</th>";
                                        break;


                                    case 5:
                                        echo "<th>";
                                        ?>
                                <div class='dropdown'>
                                    <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                        <a class="dropdown-item"><b>Número de familiares: </b><?php echo $_SESSION["carrito"][$i]["numerodefamiliares"]; ?></a>

                                        <?php


                                                    for ($k = 0; $k <  $_SESSION["carrito"][$i]["numerodefamiliares"]; ++$k) {       ?>
                                            <a class="dropdown-item"><b>Tipo familiar: </b><?php echo $_SESSION["familiares"][$k]["tipofamiliar"]; ?></a>
                                            <a class="dropdown-item"><b>Nombre familiar: </b><?php echo $_SESSION["familiares"][$k]["nombrefamiliar"]; ?></a>
                                        <?php } ?>
                                        <a class="dropdown-item"><b>Información adicional: </b><?php echo $_SESSION["carrito"][$i]["informacionadicional"]; ?></a>

                                    </div>

                                <?php
                                            echo "</th>";
                                            break;


                                        case 6:
                                            echo "<th>";
                                            ?>
                                    <div class='dropdown'>
                                        <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                                        <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                            <a class="dropdown-item"><b>Nombre bebé: </b><?php echo $_SESSION["carrito"][$i]["nombrebebe"]; ?></a>
                                            <a class="dropdown-item"><b>Fecha nacimiento: </b><?php echo $_SESSION["carrito"][$i]["fechanacimiento"]; ?></a>
                                            <a class="dropdown-item"><b>Hora nacimiento: </b><?php echo $_SESSION["carrito"][$i]["horanacimiento"]; ?></a>
                                            <a class="dropdown-item"><b>Altura: </b><?php echo $_SESSION["carrito"][$i]["altura"]; ?></a>
                                            <a class="dropdown-item"><b>Peso: </b><?php echo $_SESSION["carrito"][$i]["peso"]; ?></a>
                                            <a class="dropdown-item"><b>Color primario: </b><?php echo $_SESSION["carrito"][$i]["colorprimario"]; ?></a>
                                            <a class="dropdown-item"><b>Color secundario: </b><?php echo $_SESSION["carrito"][$i]["colorsecundario"]; ?></a>

                                        </div>

                                    <?php
                                                echo "</th>";
                                                break;


                                            case 7:
                                                echo "<th>";
                                                ?>
                                        <div class='dropdown'>
                                            <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                                            <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                                <a class="dropdown-item"><b>Cojín izquierda: </b><?php echo $_SESSION["carrito"][$i]["srsraizquierda"];
                                                                                                                echo "&nbsp";
                                                                                                                echo $_SESSION["carrito"][$i]["nombre_izquierda"];
                                                                                                                echo " - " . $_SESSION["carrito"][$i]["profesionizquierda"]; ?></a>
                                                <a class="dropdown-item"><b>Cojín derecha: </b><?php echo $_SESSION["carrito"][$i]["srsraderecha"];
                                                                                                            echo "&nbsp";
                                                                                                            echo $_SESSION["carrito"][$i]["nombre_derecha"];
                                                                                                            echo " - " . $_SESSION["carrito"][$i]["profesionderecha"]; ?></a>
                                                <a class="dropdown-item"><b>Fecha: </b><?php echo $_SESSION["carrito"][$i]["fecha"]; ?></a>
                                                <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $_SESSION["carrito"][$i]["tipo_letra"]; ?></a>

                                            </div>

                                        <?php
                                                    echo "</th>";
                                                    break;

                                                case 8:
                                                    echo "<th>";
                                                    ?>
                                            <div class='dropdown'>
                                                <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                                                <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                                    <a class="dropdown-item"><b>Cojín izquierda: </b><?php echo $_SESSION["carrito"][$i]["nombre_izquierda"];
                                                                                                                    echo " - " . $_SESSION["carrito"][$i]["profesion_izquierda"]; ?></a>
                                                    <a class="dropdown-item"><b>Cojín derecha: </b><?php echo $_SESSION["carrito"][$i]["nombre_derecha"];
                                                                                                                echo " - " . $_SESSION["carrito"][$i]["profesion_derecha"];  ?></a>
                                                    <a class="dropdown-item"><b>Fecha: </b><?php echo $_SESSION["carrito"][$i]["fechacojin"]; ?></a>
                                                    <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $_SESSION["carrito"][$i]["tipo_letra"]; ?></a>

                                                </div>

                                            <?php
                                                        echo "</th>";
                                                        break;
                                                    case 9:
                                                        echo "<th>";
                                                        ?>
                                                <div class='dropdown'>
                                                    <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                                                    <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                                        <a class="dropdown-item"><b>Nombre: </b><?php echo $_SESSION["carrito"][$i]["nombrecojin"]; ?></a>
                                                        <a class="dropdown-item"><b>Profesión o hobby: </b><?php echo $_SESSION["carrito"][$i]["profesion"]; ?></a>
                                                        <a class="dropdown-item"><b>Fecha: </b><?php echo $_SESSION["carrito"][$i]["fechacojin"]; ?></a>
                                                        <a class="dropdown-item"><b>Tipo de letra: </b><?php echo $_SESSION["carrito"][$i]["tipo_letra"]; ?></a>

                                                    </div>

                                        <?php
                                                    echo "</th>";
                                                    break;
                                            }




                                            echo "</tr>";
                                            $precio_carrito += $precio;
                                        }
                                    }
                                    $subtotal = $precio_carrito * 0.79;
                                    $impuestos = $precio_carrito * 0.21;


                                    echo "</thead>";
                                    echo "<tbody>";

                                    echo "</tbody>";
                                    echo "</table>";
                                    echo "<hr>";
                                    echo "<div class='row justify-content-start'>";
                                    echo "<b>Subtotal:</b>&nbsp;" . $subtotal;
                                    echo "</div>";
                                    echo "<div class='row justify-content-start'>";
                                    echo "<b>Impuestos: </b>&nbsp;" . $impuestos;
                                    echo "</div>";
                                    echo "<div class='row justify-content-start'>";
                                    echo "<b>Total: </b>&nbsp;" . $precio_carrito;
                                    echo "</div>";
                                    echo "</div>";
                                    echo "<hr>";
                                    echo "<form method='post'>";

                                    echo "<button type='submit' class='btn btn-danger' style='float: right; text:center;'  name='vaciarcarritobutton' value='Vaciar carrito' /> Vaciar carrito</button>";
                                    echo "<button type='submit' class='btn btn-info' style='float: right; text:center;'  name='comprarbutton' value='Comprar' />Comprar</button>";

                                    echo "</form>";

                                    echo "&nbsp;";

                                    echo "<br><br><br><br>";


                                    echo "<br><br><br>";






                                    ?>

                                        <?php require 'estaticos/footer.php'; ?>
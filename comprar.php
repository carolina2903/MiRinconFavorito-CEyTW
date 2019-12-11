<?php
require 'conexionPDO.php';

require 'ClaseCarrito.php';
$carrito = new carrito();
$carrito->__construct();
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
        var f = new Date();
        document.getElementById('fechacompra') = Date.now();
        //document.getElementById('fechacompra')=(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
    </script>



    <script>
        function validar() {
            window.location.assign("perfil.php");
        }
    </script>


    <div class="container">
        <h3 class="text-left"><b>Datos de compra</b></h3>
        <hr>
        <br>
        <h4 id="demo2"></h4>
        <form>
            <h6 class="text-left"><b>Día de compra</b></h6>

            <div class="form-group">
                <input type="date" class="form-control" id="fechacompra" aria-describedby="dateHelp" readonly value="<?php echo date("Y-m-d"); ?>">

            </div>

            <br>
            <?php
            $sql = "SELECT * FROM cliente WHERE email='" . $_SESSION["email"] . "'";
            $resultado = $conexionPDO->query($sql);
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
            ?>
            <h6 class="text-left"><b>Nombre:</b></h6>

            <div class="form-group">
                <input type="text" class="form-control" name="nombre" id="nombre" maxlength="25" value="<?php echo $usuario["nombre"]; ?>">
            </div>

            <h6 class="text-left"><b>Apellidos:</b></h6>

            <div class="form-group">
                <input type="text" class="form-control" id="apellidos" name="apellidos" maxlength="40" value="<?php echo $usuario["apellidos"]; ?>">
            </div>

            <h6 class="text-left"><b>Email:</b></h6>

            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" maxlength="40" value="<?php echo $usuario["email"]; ?>">
            </div>

            <h6 class="text-left"><b>Teléfono:</b></h6>

            <div class="form-group">
                <input type="text" class="form-control" name="telefono" id="telefono" maxlength="9" value="<?php echo $usuario["telefono"]; ?>">
            </div>
            <br>
            <h5 class="text-left"><b>Dirección de envío</b></h5>
            <br>

            <h6 class="text-left"><b>Calle y número:</b></h6>

            <div class="form-group">
                <input type="text" class="form-control" name="calleynumero" id="calleynumero" maxlength="50">
            </div>

            <h6 class="text-left"><b>Piso, escalera, portal, letra:</b></h6>

            <div class="form-group">
                <input type="text" class="form-control" name="piso" id="piso" placeholder="Piso/Escalera..." maxlength="50">
            </div>

            <div class="row">

                <div class="col-sm-2">
                    <h6 class="text-left"><b>Código Postal:</b></h6>

                    <input type="text" class="form-control" name="cp" id="cp" maxlength="5">


                </div>
                <div class="col-sm-6">
                    <h6 class="text-left"><b>Localidad:</b></h6>

                    <input type="text" class="form-control" name="localidad" id="localidad" required="required" placeholder="Nombre...">
                </div>

                <div class="col-sm-2">
                    <h6 class="text"><b>Provincia:</b></h6>
                    <select class="btn bg-white dropdown-toggle" name="provincia" id="provincia" required="required" value="" style="border:1px solid #ced4da">

                        <option value="A Coruña">A Coruña</option>
                        <option value="Álava">Álava</option>
                        <option value="Albacete">Albacete</option>
                        <option value="Alicante">Alicante</option>
                        <option value="Almería">Almería</option>
                        <option value="Asturias">Asturias</option>
                        <option value="Ávila">Ávila</option>
                        <option value="Badajoz">Badajoz</option>
                        <option value="Baleares">Baleares</option>
                        <option value="Barcelona">Barcelona</option>
                        <option value="Burgos">Burgos</option>
                        <option value="Cáceres">Cáceres</option>
                        <option value="Cádiz">Cádiz</option>
                        <option value="Cantabria">Cantabria</option>
                        <option value="Castellón">Castellón</option>
                        <option value="Ciudad Real">Ciudad Real</option>
                        <option value="Córdoba">Córdoba</option>
                        <option value="Cuenca">Cuenca</option>
                        <option value="Girona">Girona</option>
                        <option value="Granada">Granada</option>
                        <option value="Guadalajara">Guadalajara</option>
                        <option value="Guipuzkoa">Guipuzkoa</option>
                        <option value="Huelva">Huelva</option>
                        <option value="Huesca">Huesca</option>
                        <option value="Jaén">Jaén</option>
                        <option value="La Rioja">La Rioja</option>
                        <option value="Las Palmas">Las Palmas</option>
                        <option value="León">León</option>
                        <option value="Lérida">Lérida</option>
                        <option value="Lugo">Lugo</option>
                        <option value="Madrid">Madrid</option>
                        <option value="Málaga">Málaga</option>
                        <option value="Murcia">Murcia</option>
                        <option value="Navarra">Navarra</option>
                        <option value="Ourense">Ourense</option>
                        <option value="Palencia">Palencia</option>
                        <option value="Pontevedra">Pontevedra</option>
                        <option value="Salamanca">Salamanca</option>
                        <option value="Segovia">Segovia</option>
                        <option value="Sevilla">Sevilla</option>
                        <option value="Soria">Soria</option>
                        <option value="Tarragona">Tarragona</option>
                        <option value="Santa Cruz de Tenerife">Santa Cruz de Tenerife</option>
                        <option value="Teruel">Teruel</option>
                        <option value="Toledo">Toledo</option>
                        <option value="Valencia">Valencia</option>
                        <option value="Vizcaya">Vizcaya</option>
                        <option value="Zamora">Zamora</option>
                        <option value="Zaragoza">Zaragoza</option>
                    </select>
                </div>
            </div>
            <br>

            <h6 class="text-left"><b>Notas del pedido (opcional):</b></h6>

            <div class="form-group">
                <input type="text" class="form-control" name="notas" id="notas" aria-describedby="addressHelp">
            </div>


            <br>
            

            </table>



        </form>

    </div>


    <?php require 'estaticos/footer.php'; ?>


</body>

</html>
<?php
//session_start();
if (isset($_POST['vaciarcarritobutton'])) {
    $_SESSION["carrito"] = array();
}

echo "<hr>";

echo "<div class='container'>";
echo "<h3 class='text-left'> <b>Lista de productos</b> </h3>";
echo "<table class='table'>";
echo "<thead>";
echo "<tr>";
echo "<th scope='col'>Nombre de producto</th>";
echo "<th scope='col'>Precio</th>";
echo "<th scope='col'></th>";

echo "</tr>";
$precio_carrito = 0;
//print_r($_SESSION["carrito"]);

if ($_SESSION["carrito"] != NULL) {

    for ($i = 0; $i < count($_SESSION["carrito"]); ++$i) {
        $precio = intval($_SESSION["carrito"][$i]["precio_unidad"]);
        echo "<tr>";
        echo "<th name='colnombre' id='colnombre' scope='col'>" . $_SESSION["carrito"][$i]["nombre"] . "</th>";
        echo "<th name='colprecio' id='colprecio' scope='col'>" . $precio . " €" . "</th>";
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


                                                //FALTA POR HACEEEEER
                                            case 7:
                                                echo "<th>";
                                                ?>
                                        <div class='dropdown'>
                                            <a class="dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Detalles&nbsp;</a>
                                            <div class="dropdown-menu dropdown-menu" aria-labelledby="dropdown01">
                                                <a class="dropdown-item"><b>Cojín izquierda: </b><?php echo $_SESSION["carrito"][$i]["nombre_izquierda"]; ?></a>
                                                <a class="dropdown-item"><b>Cojín derecha: </b><?php echo $_SESSION["carrito"][$i]["nombre_derecha"]; ?></a>
                                                <a class="dropdown-item"><b>Fecha: </b><?php echo $_SESSION["carrito"][$i]["fechacojin"]; ?></a>
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


                                                        case 10:
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
                                        echo "<b>Subtotal:</b>&nbsp;" . $subtotal . " €";
                                        echo "</div>";
                                        echo "<div class='row justify-content-start'>";
                                        echo "<b>Impuestos: </b>&nbsp;" . $impuestos . " €";
                                        echo "</div>";
                                        echo "<div class='row justify-content-start'>";
                                        echo "<b>Total: </b>&nbsp;" . $precio_carrito . " €";
                                        echo "</div>";
                                        echo "</div>";
                                        echo "<hr>";


                                        /* echo "&nbsp;";
                                echo "<div class='form-check'>";
                                echo "<a onClick='validar()' class='btn btn-info' style='float: right;' role='button'>Finalizar compra</a>";
                                echo "</div>"; */


                                        for ($i = 0; $i < count($_SESSION["carrito"]); ++$i) {
                                            $precio = $_SESSION["carrito"][$i]["precio_unidad"] * 0.79;
                                            $carrito->introduce_producto($_SESSION["carrito"][$i]["nombre"], $precio, 1);
                                        }

                                        $carrito->imprime_carrito(0.21, $precio_carrito);
                                        $carrito->comprar();
                                        echo "<br><br><br><br><br><br>";

                                        //}
                                        //else{
                                        //    echo "El carrito está vacío.";
                                        //}
                                        ?>
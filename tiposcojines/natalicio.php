<?php
session_start();
echo "<br>";

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cojín Nacimiento Bebé</title>
    <!--CSS BOOTSTRAP-->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
    <link rel="styleheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

<!-- JAVASCRIPT JQUERY--> <!-- PARA ACTIVAR O DESACTIVAR COMPRAR -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        <?php if(isset($_SESSION['email'])) { ?>
            $(document).ready(function() {
                document.getElementById('comprarbutton').disabled=false;
            });
        <?php } else { ?>
            $(document).ready(function() {
                document.getElementById('comprarbutton').disabled=true;
            });
        <?php } ?>
    </script>


    <?php require '../estaticos/navtiposcojines.php'; ?>
    <br><br><br>

    <script>
        function anadir_carro() {
            //window.location.assign("natalicio.php");
            window.onAlert("¡Se ha añadido al carrito");
        }
    </script>

    <div class="container">
        <div class="row">


            <div class="col-sm-4">
                <div class="card-price" font-size="1">

                    <img class="card-img-top" src="../imagenes/cojinbebe2.JPG" alt="Imagen cojínes de corazón sr/sra.">
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="mb-3">
                    <h3 class="card-title"><b>Cojín nacimiento bebés</b></h3>
                    <h5>13,00€</h5>
                    <h6>Cojín personalizado para celebrar y recordar el nacimiento de los más peques.</h6>
                    <h7>Rellena los datos necesarios para la creación del cojín: </h7>
                </div>

                <form action="natalicio.php" method="post">


                    <td colspan="10">
                        <div class="form-group">
                            <h6><b>Nombre:</b></h6>
                            <input type="text" class="form-control" name="nombrebebe" required="required">
                        </div>
                        <div class="form-group">
                            <h6><b>Hora de nacimiento:</b></h6>
                            <input type="text" class="form-control" name="horanacimiento" required="required" placeholder="20:30">
                        </div>
                        <div class="form-group">
                            <h6><b>Fecha</b></h6>
                            <input type="date" id="fechanacimiento" class="form-control " name="fechanacimiento" required="required" value="12/12/1998" />
                        </div>
                        <div class="form-group">
                            <h6><b>Peso:</b></h6>
                            <input type="text" class="form-control" name="peso" required="required" placeholder="3.5kg">
                        </div>
                        <div class="form-group">
                            <h6><b>Altura:</b></h6>
                            <input type="text" class="form-control" name="altura" required="required" placeholder="51cm">
                        </div>

                        <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                            <label for="colorprimario">
                                <h6><b>Color primario</b></h6>
                            </label>
                            <select name="colorprimario" class="form-control " required="required">
                                <option value="Azul claro">Azul claro</option>
                                <option value="Azul cielo">Azul cielo</option>
                                <option value="Azul turquesa">Azul turquesa</option>
                                <option value="Lila">Lila</option>
                                <option value="Violeta">Violeta</option>
                                <option value="Rosa">Rosa</option>
                                <option value="Rosa claro">Rosa claro</option>
                                <option value="Coral">Coral</option>
                                <option value="Rojo">Rojo</option>
                                <option value="Rojo vino">Rojo vino</option>
                                <option value="Naranja">Naranja</option>
                                <option value="Amarillo">Amarillo</option>
                                <option value="Verde">Verde</option>
                                <option value="Verde esmeralda">Verde esmeralda</option>
                                <option value="Gris">Gris</option>
                            </select>
                            <div class="select_arrow"></div>
                        </div>
                        <br>
                        <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                            <label for="colorsecundario">
                                <h6><b>Color secundario</b></h6>
                            </label>
                            <div class="select">
                                <select name="colorsecundario" class="form-control " required="required">
                                    <option value="Azul claro">Azul claro</option>
                                    <option value="Azul cielo" selected="selected">Azul cielo</option>
                                    <option value="Azul turquesa">Azul turquesa</option>
                                    <option value="Lila">Lila</option>
                                    <option value="Violeta">Violeta</option>
                                    <option value="Rosa">Rosa</option>
                                    <option value="Rosa claro">Rosa claro</option>
                                    <option value="Coral">Coral</option>
                                    <option value="Rojo">Rojo</option>
                                    <option value="Rojo vino">Rojo vino</option>
                                    <option value="Naranja">Naranja</option>
                                    <option value="Amarillo">Amarillo</option>
                                    <option value="Verde">Verde</option>
                                    <option value="Verde esmeralda">Verde esmeralda</option>
                                    <option value="Gris">Gris</option>
                                </select>
                                <div class="select_arrow"></div>
                            </div>
                            <div class="form-check">
                                <br>
                                <button type="submit" id="comprarbutton" class="btn btn-info" style="float: right; width:200px;" value="anadir" onclick="anadir_carro()">Añadir al carrito</button>


                            </div><br><br>
                        </div>

                        <br><br><br>


                    </td>
                    </table>
                </form>



                <br><br><br>

</body>

</html>

<?php
//accedemos a la base de datos
require '../conexionPDO.php';


//si se ha seleccionado la opcion genero
if (isset($_POST['nombrebebe']) && (isset($_POST['fechanacimiento'])) && (isset($_POST['horanacimiento'])) && (isset($_POST['peso'])) && (isset($_POST['altura']))) {

    //vemos cuantos productos de este tipo hay para crear el id
    $sql = "SELECT * FROM producto";
    //$numeroproductos = $conexionPDO->query($sql);
    //$numeroproductos=$numeroproducto->fetchColumn();

    $numeroproductos = 0;

    if ($res = $conexionPDO->query($sql)) {

        /* Check the number of rows that match the SELECT statement */
        if ($res->fetchColumn() > 0) {

            /* Issue the real SELECT statement and work with the results */
            $sql = "SELECT count(*) FROM producto";

            foreach ($conexionPDO->query($sql) as $row) {
                $numeroproductos++;
            }
        }
        /* No rows matched -- do something else */
    }
  //vemos cuantos productos de este tipo hay en el carrito para crear el id
  if (isset($_SESSION['carrito'])){
    $numeroproductos+=count($_SESSION['carrito']);           
}//if set carrito

    //creamos el id_producto
    $numero_id = (string) ($numeroproductos + 1);
    $id_producto_creado = "pr" . $numero_id;

    //recogemos la opcion seleccionada
    $nombrebebe = $_POST['nombrebebe'];
    $fechanacimiento = $_POST['fechanacimiento'];
    $horanacimiento = $_POST['horanacimiento'];
    $peso = $_POST['peso'];
    $altura = $_POST['altura'];
    $colorprimario = $_POST['colorprimario'];
    $colorsecundario = $_POST['colorsecundario'];

    //añadimos (temporalmente, si el pedido no se realiza, se eliminará de la cookie y base de datos)
    /*
    $cojin_temporal = "INSERT INTO cojin_amistad (id_tipo_producto, id_producto, nombre_tipo, genero) VALUES ('2', :id_producto_creado, 'Cojín Amistad', :genero)";
    $sentencia = $conexionPDO->prepare($cojin_temporal);
    $sentencia->execute(array(':id_producto_creado'=>$id_producto_creado, ':genero'=>$genero));

    $cojin_temporal= "INSERT INTO producto(id_producto, id_tipo_producto, precio_unidad, tamaño) VALUES (:id_producto_creado,'2','13','40x40')";
    $sentencia = $conexionPDO->prepare($cojin_temporal);
    $sentencia->execute(array(':id_producto_creado'=>$id_producto_creado));
    */



    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"][0] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 6, 'precio_unidad' => 14, 'tamaño' => "40x40", 'nombre' => "Cojín Nacimiento Bebé", 'cantidad' => 1, 'nombrebebe' => $nombrebebe, 'fechanacimiento' => $fechanacimiento, 'horanacimiento' => $horanacimiento, 'peso' => $peso, 'altura' => $altura, 'colorprimario' => $colorprimario, 'colorsecundario' => $colorsecundario);
    } else
        $_SESSION["carrito"][] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 6, 'precio_unidad' => 14, 'tamaño' => "40x40", 'nombre' => "Cojín Nacimiento Bebé", 'cantidad' => 1, 'nombrebebe' => $nombrebebe, 'fechanacimiento' => $fechanacimiento, 'horanacimiento' => $horanacimiento, 'peso' => $peso, 'altura' => $altura, 'colorprimario' => $colorprimario, 'colorsecundario' => $colorsecundario);



    echo "<div class='alert alert-info' style='width:38%'>El producto se ha añadido al carrito</div>";
    echo "<br><br><br><br><br><br>";
}
echo "</div></div></div>";

require '../estaticos/footertipocojines.php';
?>
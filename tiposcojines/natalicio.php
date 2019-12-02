<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seminario CSS</title>
    <!--CSS BOOTSTRAP-->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
    <link rel="styleheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php require '../estaticos/nav.php'; ?>
    <br><br><br>
    <?php require '../estaticos/jumbotron.php'; ?>

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
                <h4 class="card-title">Cojín nacimiento bebés</h4>
                <h5>13€</h5>
                <h6>Cojín personalizado para celebrar y recordar el nacimiento de los más peques.</h6>
                <h7>Rellena los datos necesarios para la creación del cojín: </h7>
                </div>
            </div>

            <form>


<td colspan="10" >
            <div class="form-group" >
                <p>Nombre:</p>
                <input type="text" class="form-control" name="nombrebebe" required="required">
            </div>
            <div class="form-group">
                <p>Hora de nacimiento:</p>
                <input type="text" class="form-control" name="horanacimiento" required="required" placeholder="20:30">
            </div>
            <div class="form-group">
                <p>Fecha</p>
                <input type="date" id="fechanacimiento" class="form-control " name="fechanacimiento" required="required" value="12/12/1998" />
            </div>
            <div class="form-group">
                <p>Peso:</p>
                <input type="text" class="form-control" name="peso" required="required" placeholder="3.5kg">
            </div>
            <div class="form-group">
                <p>Altura:</p>
                <input type="text" class="form-control" name="altura" required="required" placeholder="51cm">
            </div><br>

            <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                <label for="colorprimario">Color primario</label>
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

            <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                <label for="colorsecundario">Color secundario</label>
                <div class="select"><select name="colorsecundario" class="form-control " required="required">
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
            </div>
    </div>

    <br><br><br>
    <div class="form-check">
        <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/cart" onclick="Controller.controllers.tiponatalicio.carrito_clicked(event);">Añadir al carrito</a>
    </div><br><br>
    <div class="form-check">
        <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/purchase" onclick="Controller.controllers.tiponatalicio.comprar_clicked(event);">Comprar ahora</a>
    </div>

</td>
</table>
    </form>
</div>
            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <!-- <img class="card-img-top" src="imagenes/cojinamistad.JPG" alt="Imagen cojín amistad."> -->
                    <div class="card-body">
                        <h4 class="card-title">Cojín personalizado</h4>
                        <div class="card-price" font-size="1">
                            <div class="row justify-content-end">
                                <h5>10€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipopersonalizado()'>Personalizar</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <table>
    <td>
    
        <div class="col-sm-4">
        <h3 class="text-center">Cojín nacimiento bebés</h3>
        <h5 class="text-center">13,00 €</h5>

        <div class="card text-black bg-light mb-3">
        <img class="card-img-top" src="../imagenes/cojinbebe2.JPG" alt="Imagen cojín bebé.">
        </div>
        </div>
        </td>


<div class="col-sm-4">
    <form>


<td colspan="10" >
            <div class="form-group" >
                <p>Nombre:</p>
                <input type="text" class="form-control" name="nombrebebe" required="required">
            </div>
            <div class="form-group">
                <p>Hora de nacimiento:</p>
                <input type="text" class="form-control" name="horanacimiento" required="required" placeholder="20:30">
            </div>
            <div class="form-group">
                <p>Fecha</p>
                <input type="date" id="fechanacimiento" class="form-control " name="fechanacimiento" required="required" value="12/12/1998" />
            </div>
            <div class="form-group">
                <p>Peso:</p>
                <input type="text" class="form-control" name="peso" required="required" placeholder="3.5kg">
            </div>
            <div class="form-group">
                <p>Altura:</p>
                <input type="text" class="form-control" name="altura" required="required" placeholder="51cm">
            </div><br>

            <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                <label for="colorprimario">Color primario</label>
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

            <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                <label for="colorsecundario">Color secundario</label>
                <div class="select"><select name="colorsecundario" class="form-control " required="required">
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
            </div>
    </div>

    <br><br><br>
    <div class="form-check">
        <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/cart" onclick="Controller.controllers.tiponatalicio.carrito_clicked(event);">Añadir al carrito</a>
    </div><br><br>
    <div class="form-check">
        <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/purchase" onclick="Controller.controllers.tiponatalicio.comprar_clicked(event);">Comprar ahora</a>
    </div>

</td>
</table>
    </form>
</div>
    </div> <br><br><br><br><br><br><br>

    <br><br><br>

    <?php require '../estaticos/footer.php'; ?>
</body>

</html>

<?php
//accedemos a la base de datos
require '../conexionPDO.php';
//si se ha seleccionado la opcion genero
if (isset($_POST['genero_seleccionado'])){

    //vemos cuantos productos de este tipo hay para crear el id
    $sql = "SELECT count(*) FROM cojin_amistad";
    //$numeroproductos = $conexionPDO->query($sql);
    //$numeroproductos=$numeroproducto->fetchColumn();

    $numeroproductos = 0;

    if ($res = $conexionPDO->query($sql)) {

        /* Check the number of rows that match the SELECT statement */
        if ($res->fetchColumn() > 0) {

            /* Issue the real SELECT statement and work with the results */
            $sql = "SELECT * FROM cojin_amistad";

            foreach ($conexionPDO->query($sql) as $row) {
                $numeroproductos++;
            }
        }
        /* No rows matched -- do something else */ 
    }


    //creamos el id_producto
    $numero_id=(string)($numeroproductos+1);
    $id_producto_creado = "pr".$numero_id;

    //recogemos la opcion seleccionada
    $genero = $_POST['genero_seleccionado'];

   // echo "id".$id_producto_creado;
   // echo "genero".$genero;

    //$cojin_temporal = "INSERT INTO cojin_amistad (id_tipo_producto, id_producto, nombre_tipo, genero) VALUES ('2', 'pr1', 'Cojín Amistad', 'hombre')";
    //$conexionPDO->query($cojin_temporal);

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
        $_SESSION["carrito"][0]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>2, 'genero'=>$genero, 'precio_unidad'=>13, 'tamaño'=>"40x40", 'nombre'=>"Cojín amistad", 'cantidad'=>1);
    }else 
        $_SESSION["carrito"][]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>2, 'genero'=>$genero,  'precio_unidad'=>13, 'tamaño'=>"40x40", 'nombre'=>"Cojín amistad", 'cantidad'=>1);

    
    //print_r ($_SESSION["carrito"]);
    echo "¡Su producto se ha añadido al carrito!";
}


?>

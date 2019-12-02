<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cojín Dibujo</title>

    <!--CSS BOOTSTRAP-->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
    <link rel="styleheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">

</head>


<body>
    
        <?php require '../estaticos/navtiposcojines.php'; ?>


    <!--script-->

        <script>
            function anadir_carro() {
                    //window.location.assign("dibujosimple.php");
                    window.onAlert("¡Se ha añadido al carrito");
                }
        </script>



    <div class="container">
        <br>

        <div class="row">

        <div class="col-sm-4">
            <div class="card-price" font-size="1">   
            <img class="card-img-top" src="../imagenes/cojindibujo.JPG" alt="Imagen cojín de un dibujo">
                <div class="card-body">
                </div>
            </div>
        </div>



    <div class="col-sm-8">

        <div class="mb-3">
            <h3 class="card-title">Cojín dibujo individual</h3>
            <h5>13€</h5>
            <h6>Cojín personalizado individual con dibujo en color. Contiene el nombre de la persona, un dibujo a elegir y, opcionalmente, una fecha.
            <br><br>
            Rellena cada uno de los cuadros siguientes tal y como se indica con el nombre y su dibujo favorito, por ejemplo: bailarina, peppa pig, pikachu, doraemon, princesa, etc. Las fotos solo son ejemplos, puedes añadir cualquier dibujo. Puedes elegir también, si así lo deseas, el tipo de letra. Por defecto, esta será letra minúscula.
            <br><br>
            </h6>
            <h7>Rellena los datos necesarios para tu cojín: </h7>
        </div>

        <form action="dibujosimple.php" method="post">

            <p>Nombre o apellido</p>

            <input type="text" class="form-control" name="nombre_apellido" required="required">

            <br><br>

            <p>Dibujo</p>

            <input type="text" class="form-control" name="dibujo" required="required">
            
            <br><br>

            <div class="form-group">
                <p>Fecha (opcional):</p>
                <input type="date" id="fechanacimiento" class="form-control " name="fechanacimiento"  value="12/12/1998" />
            </div>
            <br><br>


            <p>Tipo de letra</p>

            <select class="btn bg-white dropdown-toggle" name="tipo_letra" required="required" value="" style="border:1px solid #7d7d7d;">
                <option value="minus">Minúscula</option>
                <option value="mayus">Mayúscula</option>
            </select>
            <br><br>

            
            <button type="submit" class="btn btn-info" style="float: right; width:200px;" value="anadir" onclick="anadir_carro()">Añadir al carrito</button>

            <br><br><br><br><br><br><br><br><br><br><br>
            

            </form>

        </div> <br><br>

    <br><br><br>

    <?php require '../estaticos/footer.php' ;?>

</body>



</html>





<?php

//accedemos a la base de datos

require '../conexionPDO.php';

//si se ha seleccionado la opcion genero
if (isset($_POST['nombre_apellido'])&&isset($_POST['dibujo'])){

    //vemos cuantos productos de este tipo hay para crear el id
    $sql = "SELECT count(*) FROM producto";

    //$numeroproductos = $conexionPDO->query($sql);
    //$numeroproductos=$numeroproducto->fetchColumn();

    $numeroproductos = 0;

    if ($res = $conexionPDO->query($sql)) {

        /* Check the number of rows that match the SELECT statement */
        if ($res->fetchColumn() > 0) {

            /* Issue the real SELECT statement and work with the results */
            $sql = "SELECT * FROM producto";

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
    $nombre_apellido = $_POST['nombre_apellido'];
    $dibujo = $_POST['dibujo'];
    if (isset($_POST['fecha']))
        $fecha=$_POST['fecha'];
    else
        $fecha=NULL;
    $tipo_letra = $_POST['tipo_letra'];


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
        $_SESSION["carrito"][0]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>4, 'nombrecojin'=>$nombre_apellido, 'dibujo'=>$dibujo, 'fecha'=>$fecha, 'precio_unidad'=>13, 'tamaño'=>"30x50", 'nombre'=>"Cojín Dibujo Individual", 'cantidad'=>1);

    }else 
    $_SESSION["carrito"][]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>4, 'nombrecojin'=>$nombre_apellido, 'dibujo'=>$dibujo, 'fecha'=>$fecha, 'precio_unidad'=>13, 'tamaño'=>"30x50", 'nombre'=>"Cojín Dibujo Individual", 'cantidad'=>1);


    //print_r ($_SESSION["carrito"]);

    echo "¡Su producto se ha añadido al carrito!";
    echo "<br><br><br><br><br><br>";


}


?>

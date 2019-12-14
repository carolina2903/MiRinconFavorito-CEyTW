<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cojín Amistad</title>

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
                    //window.location.assign("cojin_amistad.php");
                    window.onAlert("¡Se ha añadido al carrito");
                }
        </script>


<!--script-->
<script>
function anadir_carro() {

            window.location.assign("cojin_amistad.php");
            window.onAlert("¡Se ha añadido al carrito");
        }
</script>

    <div class="container">
        <br><br>

        <div class="row">

        <div class="col-sm-4">
            <div class="card-price" font-size="1">   
            <img class="card-img-top" src="../imagenes/cojinamistad2.JPG" alt="Imagen cojínes de corazón sr/sra.">
                <div class="card-body">
                </div>
            </div>
        </div>

    <div class="col-sm-8">

        <div class="mb-3">
            <h3 class="card-title">Cojín Amistad</h3>
            <h5>13€</h5>
            <h6>Cojín personalizado para ese amigo o amiga que tanto se lo merece.</h6>
            <h7>Selecciona si quieres que el cojín diga “amigas” o “amigos”: </h7>
        </div>

        <form action="amistad.php" method="post">

            <p>Mujer (amigas) / Hombre (amigos)</p>


            <select class="btn bg-white dropdown-toggle" name="genero_seleccionado" required="required" value="" style="border:1px solid #7d7d7d;">
                <option value="mujer">Mujer</option>
                <option value="hombre">Hombre</option>
            </select>

            <br><br>

            <button type="submit" class="btn btn-info" style="float: right; width:200px;" value="anadir" onclick="anadir_carro()">Añadir al carrito</button>

            <br><br>

            </form>

        </div></div> 

  

    <?php require '../estaticos/footertipocojines.php' ;?>

</body>



</html>





<?php

//accedemos a la base de datos

require '../conexionPDO.php';

//si se ha seleccionado la opcion genero
if (isset($_POST['genero_seleccionado'])){

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
    $genero = $_POST['genero_seleccionado'];



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
        $_SESSION["carrito"][0]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>2, 'genero'=>$genero, 'precio_unidad'=>13, 'tamaño'=>"40x40", 'nombre'=>"Cojín Amistad", 'cantidad'=>1);
    }else {
        $_SESSION["carrito"][]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>2, 'genero'=>$genero,  'precio_unidad'=>13, 'tamaño'=>"40x40", 'nombre'=>"Cojín Amistad", 'cantidad'=>1);

    }


    //print_r ($_SESSION["carrito"]);

    echo "¡Su producto se ha añadido al carrito!";
    echo "<br><br><br><br><br><br>";

}


?>

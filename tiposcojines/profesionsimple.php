<?php
session_start();
echo "<br><br>";

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cojín Profesión</title>

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
        <br><br>

        <div class="row">

            <div class="col-sm-4">
                <div class="card-price" font-size="1">
                    <img class="card-img-top" src="../imagenes/cojinprofesionsimple.JPG" alt="Imagen cojín de profesión">
                    <div class="card-body">
                    </div>
                </div>
            </div>



            <div class="col-sm-8">

                <div class="mb-3">
                    <h3 class="card-title"><b>Cojín Profesión Individual</b></h3>
                    <h5>14€</h5>
                    <h6>Cojín personalizado individual con profesión o hobby. Contiene el nombre de la persona, un dibujo de una profesión o hobby a elegir y, opcionalmente, una fecha.
                        <br><br>
                        Rellena cada uno de los cuadros siguientes tal y como se indica con el nombre y su dibujo favorito, por ejemplo: bailarina, peppa pig, pikachu, doraemon, princesa, etc. Las fotos solo son ejemplos, puedes añadir cualquier dibujo. Puedes elegir también, si así lo deseas, el tipo de letra. Por defecto, esta será letra minúscula.
                        <br><br>
                    </h6>
                    <h7>Rellena los datos necesarios para tu cojín: </h7>
                </div>

                <form action="profesionsimple.php" method="post">

                    <h6><b>Nombre o apellido:</b></h6>

                    <input type="text" class="form-control" name="nombre_apellido" required="required">

                    <br>

                    <h6><b>Profesión:</b></h6>

                    <input type="text" class="form-control" name="profesion" required="required">

                    <br>

                    <div class="form-group">
                        <h6><b>Fecha (opcional):</b></h6>
                        <input type="date" id="fechanacimiento" class="form-control " name="fechanacimiento" value="12/12/1998" />
                    </div>



                    <h6><b>Tipo de letra</b></h6>

                    <select class="btn bg-white dropdown-toggle" name="tipo_letra" required="required" value="" style="border:1px solid #ced4da;">
                        <option value="Minúscula">Minúscula</option>
                        <option value="Mayúscula">Mayúscula</option>
                    </select>
                    <br>


                    <button type="submit" class="btn btn-info" style="float: right; width:200px;" value="anadir" onclick="anadir_carro()">Añadir al carrito</button>

                   <br><br><br>


                </form>

            

            <br><br><br><br>


</body>



</html>





<?php

//accedemos a la base de datos

require '../conexionPDO.php';

//si se ha seleccionado la opcion genero
if (isset($_POST['nombre_apellido']) && isset($_POST['profesion'])) {

    //vemos cuantos productos de este tipo hay para crear el id
    $sql = "SELECT count(*) FROM producto";

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
    $numero_id = (string) ($numeroproductos + 1);
    $id_producto_creado = "pr" . $numero_id;

    //recogemos la opcion seleccionada
    $nombre_apellido = $_POST['nombre_apellido'];
    $profesion = $_POST['profesion'];
    $tipo_letra = $_POST['tipo_letra'];

    if (isset($_POST['fecha']))
        $fecha = $_POST['fecha'];
    else
        $fecha = NULL;


    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"][0] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 9, 'nombrecojin' => $nombre_apellido, 'profesion' => $profesion, 'fechacojin' => $fecha, 'precio_unidad' => 14, 'tamaño' => "30x50", 'nombre' => "Cojín Profesión Individual", 'tipo_letra' => $tipo_letra);
    } else
        $_SESSION["carrito"][] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 9, 'nombrecojin' => $nombre_apellido, 'profesion' => $profesion, 'fechacojin' => $fecha, 'precio_unidad' => 14, 'tamaño' => "30x50", 'nombre' => "Cojín Profesión Individual", 'tipo_letra' => $tipo_letra);



    echo "<div class='alert alert-info' style='width:38%'>El producto se ha añadido al carrito</div>";
    echo "<br><br><br><br><br><br>";
}

require '../estaticos/footer.php';
?>
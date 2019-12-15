<?php
session_start();
echo "<br><br>";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cojines Corazones Sr Sra</title>
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



    <!--script-->
    <script>
        function anadir_carro() {
            window.onAlert('¡Se ha añadido al carrito');
        }
    </script>

    <br>




    <div class="container">

        <br>
        <div class="row">


            <div class="col-sm-4">
                <div class="card-price" font-size="1">

                    <img class="card-img-top" src="../imagenes/cojinescorazonsrsra.JPG" alt="Imagen cojínes de corazón sr/sra.">
                    <div class="card-body">

                    </div>
                </div>
            </div>

            <div class="col-sm-8">
                <div class="mb-3">
                    <h3 class="card-title"><b>Cojines profesión Sr Sra</b></h3>
                    <h5>24,00€</h5>
                    <h6>Pareja de cojines personalizados formada por dos cojines individuales. Cada uno de ellos con medio corazón, Sr. o Sra. y el nombre de cada uno de la pareja. Además, de manera opcional, una fecha.
                        
                    </h6>
                    <h7>Rellena los datos necesarios para la creación de los cojines: </h7>
                </div>
                <form action="corazonesdobleseñorseñora.php" method="post">



                    <div class="form-group">
                        <h6><b>Cojín izquierda:</b></h6>
                        
                        <div class="row">

                            <div class="col-sm-2">

                                <select class="btn bg-white dropdown-toggle" name="srsraizquierda" required="required" value="" style="border:1px solid #ced4da">

                                    <option value="Sr">Sr</option>
                                    <option value="Sra">Sra</option>
                                </select>
                            </div>
                            <div class="col-sm-10">

                                <input type="text" class="form-control" name="nombre_izquierda" required="required" placeholder="Nombre...">
                            </div>
                        </div>
                    </div>
                    <h6><b>Cojín derecha:</b></h6>
                    
                    <div class="row">

                        <div class="col-sm-2">

                            <select class="btn bg-white dropdown-toggle" name="srsraderecha" required="required" value="" style="border:1px solid #ced4da">

                                <option value="Sra">Sra</option>
                                <option value="Sr">Sr</option>
                            </select>
                        </div>
                        <div class="col-sm-10">

                            <input type="text" class="form-control" name="nombre_derecha" required="required" placeholder="Nombre...">
                        </div>
                    </div>
                    <div class="form-group">
                        <br>
                        <h6><b>Fecha (opcional):</b></h6>
                        <input type="date" id="fecha" class="form-control " name="fecha" value="12/12/1998" />
                    </div>
                    <h6><b>Tipo de letra</b></h6>

                    <select class="btn bg-white dropdown-toggle" name="tipo_letra" required="required" value="" style="border:1px solid #7d7d7d;">
                        <option value="Minúscula">Minúscula</option>
                        <option value="Mayúscula">Mayúscula</option>
                    </select>
                    <div class="form-check">

                        <button type="submit" id="comprarbutton" class="btn btn-info" style="float: right; width:200px;" value="anadir" onclick="anadir_carro()">Añadir al carrito</button>
                    <br><br><br><br><br><br><br>
                </form>
            </div>

</body>

</html>

<?php
//accedemos a la base de datos
require '../conexionPDO.php';

//si se ha seleccionado la opcion genero
if (isset($_POST['nombre_izquierda']) && (isset($_POST['nombre_derecha']))) {
    //echo "El producto se ha añadido al carrito";

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


    //creamos el id_producto
    $numero_id = (string) ($numeroproductos + 1);
    $id_producto_creado = "pr" . $numero_id;

    //recogemos la opcion seleccionada
    $srsraizquierda = $_POST['srsraizquierda'];
    $nombreizqdo = $_POST['nombre_izquierda'];
    $srsraderecha = $_POST['srsraderecha'];
    $nombredrcho = $_POST['nombre_derecha'];
    $tipo_letra = $_POST['tipo_letra'];

    if (isset($_POST['nombre_izquierda']))
        $fecha = $_POST['fecha'];
    else
        $fecha = NULL;



    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"][0] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 1, 'precio_unidad' => 24, 'tamaño' => "30x50", 'nombre' => "Cojines Corazón Dobles Sr Sra", 'cantidad' => 1, 'srsraizquierda' => $srsraizquierda, 'nombre_izquierda' => $nombreizqdo, 'srsraderecha' => $srsraderecha, 'nombre_derecha' => $nombredrcho, 'fechacojin' => $fecha, 'tipo_letra' => $tipo_letra);
    } else
        $_SESSION["carrito"][] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 1, 'precio_unidad' => 24, 'tamaño' => "30x50", 'nombre' => "Cojines Corazón Dobles Sr Sra", 'cantidad' => 1, 'srsraizquierda' => $srsraizquierda, 'nombre_izquierda' => $nombreizqdo, 'srsraderecha' => $srsraderecha, 'nombre_derecha' => $nombredrcho, 'fechacojin' => $fecha, 'tipo_letra' => $tipo_letra);


    echo "<div class='alert alert-info' style='width:38%'>El producto se ha añadido al carrito</div>";
    echo "<br><br><br><br><br><br>";
    echo "</div></div></div>";
}
echo "</div></div></div>";

require '../estaticos/footertipocojines.php';
?>
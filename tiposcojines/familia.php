<?php
session_start();
echo "<br><br>";

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
    <script type="text/javascript">
        var $numfamiliares = 1;
        var numerofamiliares = 1;

        function AgregarCampos() {

            numerofamiliares++;
            if (numerofamiliares < 11) {
                Familiar = ' <br><h6><b>Familiar ' + numerofamiliares + ':</b></h6><div class="row"> <div class="col-sm-2"> <select class="btn bg-white dropdown-toggle" name="tipofamiliar_' + numerofamiliares + '" required="required" value="" style="border:1px solid #ced4da">; <option value="Padre">Padre</option> <option value="Madre">Madre</option> <option value="Hijo">Hijo</option><option value="Hija">Hija</option> <option value="Mascota">Mascota</option> </select> </div> <div class="col-sm-10"> <input type="text" class="form-control" name="nombrefamiliar_' + numerofamiliares + '" required="required" placeholder="Nombre..."> </div> </div><a id="rut' + numerofamiliares + '">';
                $("#Familiar").append(Familiar);
                document.getElementById('p1').innerHTML = 2;
                $("#familiaritos").val(numerofamiliares);
                //$("#informacionadicional").css('visibility', 'visible');
                //$('#anadircarro').removeAttr('disabled');
            }
            //window.sessionStorage.setItem("numfam", numerofamiliares);



        }
    </script>

    <!--script-->
    <script>
        function anadir_carro() {

            //window.location.assign("cojin_amistad.php");
            window.onAlert("¡Se ha añadido al carrito");
        }
    </script>

    <div class="container">
        <br><br>

        <div class="row">

            <div class="col-sm-4">
                <div class="card-price" font-size="1">
                    <img class="card-img-top" src="../imagenes/cojinfamilia.JPG" alt="Imagen cojínes de corazón sr/sra.">
                    <div class="card-body">
                    </div>
                </div>
            </div>

            <div class="col-sm-8">

                <div class="mb-3">
                    <h3 class="card-title"><b>Cojín Familia</b></h3>
                    <h5>14,00€</h5>
                    <h6>Cojín personalizado que representa una bonita familia.</h6>
                    <h7>Añade todos los miembros que quieras, el tipo y sus nombres. El dibujo seguirá el orden que indiques. </h7>
                    <h7><br><br><b>*Nota: El número máximo de miembros de la familia es 10.</b></h7>

                </div>
                <form action="familia.php" method="post">
                    <h6><b>Número de familiares: </b></h6>
                    <div class="row">

                        <div class="col-sm-2">
                            <div class="form-group">
                                <p id="p1" name="p1" style="display:none;">1</p>
                                <input type="text" class="form-control" readonly id="familiaritos" name="familiaritos" required="required" value=1>

                            </div>
                        </div>
                    </div>

                    <input type="button" class="btn btn-info" style="float: left; width:140px;" value="Añadir familiar" onclick="AgregarCampos()" />
                    <br><br><br>


                    <br>
                    <h6><b>Familiar 1:</b></h6>
                    <div class="row">
                        <div class="col-sm-2">
                            <select class="btn bg-white dropdown-toggle" name="tipofamiliar_1" required="required" value="" style="border:1px solid #ced4da">; <option value="Padre">Padre</option>
                                <option value="Madre">Madre</option>
                                <option value="Hijo">Hijo</option>
                                <option value="Hija">Hija</option>
                                <option value="Mascota">Mascota</option>
                            </select> </div>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nombrefamiliar_1" required="required" placeholder="Nombre...">
                        </div>
                        <div class="col-sm-12" id="Familiar">
                        </div>
                        <div class="col-sm-12">

                            <form action="familia.php" id="informacionadicional" name="informacionadicional" method="post" style="visibility:hidden">
                                <br>
                                <h7><br>Escribe aquí la información que creas que pueda ser útil, por ejemplo el tipo de mascota: perro, gato, tortuga, etc, la raza del animal o su color (opcional): </h7>
                                <br><br>
                                <input type="text" class="form-control" name="informacionadicional">
                            </form>
                            <div class="form-check">

                                <button type="submit" class="btn btn-info" style="float: right; width:200px;" value="anadir" onclick="anadir_carro()">Añadir al carrito</button>
                            </div>
                            <br><br><br><br><br><br>

                </form>

            </div>
        </div>




</body>



</html>





<?php

//accedemos a la base de datos

require '../conexionPDO.php';

//si se ha seleccionado la opcion genero
if (isset($_POST['nombrefamiliar_1'])) {

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
    $numero_id = (string) ($numeroproductos + 1);
    $id_producto_creado = "pr" . $numero_id;

    //recogemos la opcion seleccionada
    $numerodefamiliares = $_POST['familiaritos'];
    $informacionadicional = $_POST['informacionadicional'];


    $a = 1;

    if (!isset($_SESSION["carrito"])) {
        $_SESSION["carrito"][0] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 5, 'precio_unidad' => 14, 'tamaño' => "30x50", 'nombre' => "Cojín Familia", 'numerodefamiliares' => $numerodefamiliares, 'informacionadicional' => $informacionadicional);
        while ($a <= $numerodefamiliares) {
            $nombrefamiliar = "nombrefamiliar_";
            $nombrefinal = $nombrefamiliar . $a;
            $tipofamiliar = "tipofamiliar_";
            $tipofinal = $tipofamiliar . $a;
            $nombrefamiliar = $_POST[$nombrefinal];
            $tipofamiliar = $_POST[$tipofinal];
            //echo "estoy en 0";
            $_SESSION["familiares"][0] = array('nombrefamiliar' => $nombrefamiliar, 'tipofamiliar' => $tipofamiliar);

            //$_SESSION["carrito"][0]["familiares"][$a-1] = array('nombrefamiliar' => $nombrefamiliar, 'tipofamiliar' => $tipofamiliar);
            //echo $_SESSION["carrito"][0]["familiares"][$a-1];
            $a++;
        }
    } else {
        $_SESSION["carrito"][] = array('id_producto' => $id_producto_creado, 'id_tipo_producto' => 5, 'precio_unidad' => 14, 'tamaño' => "30x50", 'nombre' => "Cojín Familia", 'numerodefamiliares' => $numerodefamiliares, 'informacionadicional' => $informacionadicional);
        while ($a <= $numerodefamiliares) {
            $nombrefamiliar = "nombrefamiliar_";
            $nombrefinal = $nombrefamiliar . $a;
            $tipofamiliar = "tipofamiliar_";
            $tipofinal = $tipofamiliar . $a;
            $nombrefamiliar = $_POST[$nombrefinal];
            $tipofamiliar = $_POST[$tipofinal];
            //echo "estoy en vacio";
            $_SESSION["familiares"][$a - 1] = array('nombrefamiliar' => $nombrefamiliar, 'tipofamiliar' => $tipofamiliar);

            //$_SESSION["carrito"][0]["familiares"][$a-1] = array('nombrefamiliar' => $nombrefamiliar, 'tipofamiliar' => $tipofamiliar);
            //echo $_SESSION["carrito"][0]["familiares"][$a-1];

            $a++;
        }
    }


    //print_r ($_SESSION["carrito"]);

    echo "<div class='alert alert-info' style='width:38%'>El producto se ha añadido al carrito</div>";
    echo "<br><br><br><br><br><br>";
}

require '../estaticos/footer.php';
?>
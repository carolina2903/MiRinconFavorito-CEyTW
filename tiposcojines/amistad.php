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

    <?php require '../html/estaticos/nav.php'; ?>

    <br><br><br>


<!--script-->
<script>
function anadir_carro() {
            window.location.assign("cojin_amistad.php");
            window.onAlert('¡Se ha añadido al carrito');
        }
</script>

    <div class="container">
        
        <br>

        <table>
<!--1 fila-->
        <tr>
        <th rowspan="4">
        <img src="../imagenes/cojinamistad2.JPG" width=200 height=200/>
        </th>
        <th>
        <h3 class="text-center">Cojín amistad</h3>
        <br>
        <br>
        <h5 class="text-center">13,00 €</h5>
        </th>

        </tr>
<!--2 fila-->
        <tr>
        <td colspan="2" class="text-center">
        Cojín personalizado para ese amigo o amiga que tanto se lo merece.
    <br>
        Selecciona si quieres que el cojín diga “amigas” o “amigos”.
        </td>
        <td>
        
        </td>
        </tr>

<!--3 fila-->
        <tr>
        <td colspan="2">
        Femenino (mujer) / Masculino (hombre)
        </td>
        <td>
        
        </td>
        </tr>

<!--4 fila-->
        <tr>
        <td colspan="2">
        <form action="amistad.php" method="post">
                <select name="genero_seleccionado" required="required" value="">
                    <option value="mujer">Mujer</option>
                    <option value="hombre">Hombre</option>
                </select>

                <br><br>
                <button type="submit"  value="anadir" onclick="anadir_carro()">Añadir al carrito</button>
        <br><br>
        </form>
        </td>
        <td>
        
        </td>
        </tr>
        </table>

        
           
            


    </div> <br><br>

    <br><br><br>
    
    <?php require '../html/estaticos/footer.php' ;?>
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

    $_SESSION["id_producto"]=$id_producto_creado;
    $_SESSION["id_tipo_producto"]=2;
    $_SESSION["genero"]=$genero;

    echo "¡Su producto se ha añadido al carrito!"
}


?>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cojñin familia</title>
    <!--CSS BOOTSTRAP-->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
    <link rel="styleheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    
<?php require '../estaticos/nav.php'; ?>

<br><br><br>


<!--script-->
<script>
function anadir_carro() {
        window.location.assign("familia.php");
        window.onAlert('¡Se ha añadido al carrito');
    }
</script>

<div class="container">
    
    <br>

    <table>
    <form action="familia.php" method="post">

<!--1 fila-->
    <tr>
    <th rowspan="8">
    <img src="../imagenes/cojinfamilia.JPG" width=500 height=300/>
    </th>
    <th>
    <h3 class="text-center">Cojín Familia</h3>
    <br>
    <br>
    <h5 class="text-center">13,00 €</h5>
    </th>

    </tr>
<!--2 fila-->
    <tr>
    <td colspan="2" class="text-center">
    Cojín personalizado que representa una bonita familia.
    <br>
    Rellena tantos familiares como quieras que se dibujen. Indica también sus nombres. En caso de que quieras añadir un animal, indica en la caja de comentarios qué tipo de animal es, y para más precisión su raza, color, etc.
    <br>
    El precio incluye la funda de cojín y el relleno.
    </td>
    <td>
    
    </td>
    </tr>

<!--3 fila-->
    <tr>
    <td colspan="2">
    Miembro 1
    </td>
    <td>
    
    </td>
    </tr>

<!--4 fila-->
    <tr>
    <td colspan="2">
    <select name="miembro" required="required" value="">
                    <option value="padre">Padre</option>
                    <option value="madre">Madre</option>
                    <option value="hijo">Hijo</option>
                    <option value="hija">Hija</option>
                    <option value="mascota">Mascota</option>
    </select>
        <br>
        <br><br>
    </td>


<!--3 fila-->
<tr>
    <td colspan="2">
    Indica aquí algo que pueda servirnos de ayuda por ejemplo algún rasgo de un familiar y si has añadido algún animal qué clase de animal es, su raza, color, etc.    </td>
    <td>
    
    </td>
    </tr>

<!--4 fila-->
    <tr>
    <td colspan="2">
    <input type="text" name="info" >

    <br><br>
    <button type="submit"  value="anadir" onclick="anadir_carro()">Añadir al carrito</button>
    <br><br>

    </td>
    </tr>
    
    </form>

    </table>

    
       
        


</div> <br><br>

<br><br><br>

<?php require '../estaticos/footer.php' ;?>
</body>

</html>

<?php
//accedemos a la base de datos
require '../conexionPDO.php';


//si se ha seleccionado la opcion genero
if (isset($_POST['nombre_izquierda'])&&(isset($_POST['nombre_derecha']))){

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
    $numero_id=(string)($numeroproductos+1);
    $id_producto_creado = "pr".$numero_id;

    //recogemos la opcion seleccionada
    $nombreizqdo = $_POST['nombre_izquierda'];
    $nombredrcho = $_POST['nombre_derecha'];

    if (isset($_POST['fecha']))
        $fecha=$_POST['fecha'];
    else
        $fecha=NULL;
    

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
        $_SESSION["carrito"][0]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>3, 'precio_unidad'=>24, 'tamaño'=>"50x30", 'nombre'=>"Cojines Corazón Doble", 'cantidad'=>1);
    }else 
        $_SESSION["carrito"][]=array('id_producto'=>$id_producto_creado, 'id_tipo_producto'=>3, 'precio_unidad'=>24, 'tamaño'=>"50x30", 'nombre'=>"Cojines Corazón Doble", 'cantidad'=>1);

    

    echo "¡Su producto se ha añadido al carrito!";
}


?>
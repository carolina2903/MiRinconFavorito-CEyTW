<?php
session_start();
?>
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


<!--script-->
<script>
function anadir_carro() {
        window.location.assign("corazonesdoblenormal.php");
        window.onAlert('¡Se ha añadido al carrito');
    }
</script>

<div class="container">
    
    <br>

    <table>
    <form action="corazonesdoblenormal.php" method="post">

<!--1 fila-->
    <tr>
    <th rowspan="8">
    <img src="../imagenes/cojinescorazon.JPG" width=500 height=300/>
    </th>
    <th>
    <h3 class="text-center">Cojines Corazón Doble</h3>
    <br>
    <br>
    <h5 class="text-center">24,00 €</h5>
    </th>

    </tr>
<!--2 fila-->
    <tr>
    <td colspan="2" class="text-center">
    Pareja de cojines personalizados formada por dos cojines individuales unidos por un corazón rojo, cada uno de ellos con uno de los nombres o apellidos de cada integrante de la pareja.
    <br>
    El precio de la opción «Solo fundas» incluye únicamente las dos fundas de cojín y la opción «Cojines completos» incluye las dos fundas de cojín y el relleno de ambas. Selecciona la opción que desees.
    <br>
    Selecciona si quieres que el cojín diga “amigas” o “amigos”.
    </td>
    <td>
    
    </td>
    </tr>

<!--3 fila-->
    <tr>
    <td colspan="2">
    Nombre o apellido cojín izquierda
    </td>
    <td>
    
    </td>
    </tr>

<!--4 fila-->
    <tr>
    <td colspan="2">
    <input type="text" name="nombre_izquierda" >
        <br>
        <br><br>
    </td>


<!--3 fila-->
<tr>
    <td colspan="2">
    Nombre o apellido cojín derecho
    </td>
    <td>
    
    </td>
    </tr>

<!--4 fila-->
    <tr>
    <td colspan="2">
    <input type="text" name="nombre_derecha" >

            <br><br>
    
        <br><br>
    </td>


<!--3 fila-->
<tr>
    <td colspan="2">
    Fecha (opcional)
    </td>
    <td>
    
    </td>
    </tr>

<!--4 fila-->
    <tr>
    <td colspan="2">
    <input type="date" name="fecha">
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

echo "hola1";

//si se ha seleccionado la opcion genero
if (isset($_POST['nombre_izquierda'])&&(isset($_POST['nombre_derecha']))){
    echo "hola2";

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

    if (isset($_POST['nombre_izquierda']))
        $fecha=$_POST['fecha'];
    else
        $fecha=NULL;
    
        echo "hola".$nombredrcho;
        echo $nombreizqdo;
        echo $fecha;
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
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
        <form>

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
        <h5 class="text-center">12,00 - 14,00 €</h5>
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
        <div class="form-group">
                <select name="genero_seleccionado" required="required" target="_blank">
                    <option value="mujer">Mujer</option>
                    <option value="hombre">Hombre</option>
                </select>
            </div><br>
        </td>
        <td>
        
        </td>
        </tr>
        </table>

        
            <br><br><br>
            <div class="form-check">
                <button class="btn btn-info" style="float: right; width:200px;" onclick="anadir_carro()">Añadir al carrito</button>
            </div><br><br>
            

        </form>

    </div> <br><br>

    <br><br><br>
    
    <?php require '../html/estaticos/footer.php' ;?>
</body>

</html>


<?php
//accedemos a la base de datos
require '../conexionPDO.php';

//vemos cuantos productos de este tipo hay para crear el id
$sql = "SELECT count(*) FROM cojin_amistad ";
$numeroproductos = $conexionPDO->query($sql);
$numeroproductos=$numeroproducto->fetchColumn();
//creamos el id_producto
$numero_id=(string)$numeroproductos+1;
$id_producto_creado = "pr".$numero_id;

//recogemos la opcion seleccionada
$genero = $_POST['genero_seleccionado'];

//añadimos (temporalmente, si el pedido no se realiza, se eliminará de la cookie y base de datos)
$cojin_temporal = "INSERT INTO 'cojin_amistad' ('id_tipo_producto', 'id_producto', 'nombre_tipo', 'genero') VALUES ('2', '$id_producto_creado', 'Cojín Amistad', '$genero')";
$cojin_temporal= "INSERT INTO `producto`(`id_producto`, `id_tipo_producto`, `precio_unidad`, `tamaño`) VALUES ('$id_producto_creado','2','12','40x40')";
//$info = $conexionPDO->query($cojin_temporal);


?>
<?php session_start() ?>
<?php require 'conexionPDO.php'; ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Rincón Favorito</title>
    <!--CSS BOOTSTRAP-->
    <link rel="styleheet" href="css/bootstrap.css">
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>

    <?php require 'estaticos/nav.php'; ?>

    <br><br><br>

    <?php require 'estaticos/jumbotron.php'; ?>

    <!-- JAVASCRIPT 
    <script>
        function entrar() {
            window.location.assign("index_.php")
        }
    </script>
-->
    <!-- HTML -->
    <div class="container">

        <form action="exito.php" method="POST">

            <div class='alert alert-info' style='width:33%'>¡Tu compra se ha realizado con éxito!</div>
            <a href="index_.php">Volver a la página principal</a>

        </form>
    </div> <br><br><br><br><br><br><br>




</body>

</html>


<!-- PHP -->
<?php
//AQUÍ SE AÑADE A LA BASE DE DATOS (INSERTS)
//contar el nnumero de pedidos que hay (no hace falta pq es auto_increment)
//en cada caso se hace un insert en la linea pedido
//al final del for se crea el pedido y la dirección si no existe


for ($i = 0; $i < count($_SESSION["carrito"]); ++$i) {
    switch ($_SESSION["carrito"][$i]["id_tipo_producto"]) {

        //corazon señor señora 
        case 1:
          
            $cojin_temporal = "INSERT INTO cojines_corazon_dobles_senor_senora (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre_senor, nombre_senora, fecha, tipo_letra) 
                                VALUES ('324', '1', :id_producto, 'Cojines Corazón Doble Señor/Señora', :nombre_senor, :nombre_senora, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':nombre_senor'=>$_SESSION["carrito"][$i]['nombre_derecha'],':nombre_senora'=>$_SESSION["carrito"][$i]['nombre_izquierda'], ':fecha'=>$_SESSION["carrito"][$i]['fechacojin'],':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra'] ));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '1', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

        //cojin amistad
        case 2:

            $cojin_temporal = "INSERT INTO cojin_amistad (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre, fecha) 
                                VALUES ('3324', '2', :id_producto, 'Cojín Amistad', :nombre, :fecha)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':nombre'=>$_SESSION["carrito"][$i]['nombre'],':fecha'=>$_SESSION["carrito"][$i]['fecha']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '2', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

        //cojin_corazones_dobles
        case 3:
            $cojin_temporal = "INSERT INTO cojin_corazones_dobles (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre_izquierda, nombre_derecha, fecha, tipo_letra) 
                                VALUES ('324', '3', :id_producto, 'Cojines Corazón Doble', :nombre_iquierda, :nombre_derecha, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':nombre_izquierda'=>$_SESSION["carrito"][$i]['nombre_izquierda'],':nombre_derecha'=>$_SESSION["carrito"][$i]['nombre_derecha'], ':fecha'=>$_SESSION["carrito"][$i]['fecha'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '3', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

         //cojin_dibujo_individual
         case 4:
            $cojin_temporal = "INSERT INTO cojin_dibujo_individual (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre, dibujo, fecha, tipo_letra) 
                                VALUES ('324', '4', :id_producto, 'Cojines Corazón Doble', :nombre, :dibujo, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':nombre'=>$_SESSION["carrito"][$i]['nombre'],':dibujo'=>$_SESSION["carrito"][$i]['dibujo'], ':fecha'=>$_SESSION["carrito"][$i]['fecha'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '4', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

         //cojin_familia
         case 5:
            $cojin_temporal = "INSERT INTO cojin_familia (idinterno, id_tipo_producto, id_producto, nombre_tipo, informacion_adicional) 
                                VALUES ('324', '5', :id_producto, 'Cojines Corazón Doble', :informacion_adicional)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':informacion_adicional'=>$_SESSION["carrito"][$i]['informacion_adicional']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '5', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        
            //añadir linea-miembro
            //añadir miembro
        
        
        break;

         //cojin_natalicio
         case 6:
            $cojin_temporal = "INSERT INTO cojin_natalicio (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre, fecha, hora, peso, medida, color_primario, color_secundario) 
                                VALUES ('324', '6', :id_producto, 'Cojín Natalicio', :nombre, :fecha, :hora, :peso, :medida, :color_primario, :color_secundario)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':nombre'=>$_SESSION["carrito"][$i]['nombre'],':fecha'=>$_SESSION["carrito"][$i]['fecha'], ':hora'=>$_SESSION["carrito"][$i]['hora'], ':peso'=>$_SESSION["carrito"][$i]['peso'], ':medida'=>$_SESSION["carrito"][$i]['medida'], ':color_primario'=>$_SESSION["carrito"][$i]['color_primario'], ':color_secundario'=>$_SESSION["carrito"][$i]['color_secundario']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '6', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

         //cojin_profesion_doble
         case 7:
            $cojin_temporal = "INSERT INTO cojin_profesion_doble (idinterno, id_tipo_producto, id_producto, nombre_tipo, profesion_izquierda, profesion_derecha, nombre_izquierdo, nombre_derecha, fecha, tipo_letra) 
                                VALUES ('324', '7', :id_producto, 'Cojines Profesión Dobles', :profesion_izquierda, :profesion_derecha, :nombre_iquierda, :nombre_derecha, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':profesion_izquierda'=>$_SESSION["carrito"][$i]['profesion_izquierda'], ':profesion_derecha'=>$_SESSION["carrito"][$i]['profesion_derecha'],':nombre_izquierda'=>$_SESSION["carrito"][$i]['nombre_izquierda'],':nombre_derecha'=>$_SESSION["carrito"][$i]['nombre_derecha'], ':fecha'=>$_SESSION["carrito"][$i]['fecha'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '7', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

         //cojin_profesion_doble_sr_sra
         case 8:
            $cojin_temporal = "INSERT INTO cojin_profesion_doble_sr_sra (idinterno, id_tipo_producto, id_producto, nombre_tipo, srsraizquierda, profesionizquierda, nombreizquierda, srsraderecha, profesionderecha, nombrederecha, fecha, tipo_letra) 
                                VALUES ('324', '8', :id_producto, 'Cojines Profesión Dobles Sr Sra', :srsraizquierda, :profesionizquierda, :nombreizquierda, :srsraderecha, :profesionderecha, :nombrederecha, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':srsraizquierda'=>$_SESSION["carrito"][$i]['srsraizquierda'],':profesionizquierda'=>$_SESSION["carrito"][$i]['profesionizquierda'], ':nombreizquierda'=>$_SESSION["carrito"][$i]['nombreizquierda'], ':srsraderecha'=>$_SESSION["carrito"][$i]['srsraderecha'], ':profesionderecha'=>$_SESSION["carrito"][$i]['profesionderecha'], ':nombrederecha'=>$_SESSION["carrito"][$i]['nombrederecha'], ':fecha'=>$_SESSION["carrito"][$i]['fecha'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '8', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

         //cojin_corazones_dobles
         case 9:
            $cojin_temporal = "INSERT INTO cojin_profesion_individual (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre, profesion, fecha, tipo_letra) 
                                VALUES ('324', '9', :id_producto, 'Cojines Corazón Doble', :nombre, :profesion, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':nombre'=>$_SESSION["carrito"][$i]['nombre'],':profesion'=>$_SESSION["carrito"][$i]['profesion'], ':fecha'=>$_SESSION["carrito"][$i]['fecha'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamaño) 
                                VALUES (:id_producto, '9', :precio_unidad, :tamaño)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$_SESSION["carrito"][$i]['id_producto'], ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamaño'=>$_SESSION["carrito"][$i]['tamaño'] ));
        break;

    }//swicth


}//for   

//Aqui se puede imprimir una tabla con el pedido
//Y CUANDO SE HA AÑADIDO, SE BORRA LA SESIÓN PARA QUE DESAPAREZCA DEL CARRITO
$_SESSION["carrito"] = array();
$_SESSION["familiares"] = array();
?>
<?php require 'estaticos/footer.php'; ?>
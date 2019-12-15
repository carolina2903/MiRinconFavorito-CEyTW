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

    /* OBTENER ID CLIENTE */
    $sqluser = "SELECT * FROM cliente WHERE email='" . $_SESSION["email"] . "'";
    $resultadouser = $conexionPDO->query($sqluser);
    $usuario = $resultadouser->fetch(PDO::FETCH_ASSOC);
    $id_cliente = $usuario['id_cliente'];

    /* OBTENER EL PRECIO TOTAL DEL PEDIDO */
$precio_total = $_SESSION['precio_carrito'];

/* OBTENER EL TIPO ENVIO */
/* $tipo_envio = $_SESSION['tipo_envio'];
echo '<br>tipo envio: '.$tipo_envio; */



/* OBTENER LAS NOTAS DEL PEDIDO */
/* $notas = $_SESSION['notas'];
echo '<br>notas: '.$notas; */


/* Para crear el id del pedido */
$pedcont=0;
$sql = "SELECT count(*) FROM pedido";
if ($res = $conexionPDO->query($sql)) {
    if ($res->fetchColumn() > 0) {
        $sql = "SELECT * FROM pedido";
        foreach ($conexionPDO->query($sql) as $row) {
            $pedcont++;
        }
    }
}
$numero_id = (string) ($pedcont + 1);
$idpedido_creado = $numero_id;


/* Para insertar el pedido */
$pedido_temporal = "INSERT INTO pedido (id_pedido, id_cliente, precio_total, fecha_compra, tipo_envio, anotaciones, estado) 
VALUES (:id_pedido, :id_cliente, :precio_total, :fecha_compra, 'Estándar', '', 'Tramitado')";
$sentencia3 = $conexionPDO->prepare($pedido_temporal);
$sentencia3->execute(array(':id_pedido'=>$idpedido_creado, ':id_cliente'=>$id_cliente, ':precio_total'=>$precio_total, ':fecha_compra'=>date("Y-m-d") ));          











for ($i = 0; $i < count($_SESSION["carrito"]); ++$i) {

    /* PARA CREAR ID PRODUCTO */
    $prodcont=0;
        $sql = "SELECT count(*) FROM producto";
        if ($res = $conexionPDO->query($sql)) {
            if ($res->fetchColumn() > 0) {
                $sql = "SELECT * FROM producto";
                foreach ($conexionPDO->query($sql) as $row) {
                    $prodcont++;
                }
            }
        }
        $numero_id = (string) ($prodcont + 1);
        $idproducto_creado = "pr" . $numero_id;





    switch ($_SESSION["carrito"][$i]["id_tipo_producto"]) {

        //corazon señor señora 
        case 1:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojines_corazon_dobles_senor_senora";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojines_corazon_dobles_senor_senora";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);
          
            /* Para insertar el tipo de cojin */
            $cojin_temporal = "INSERT INTO cojines_corazon_dobles_senor_senora (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre_senor, nombre_senora, fecha, tipo_letra) 
                                VALUES (:idinterno, '1', :id_producto, 'Cojines Corazón Doble Señor/Señora', :nombre_senor, :nombre_senora, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id, ':id_producto'=>$idproducto_creado, ':nombre_senor'=>$_SESSION["carrito"][$i]['nombre_derecha'], ':nombre_senora'=>$_SESSION["carrito"][$i]['nombre_izquierda'], ':fecha'=>$_SESSION["carrito"][$i]['fechacojin'],':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra'] ));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '1', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
                      
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
        
        break;


        //cojin amistad
        case 2:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_amistad";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_amistad";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);

            $cojin_temporal = "INSERT INTO cojin_amistad (idinterno, id_tipo_producto, id_producto, nombre_tipo, genero) 
                                VALUES (:idinterno, '2', :id_producto, 'Cojín Amistad', :genero)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':genero'=>$_SESSION["carrito"][$i]['genero']));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '2', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));

        break;


        //cojin_corazones_dobles
        case 3:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_corazones_dobles";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_corazones_dobles";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);

            $cojin_temporal = "INSERT INTO cojin_corazones_dobles (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre_izquierda, nombre_derecha, fecha, tipo_letra) 
                                VALUES (:idinterno, '3', :id_producto, 'Cojines Corazón Doble', :nombre_izquierda, :nombre_derecha, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':nombre_izquierda'=>$_SESSION["carrito"][$i]['nombre_izquierda'],':nombre_derecha'=>$_SESSION["carrito"][$i]['nombre_derecha'], ':fecha'=>$_SESSION["carrito"][$i]['fechacojin'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '3', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
        break;


         //cojin_dibujo_individual
         case 4:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_dibujo_individual";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_dibujo_individual";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);

            $cojin_temporal = "INSERT INTO cojin_dibujo_individual (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre, dibujo, fecha, tipo_letra) 
                                VALUES (:idinterno, '4', :id_producto, 'Cojines Corazón Doble', :nombre, :dibujo, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':nombre'=>$_SESSION["carrito"][$i]['nombre'],':dibujo'=>$_SESSION["carrito"][$i]['dibujo'], ':fecha'=>$_SESSION["carrito"][$i]['fechacojin'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '4', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
        break;


         //cojin_familia
         case 5:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_familia";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_familia";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);

            $cojin_temporal = "INSERT INTO cojin_familia (idinterno, id_tipo_producto, id_producto, nombre_tipo, informacion_adicional) 
                                VALUES (:idinterno, '5', :id_producto, 'Cojín Familia', :informacion_adicional)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':informacion_adicional'=>$_SESSION["carrito"][$i]['informacionadicional']));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '5', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
            

            /* PARA LOS MIEMBROS DE LA FAMILIA */

                for($k=0;$k<$_SESSION['carrito'][$i]['numerodefamiliares'];$k++){

                    /* PARA CREAR ID MIEMBRO */
                    $miembrocont=0; 
                    $miembrossesion=0;
                    $sql = "SELECT count(*) FROM miembro";
                    if ($res = $conexionPDO->query($sql)) {
                        if ($res->fetchColumn() > 0) {
                            $sql = "SELECT * FROM miembro";
                            foreach ($conexionPDO->query($sql) as $row) {
                                $miembrocont++;
                            }
                        }
                    }

                    while ($_SESSION['carrito'][$i]['numerodefamiliares']>$miembrossesion)
                        $miembrossesion++;          
                    
                    $numero_id = (string) ($miembrocont+$miembrossesion + 1);
                    $idmiembro_creado = $numero_id;

                    /* Para insertar los miembros */
                    $producto_temporal = "INSERT INTO miembro (id_miembro, nombre, tipo_familiar) 
                                        VALUES (:id_miembro, :nombre, :tipo_familiar)";
                    $sentencia2 = $conexionPDO->prepare($producto_temporal);
                    $sentencia2->execute(array(':id_miembro'=>$idmiembro_creado, ':nombre'=>$_SESSION["familiares"][$k]['nombrefamiliar'], ':tipo_familiar'=>$_SESSION["familiares"][$k]['tipofamiliar'] )); 

                    /* Para insertar la linea-miembro */
                    $linea_miembro_temporal = "INSERT INTO linea_miembro (idinterno_cojin, id_miembro)
                                                VALUES (:idinterno_cojin, :id_miembro)";
                    $sentencia5 = $conexionPDO->prepare($linea_miembro_temporal);
                    $sentencia5->execute(array(':idinterno_cojin'=>$numero_id, ':id_miembro'=>$idmiembro_creado));
                }



        break;
        

         //cojin_natalicio
         case 6:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_natalicio";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_natalicio";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);

            $cojin_temporal = "INSERT INTO cojin_natalicio (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre, fecha, hora, peso, medida, color_primario, color_secundario) 
                                VALUES (:idinterno, '6', :id_producto, 'Cojín Natalicio', :nombre, :fecha, :hora, :peso, :medida, :color_primario, :color_secundario)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':nombre'=>$_SESSION["carrito"][$i]['nombre'],':fecha'=>$_SESSION["carrito"][$i]['fechanacimiento'], ':hora'=>$_SESSION["carrito"][$i]['horanacimiento'], ':peso'=>$_SESSION["carrito"][$i]['peso'], ':medida'=>$_SESSION["carrito"][$i]['altura'], ':color_primario'=>$_SESSION["carrito"][$i]['colorprimario'], ':color_secundario'=>$_SESSION["carrito"][$i]['colorsecundario']));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '6', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
        break;
        

         //cojin_profesion_doble_sr_sr
         case 7:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_profesion_doble_sr_sra";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_profesion_doble_sr_sra";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);

            $cojin_temporal = "INSERT INTO cojin_profesion_doble_sr_sra (idinterno, id_tipo_producto, id_producto, nombre_tipo, srsraizquierda, profesionizquierda, nombreizquierda, srsraderecha, profesionderecha, nombrederecha, fecha, tipo_letra) 
                                VALUES (:idinterno, '7', :id_producto, 'Cojines Profesión Dobles Sr Sra', :srsraizquierda, :profesionizquierda, :nombreizquierda, :srsraderecha, :profesionderecha, :nombrederecha, :fecha, :tipo_letra)";

            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':srsraizquierda'=>$_SESSION["carrito"][$i]['srsraizquierda'],':profesionizquierda'=>$_SESSION["carrito"][$i]['profesionizquierda'], ':nombreizquierda'=>$_SESSION["carrito"][$i]['nombre_izquierda'], ':srsraderecha'=>$_SESSION["carrito"][$i]['srsraderecha'], ':profesionderecha'=>$_SESSION["carrito"][$i]['profesionderecha'], ':nombrederecha'=>$_SESSION["carrito"][$i]['nombre_derecha'], ':fecha'=>$_SESSION["carrito"][$i]['fecha'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '7', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
        break;


         //cojin_profesion_doble
         case 8:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_profesion_doble";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_profesion_doble";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);


            $cojin_temporal = "INSERT INTO cojin_profesion_doble (idinterno, id_tipo_producto, id_producto, nombre_tipo, profesion_izquierda, profesion_derecha, nombre_izquierda, nombre_derecha, fecha, tipo_letra) 
                                VALUES (:idinterno, '8', :id_producto, 'Cojines Profesión Dobles', :profesion_izquierda, :profesion_derecha, :nombre_izquierda, :nombre_derecha, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':profesion_izquierda'=>$_SESSION["carrito"][$i]['profesion_izquierda'], ':profesion_derecha'=>$_SESSION["carrito"][$i]['profesion_derecha'],':nombre_izquierda'=>$_SESSION["carrito"][$i]['nombre_izquierda'],':nombre_derecha'=>$_SESSION["carrito"][$i]['nombre_derecha'], ':fecha'=>$_SESSION["carrito"][$i]['fechacojin'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));

            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '8', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
        break;


         //cojin_corazones_dobles
         case 9:

            /* CREAMOS ID INTERNO */
            $sql = "SELECT count(*) FROM cojin_corazones_dobles";
            $contados = 0;
            if ($res = $conexionPDO->query($sql)) {
                if ($res->fetchColumn() > 0) {
                    $sql = "SELECT * FROM cojin_corazones_dobles";
                    foreach ($conexionPDO->query($sql) as $row) {
                        $contados++;
                    }
                }
            }
            $numero_id = (string) ($contados + 1);

            $cojin_temporal = "INSERT INTO cojin_profesion_individual (idinterno, id_tipo_producto, id_producto, nombre_tipo, nombre, profesion, fecha, tipo_letra) 
                                VALUES (:idinterno, '9', :id_producto, 'Cojines Corazón Doble', :nombre, :profesion, :fecha, :tipo_letra)";
            $sentencia = $conexionPDO->prepare($cojin_temporal);
            $sentencia->execute(array(':idinterno'=>$numero_id,':id_producto'=>$idproducto_creado, ':nombre'=>$_SESSION["carrito"][$i]['nombre'],':profesion'=>$_SESSION["carrito"][$i]['profesion'], ':fecha'=>$_SESSION["carrito"][$i]['fechacojin'], ':tipo_letra'=>$_SESSION["carrito"][$i]['tipo_letra']));
            
            /* Para insertar el producto */
            $producto_temporal = "INSERT INTO producto (id_producto, id_tipo_producto, precio_unidad, tamano) 
                                VALUES (:id_producto, '9', :precio_unidad, :tamano)";
            $sentencia2 = $conexionPDO->prepare($producto_temporal);
            $sentencia2->execute(array(':id_producto'=>$idproducto_creado, ':precio_unidad'=>$_SESSION["carrito"][$i]['precio_unidad'],':tamano'=>$_SESSION["carrito"][$i]['tamano'] ));
            
            /* Para insertar la linea producto */
            $linea_producto_temporal = "INSERT INTO linea_producto (id_producto, id_pedido)
                                        VALUES (:id_producto, :id_pedido)";
            $sentencia4 = $conexionPDO->prepare($linea_producto_temporal);
            $sentencia4->execute(array(':id_producto'=>$idproducto_creado, ':id_pedido'=>$idpedido_creado));
        break;

    }//swicth


}//for   

//Aqui se puede imprimir una tabla con el pedido
//Y CUANDO SE HA AÑADIDO, SE BORRA LA SESIÓN PARA QUE DESAPAREZCA DEL CARRITO
$_SESSION["carrito"] = array();
$_SESSION["familiares"] = array();
?>
<?php require 'estaticos/footer.php'; ?>
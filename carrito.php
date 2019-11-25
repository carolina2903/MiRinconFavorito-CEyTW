<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiRinconFavorito</title>
    <!--CSS BOOTSTRAP-->
    <link rel="styleheet" href="css/bootstrap.css">
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/estilos.css">

</head>

<body>

    
    <?php require 'estaticos/nav.php' ;
    session_start();
    ?>
    


    <br><br><br>
    
    <?php require 'estaticos/jumbotron.php' ;?>

    <script>
        function comprar() {
            window.location.assign("comprar.php");
        }
    </script>

    
    <?php require 'estaticos/footer.php' ;?>

    
</body>

</html>

<?php
//session_start();
    require 'conexionPDO.php';
    
    //if(isset($_SESSION["carrito"])){ 
    if(isset($_SESSION["carrito"])){ 
    echo "<h3 class='text-left'><b>Carrito de la compra</b> </h3>";
    echo "<hr>";
    echo "<br>";
    
    echo "<br>";
    echo "<div class='container'>";
        echo "<h3 class='text-left'> <b>Lista de productos</b> </h3>";
        echo "<table class='table'>";
            echo "<thead>";
                echo "<tr>";
                    echo "<th scope='col'>Cantidad</th>";
                    echo "<th scope='col'>Nombre de producto</th>";
                    echo "<th scope='col'>Precio</th>";
                    echo "<th scope='col'>Total</th>";
                    echo "<th scope='col'></th>";
                echo "</tr>";
                $precio_carrito=0;
                for($i = 0; $i < count($_SESSION["carrito"]); ++$i)  {
                    $precio=intval ( $_SESSION["carrito"][$i]["precio_unidad"]);
                    $precio_total = $precio* $_SESSION["carrito"][$i]["cantidad"];
                    echo "<tr>";
                        echo "<th name='colcantidad' id='colcantidad' scope='col'>".$_SESSION["carrito"][$i]["id_producto"]."</th>";
                        echo "<th name='colnombre' id='colnombre' scope='col'>".$_SESSION["carrito"][$i]["nombre"]."</th>";
                        echo "<th name='colprecio' id='colprecio' scope='col'>" .$precio."</th>";
                        echo "<th name='coltotal' id='coltotal' scope='col'>".$precio_total."</th>";
                        echo "<th name='colid' id='colid' scope='col'></th>";
                    echo "</tr>";
                    $precio_carrito+=$precio_total;
                }
                $subtotal= $precio_carrito*0.79;
                $impuestos= $precio_carrito*0.21;


            echo "</thead>";
            echo "<tbody>";
                   
            echo "</tbody>";
        echo "</table>";
        echo "<hr>";
        echo "<div class='row justify-content-start'>";
            echo "<b>Subtotal:</b>&nbsp;".$subtotal;
        echo "</div>";
        echo "<div class='row justify-content-start'>";
            echo "<b>Impuestos: </b>&nbsp;".$impuestos;
        echo "</div>";
        echo "<div class='row justify-content-start'>";
            echo "<b>Total: </b>&nbsp;".$precio_carrito;
        echo "</div>";
    echo "</div>";
    echo "<hr>";

    echo "<a id='cart-purchase' onClick='comprar()' class='btn btn-info' role='button' style='float: right;'>Comprar</a>";
    echo "<br><br><br><br>";


    echo "<br><br><br>";
    
    echo "}";
            }
    //}
    //else{
    //    echo "El carrito está vacío.";
    //}
?>
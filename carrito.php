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

    
    <?php require 'estaticos/nav.php' ;?>
    session_start();


    <br><br><br>
    
    <?php require 'estaticos/jumbotron.php' ;?>

    <script>
        function comprar() {
            window.location.assign("comprar.php");
        }
    </script>

    <h3 class="text-left"><b>Carrito de la compra</b> </h3>
    <hr>
    <br>
    <div class="row justify-content-end">
        <b>Total: </b>&nbsp;
    </div>
    <br>
    <div class="container">
        <h3 class="text-left"> <b>Lista de productos</b> </h3>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Nombre de producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <th name="colcantidad" id="colcantidad" scope="col"></th>
                    <th name="colnombre" id="colnombre" scope="col"></th>
                    <th name="colprecio" id="colprecio" scope="col"></th>
                    <th name ="coltotal" id="coltotal" scope="col"></th>
                    <th name="colid" id="colid" scope="col"></th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>
        <hr>
        <div class="row justify-content-start">
            <b>Subtotal: </b>&nbsp;
        </div>
        <div class="row justify-content-start">
            <b>Impuestos: </b>&nbsp;
        </div>
        <div class="row justify-content-start">
            <b>Total: </b>&nbsp;
        </div>
    </div>
    <hr>

    <a id="cart-purchase" onClick="comprar()" class="btn btn-info" role="button" style="float: right;">Comprar</a>
    <br><br><br><br>


    <br><br><br>
    
    <?php require 'estaticos/footer.php' ;?>

    
</body>

</html>

<?php
    require 'conexionPDO.php';
    
        
    if (isset($_SESSION["carrito"])){    
    echo "<h3 class='text-left'><b>Carrito de la compra</b> </h3>";
    echo "<hr>";
    echo "<br>";
    echo "<div class='row justify-content-end'>";
        echo "<b>Total: </b>&nbsp;";
    echo "</div>";
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

                //while($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                        echo "<th name='colcantidad' id='colcantidad' scope='col'>".$_SESSION["id_producto"]."</th>";
                        echo "<th name='colnombre' id='colnombre' scope='col'></th>";
                        echo "<th name='colprecio' id='colprecio' scope='col'></th>";
                        echo "<th name='coltotal' id='coltotal' scope='col'></th>";
                        echo "<th name='colid' id='colid' scope='col'></th>";
                    echo "</tr>";
                //}
            echo "</thead>";
            echo "<tbody>";
                   
            echo "</tbody>";
        echo "</table>";
        echo "<hr>";
        echo "<div class='row justify-content-start'>";
            echo "<b>Subtotal: </b>&nbsp;";
        echo "</div>";
        echo "<div class='row justify-content-start'>";
            echo "<b>Impuestos: </b>&nbsp;";
        echo "</div>";
        echo "<div class='row justify-content-start'>";
            echo "<b>Total: </b>&nbsp;";
        echo "</div>";
    echo "</div>";
    echo "<hr>";

    echo "<a id='cart-purchase' onClick='comprar()' class='btn btn-info' role='button' style='float: right;'>Comprar</a>";
    echo "<br><br><br><br>";


    echo "<br><br><br>";
    
    echo "}";
    }
?>
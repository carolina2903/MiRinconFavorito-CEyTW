<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiRinconFavorito</title>
    <!--CSS BOOTSTRAP-->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"-->
    <link rel="styleheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>

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
        <!-- <p>{{formatPrice cart.total}}</p> -->
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
            </thead>
            <tbody>
                <!-- {{#each cart.shoppingCartItems}}
                    {{> cart-item-partial this removeOneCartItem_onclick='Controller.controllers.cart.removeOneCartItem_clicked' 
                        removeAllCartItem_onclick='Controller.controllers.cart.removeAllCartItem_clicked'}}
                    {{/each}} -->
            </tbody>
        </table>
        <hr>
        <div class="row justify-content-start">
            <b>Subtotal: </b>&nbsp;
            <!-- <p>{{formatPrice cart.subtotal}}</p> -->
        </div>
        <div class="row justify-content-start">
            <b>Impuestos: </b>&nbsp;
            <!-- <p>{{formatTax cart.tax}}</p> -->
        </div>
        <div class="row justify-content-start">
            <b>Total: </b>&nbsp;
            <!-- <p>{{formatPrice cart.total}}</p> -->
        </div>
    </div>
    <hr>

    <a id="cart-purchase" onClick="comprar()" class="btn btn-info" role="button" style="float: right;">Comprar</a>
    <br><br><br><br>




</body>
<<<<<<< HEAD

</html>
=======
</html>

<?php require 'conexionPDO.php'; ?>
>>>>>>> 6998b5ebcf6095f1031cae41a259ace0a253358f

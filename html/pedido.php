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

    <h3 class="text-left"><b>
            <!-- {{order.number}} --></b> </h3>
    <hr />
    <div class="container">
        <div class="row">
            <b>Fecha:</b>&nbsp;
            <!-- <p>{{formatDate order.date}}</p> -->
        </div>
        <div class="row">
            <b>Address:</b>&nbsp;
            <!-- <p>{{order.address}}</p> -->
        </div>
        <div class="row">
            <b>Número de tarjeta:</b>&nbsp;
            <!-- <p>{{order.cardNumber}}</p> -->
        </div>
        <div class="row">
            <b>Nombre del propietario de tarjeta:</b>&nbsp;
            <!-- <p>{{order.cardHolder}}</p> -->
        </div>
    </div>

    <hr />
    <br>
    <h3 class="text-left"> <b>Productos</b> </h3>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Cantidad</th>
                <th scope="col">Producto</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <!--  {{#each order.orderItems}}
                {{> purchase-item-partial this }}
                {{/each}} -->

        </tbody>
    </table>
    <br>

    <div class="container">
        <div class="row">
            <b>Subtotal:</b>&nbsp;
            <!-- <p>{{formatPrice order.subtotal}}</p> -->
        </div>
        <div class="row">
            <b>Tax:</b>&nbsp;
            <!-- <p>{{formatTax order.tax}}</p> -->
        </div>
        <div class="row">
            <b>Total:</b>&nbsp;
            <!-- <p>{{formatPrice order.total}}</p> -->
        </div>
    </div>

    <br><br>



</body>

</html>
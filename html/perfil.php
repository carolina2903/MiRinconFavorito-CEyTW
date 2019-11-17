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
</head>

<body>
    
<h3 class="text-left"><b>Mi perfil</b> </h3>
        <hr />
        <div class="container">
            <div class="row">
                <b>Nombre:</b>&nbsp;
                <!-- <p>{{user.name}}</p> -->
            </div>
            <div class="row">
                <b>Apellidos:</b>&nbsp;
                <!-- <p>{{user.surname}}</p> -->
            </div>
            <div class="row">
                <b>Fecha de nacimiento:</b>&nbsp;
                <!-- <p>{{formatDate user.birth}}</p> -->
            </div>
            <div class="row">
                <b>Dirección postal:</b>&nbsp;
                <!-- <p>{{user.address}}</p> -->
            </div>
            <div class="row">
                <b>Email:</b>&nbsp;
                <!-- <p>{{user.email}}</p> -->
            </div>
        </div>

        <hr />
        <br>
        <h3 class="text-left"> <b>Lista de pedidos:</b> </h3>


        <table id="orderstable" class="table">
            <thead>
                <tr>
                    <th scope="col">Fecha</th>
                    <th scope="col">Número</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                   <!-- {{#each user.userOrders}}
                    {{> order-partial this details_onclick='Controller.controllers.profile.details_clicked'}}
                    {{!-- FALTA BOTON DETAILS --}}
                {{/each}} -->
            </tbody>
        </table>

        <br><br>

</body>
</html>
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
<?php require '../html/estaticos/nav.php'; ?>
<br><br><br>
<?php require '../html/estaticos/jumbotron.php'; ?>

<div class="container">
            <h3 class="text-center">Cojín dibujo simple</h3>
            <br>
            <form>

                <div class="form-group">
                    <p>Nombre del dibujo a incluir:</p>
                    <input type="text" class="form-control" id="sr" required="required" placeholder="Gato">
                </div>
                <div class="form-group">
                    <p>Nombre</p>
                    <input type="text" class="form-control" id="sra" required="required" placeholder="Pepe">
                </div>
                <div class="form-group">
                    <p>Fecha</p>
                    <input type="date" id="datetipocorazondoblenormal" class="form-control "
                        name="datetipocorazondoblenormal" required="required" value="12/12/2001" />
                </div><br>


                <br><br><br>
                <div class="form-check">
                    <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/cart"
                        onclick="Controller.controllers.tipodibujosimple.carrito_clicked(event);">Añadir al carrito</a>
                </div><br><br>
                <div class="form-check">
                    <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/purchase"
                        onclick="Controller.controllers.tipodibujosimple.comprar_clicked(event);">Comprar ahora</a>
                </div>


            </form>

        </div> <br><br><br><br><br><br><br>
    
        <br><br><br>
    
    <?php require 'html/estaticos/footer.php' ;?>

</body>
</html>
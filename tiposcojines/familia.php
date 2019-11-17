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
    
<div class="container">
            <h3 class="text-center">Cojín dibujo simple</h3>
            <br>
            <form>

                <form action="funkoshop/views/templates/php/tipofamilia_action.php" method="post" target="_blank">
                    <p>
                        Número de miembors a incluir en el cojín: 
                        <input type="number" name="miembrosañadir" min="1" max="10" step="1">
                        <input type="submit" name="introducir" value="Introducir">
                    </p>
                </form>

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
    

</body>
</html>
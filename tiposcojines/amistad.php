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
        <h3 class="text-center">Cojín amistad</h3>
        <br>
        <form>

            <div class="form-group">
                <select name="Género" required="required" target="_blank">
                    <option value="1">Mujer</option>
                    <option value="2">Hombre</option>
                </select>
            </div><br>


            <br><br><br>
            <div class="form-check">
                <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/cart" onclick="Controller.controllers.tipoamistad.carrito_clicked(event);">Añadir al carrito</a>
            </div><br><br>
            <div class="form-check">
                <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/purchase" onclick="Controller.controllers.tipoamistad.comprar_clicked(event);">Comprar ahora</a>
            </div>

        </form>

    </div> <br><br>

    <br><br><br>
    
    <?php require 'html/estaticos/footer.php' ;?>
</body>

</html>
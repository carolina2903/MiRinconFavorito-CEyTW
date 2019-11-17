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
    
<div class="container">
            <h3 class="text-center">Cojín corazón doble normal</h3>
            <br>
            <form>

                <div class="form-group">
                    <p>Nombre para el cojín izquierdo</p>
                    <input type="text" class="form-control" id="nombreizdo" required="required" placeholder="María">
                </div>
                <div class="form-group">
                    <p>Nombre para el cojín derecho</p>
                    <input type="text" class="form-control" id="nombredcho" required="required" placeholder="Pepe">
                </div>
                <div class="form-group">
                    <p>Fecha para ambos cojines (opcional)</p>
                    <input type="date" id="datetipocorazondoblenormal" class="form-control "
                        name="datetipocorazondoblenormal" value="" />
                </div><br>

                <div class="form-check">
                    <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/cart"
                        onclick="Controller.controllers.tipocorazondoblenormal.carrito_clicked(event);">Añadir al carrito</a>
                </div><br><br>
                <div class="form-check">
                    <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/purchase"
                        onclick="Controller.controllers.tipocorazondoblenormal.comprar_clicked(event);">Comprar ahora</a>
                </div>


            </form>

        </div> <br><br><br><br><br><br><br>
    

</body>
</html>
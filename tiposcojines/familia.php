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

<?php require '../html/estaticos/nav.php'; ?>
<br><br><br>
<?php require '../html/estaticos/jumbotron.php'; ?>

<script>
        function a() {
            alert('ajjaj');
            // var num = document.getElementById("miembrosañadir").value;
            
            // // var cont = 0;
            // // while (num < cont) {
            // //     document.getElementById("html_miembros").innerHTML = +'<input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre">';
            // //     cont++;
            // // }
            // var container = document.getElementById('html_miembros');
            // container.innerHTML = '<input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre">';

        }
    </script>



    <div class="container">
        <h3 class="text-center">Cojín dibujo simple</h3>
        <br>
        <form>


            <p>
                Número de miembors a incluir en el cojín:
                <input type="number" name="miembrosañadir" min="1" max="10" step="1">

                <button onClick="a()" name="introducir" style="float: right;">Entrar</button>
                <!-- <input type="submit" onclick="introducir()" name="introducir" value="Introducir"> -->
            </p>

            <p id="html_miembros"></p>




            <br><br><br>
            <div class="form-check">
                <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/cart" onclick="Controller.controllers.tipodibujosimple.carrito_clicked(event);">Añadir al carrito</a>
            </div><br><br>
            <div class="form-check">
                <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/purchase" onclick="Controller.controllers.tipodibujosimple.comprar_clicked(event);">Comprar ahora</a>
            </div>


        </form>

    </div> <br><br><br><br><br><br><br>

    <br><br><br>
    
    <?php require 'html/estaticos/footer.php' ;?>
    

</body>

</html>
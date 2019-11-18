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

    <div class="container">
        <h3 class="text-center">Iniciar sesión</h3>
        <br>
        <!-- <form> -->
            <!-- <div class="form-group"> -->
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="email@email.com">
            <!-- </div> -->
            <!-- <div class="form-group"> -->
                <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" value="password">
            <!-- </div> -->
            <!-- <div class="form-check"> -->
                <button onclick="entrar()" name="entrar" style="float: right;">Entrar</button>
                <!-- <a class="btn btn-info" name="entrar" style="float: right;" onClick='entrar()'>Iniciar sesión</a> -->
            <!-- </div> -->

        <!-- </form> -->

    </div> <br><br>


    <script>
        
        function entrar() {
            window.location.assign("index_.php")
        }

    </script>



</body>

</html>
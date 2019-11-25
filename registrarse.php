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

    <br><br><br>
    
    <?php require 'estaticos/jumbotron.php' ;?>

    <script>
        function registrarse() {
            window.location.assign("entrar.php");
        }
    </script>


    <div class="container">
        <h3 class="text-center">Registrarse</h3>
        <br>
        <!-- <form> -->
            <!-- <div class="form-group"> -->
            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre" value="test">
            <!-- </div> -->
            <!-- <div class="form-group"> -->
            <input type="text" class="form-control" id="surname" aria-describedby="surnameHelp" placeholder="Apellidos" value="test">
            <!-- </div> -->
            <!-- <div class="form-group"> -->
            <input type="text" class="form-control" id="address" aria-describedby="addressHelp" placeholder="Dirección postal" value="test">
            <!-- </div> -->
            <!-- <div class="form-group"> -->
            <input type="date" class="form-control" id="birth" aria-describedby="birthHelp" value="2019-11-30">
            <!-- </div> -->
            <!-- <div class="form-group"> -->
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="email12345@email.com">
            <!-- </div> -->
            <!-- <div class="form-group"> -->
            <input type="password" class="form-control" id="password" placeholder="Contraseña" value="password">
            <!-- </div> -->
            <!-- <div class="form-group"> -->
            <input type="password" class="form-control" id="confirmpassword" placeholder="Confirmar contraseña" value="password">
            <!-- </div> -->
            <!-- <div class="form-check"> -->
            <button class="btn btn-info" onClick="registrarse()" style="float: right">Registrarse</button>
            <!-- </div> -->
            <br><br><br>
        <!-- </form> -->

    </div> <br><br>


    <br><br><br>
    
    <?php require 'estaticos/footer.php' ;?>

    
</body>

</html>
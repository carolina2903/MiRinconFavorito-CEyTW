<?php
session_start();
require 'conexionPDO.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Rincón Favorito</title>
    <!--CSS BOOTSTRAP-->
    <link rel="styleheet" href="css/bootstrap.css">
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>


    <?php require 'estaticos/nav.php'; ?>

    <br><br><br>

    <?php require 'estaticos/jumbotron.php'; ?>

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
        <input type="text" name="nombre" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre" value="test">
        <!-- </div> -->
        <br>
        <!-- <div class="form-group"> -->
        <input type="text" name="apellidos" class="form-control" id="surname" aria-describedby="surnameHelp" placeholder="Apellidos" value="test">
        <!-- </div> -->
        <br>
        <!-- <div class="form-group"> -->
        <input type="text" name="telefono" class="form-control" id="telefono">
        <br>
        <!-- <div class="form-group"> -->
        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email" value="email12345@email.com">
        <!-- </div> -->
        <br>
        <!-- <div class="form-group"> -->
        <input type="password" name="password1" class="form-control" id="password" placeholder="Contraseña" value="password">
        <!-- </div> -->
        <br>
        <!-- <div class="form-group"> -->
        <input type="password" name="password2" class="form-control" id="confirmpassword" placeholder="Confirmar contraseña" value="password">
        <!-- </div> -->
        <br>
        <!-- <div class="form-check"> -->
        <button class="btn btn-info" name="registrarse" style="float: right">Registrarse</button>
        <!-- </div> -->
        <br><br><br>
        <!-- </form> -->

    </div> <br><br>


    <br><br><br>

    <?php require 'estaticos/footer.php'; ?>


</body>

</html>



<!-- PHP -->
<?php

$nombre = "";
$apellidos = "";
$telefono = "";
$email = "";
$password1 = "";
$password2 = "";

$errors = array();

/* $id_direccion= "";

 $calle= "";
$numero= 0;
$bloque= "";
$piso= 0;
$letra= "";
$escalera= "";
$localidad= "";
$codigo_postal= 0000;
$provincia= ""; */


// REGISTER USER
if (isset($_POST['registrarse'])) {
    // receive all input values from the form
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($nombre)) {
        array_push($errors, "El campo nombre no puede estar vacío");
        echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
    }
    if (empty($apellidos)) {
        array_push($errors, "El campo apellidos no puede estar vacío");
        echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
    }
    if (empty($telefono)) {
        array_push($errors, "El campo telefono no puede estar vacío");
        echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
    }
    if (empty($email)) {
        array_push($errors, "El campo email no puede estar vacío");
        echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
    }
    if (empty($password_1)) {
        array_push($errors, "El campo password no puede estar vacío");
        echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
    }
    if ($password_1 != $password_2) {
        array_push($errors, "Las contraseñas no coinciden");
        echo "<div align='center' style='color:red'>Contraseña incorrecta. <br>Por favor, vuelva a intentarlo.</div>";
    }

    // first check the database to make sure 
    // a user does not already exist with the same email
    $user_check_query = "SELECT * FROM cliente WHERE email='$email' LIMIT 1";
    $result = $conexionPDO->query($sql_select);
    $user = $resultado_select->fetch(PDO::FETCH_ASSOC);

    if ($user) { // if user exists
        if ($user['email'] === $email) {
            array_push($errors, "El email ya está en el sistema.");
            echo "<div align='center' style='color:red'>El email ya está en el sistema</div>";
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1); //encrypt the password before saving in the database

        $sql = "INSERT INTO cliente (nombre, apellidos, telefono, email, passwd) 
                  VALUES('$nombre', '$apellidos', '$telefono', '$email', '$password')";

        echo $sql;

        $stmtPDO = $conexionPDO->prepare($sql);
        $stmtPDO->execute(array($nombre, $apellidos, $telefono, $email, $password));

        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        echo "<script language='javascript'> registrarse(); </script>";
    }
}

?>
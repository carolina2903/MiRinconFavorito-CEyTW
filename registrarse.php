<?php
require 'conexionPDO.php';
?>

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
        <form action="registrarse.php" method="POST">

            <input type="text" name="nombre" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Nombre">
            <br>
            <input type="text" name="apellidos" class="form-control" id="surname" aria-describedby="surnameHelp" placeholder="Apellidos">
            <br>
            <input type="tel" name="telefono" class="form-control" id="telefono" placeholder="Teléfono">
            <br>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
            <br>
            <input type="password" name="password1" class="form-control" id="password" placeholder="Contraseña">
            <br>
            <input type="password" name="password2" class="form-control" id="confirmpassword" placeholder="Confirmar contraseña">
            <br>
            <!-- <button class="btn btn-info" name="registrarse" style="float: right">Registrarse</button> -->
            <input type="submit" class="btn btn-info" style="float: right; width:200px;" name="registrarse" value="Registrarse" />
            <br>
        </form>
        
    </div> 


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
        echo "<script>window.alert('El campo nombre no puede estar vacío')</script>";
        echo "<div align='left' style='color:red'>El campo nombre no puede estar vacío</div>";
    }
    if (empty($apellidos)) {
        array_push($errors, "El campo apellidos no puede estar vacío");
        echo "<script>window.alert('El campo apellidos no puede estar vacío')</script>";
        echo "<div align='left' style='color:red'>El campo apellidos no puede estar vacío</div>";
    }
    if (empty($telefono)) {
        array_push($errors, "El campo telefono no puede estar vacío");
        echo "<script>window.alert('El campo telefono no puede estar vacío')</script>";
        echo "<div align='left' style='color:red'>El campo telefono no puede estar vacío</div>";
    }
    if(strlen($telefono) < 9) {
        array_push($errors, "El campo telefono tiene que tener 9 dígitos");
        echo "<script>window.alert('El campo telefono tiene que tener 9 dígitos')</script>";
        echo "<div align='left' style='color:red'>El campo telefono tiene que tener 9 dígitos</div>";
    }
    if (empty($email)) {
        array_push($errors, "El campo email no puede estar vacío");
        echo "<script>window.alert('El campo email no puede estar vacío')</script>";
        echo "<div align='left' style='color:red'>El campo email no puede estar vacío</div>";
    }
    if (empty($password1) || empty($password2)) {
        array_push($errors, "El campo password no puede estar vacío");
        echo "<script>window.alert('Los campos password no pueden estar vacíos')</script>";
        echo "<div align='left' style='color:red'>Los campos password no pueden estar vacíos</div>";
    }
    if ($password1 != $password2) { /* Comprobamos que las contraseñas coinciden */
        array_push($errors, "Las contraseñas no coinciden");
        echo "<script>window.alert('Las contraseñas no coinciden')</script>";
        echo "<div align='left' style='color:red'>Las contraseñas no coinciden</div>";
    }

    // first check the database to make sure 
    // a user does not already exist with the same email
    $sql_select = "SELECT * FROM cliente WHERE email='$email' LIMIT 1";
    $resultado_select = $conexionPDO->query($sql_select);
    $user = $resultado_select->fetch(PDO::FETCH_ASSOC);
    if ($user) { // if user exists
        if ($user['email'] === $email) {
            array_push($errors, "El email ya está en el sistema.");
            echo "<script>window.alert('El email ya está registrado en el sistema.')</script>";
            echo "<div align='left' style='color:red'>El email ya está registrado en el sistema. Por favor, inicie sesión</div>";
            echo "<div align='left'><a href='entrar.php'>Iniciar sesión</a></div>";
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {

        /* CREAMOS ID CLIENTE */
        $sql = "SELECT count(*) FROM cliente";
        $numeroclientes = 0;
        if ($res = $conexionPDO->query($sql)) {
            if ($res->fetchColumn() > 0) {
                $sql = "SELECT * FROM cliente";
                foreach ($conexionPDO->query($sql) as $row) {
                    $numeroclientes++;
                }
            }
        }
        $numero_id = (string) ($numeroclientes + 1);
        $id_cliente_creado = "cl" . $numero_id;

        /* AÑADIMOS EL NUEVO USUARIO A LA BBDD */
        $password = password_hash($password1, PASSWORD_DEFAULT); //encrypt the password before saving in the database
        $sql = "INSERT INTO cliente (id_cliente, nombre, apellidos, telefono, email, passwd) 
                  VALUES('$id_cliente_creado', '$nombre', '$apellidos', '$telefono', '$email', '$password')";
        $stmtPDO = $conexionPDO->prepare($sql);
        $stmtPDO->execute(array($id_cliente_creado, $nombre, $apellidos, $telefono, $email, $password));
        
       echo "<script language='javascript'> registrarse(); </script>";
    }
    
}


?>


    <br><br><br><br><br><br><br><br><br>
    <?php require 'estaticos/footer.php'; ?>
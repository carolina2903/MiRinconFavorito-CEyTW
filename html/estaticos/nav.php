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
    <!--Navegación-->

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

        <a class="navbar-brand" href="/funkoshop/views/index" onClick="index()">
            <img src="imagenes/logo_recortado.png" width="67" height="67"></img>
            MI RINCÓN FAVORITO
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Carrito&nbsp;
                        <span class="badge badge-light">0</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="mirinconfavorito/carrito.php" onClick="index()">Ver carrito</a>
                        <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Comprar</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Usuario&nbsp;</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Registrarse</a>
                        <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Iniciar sesión</a>
                        <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Mi perfil</a>
                        <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>


        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Show cart</a>
            <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Purchase</a>
        </div>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Sign Up</a>
            <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Sign In</a>
            <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Profile</a>
            <a class="dropdown-item" href="mirinconfavorito/comprar.php" onClick="index()">Sign Out</a>
        </div>



    </nav>


    <script>
        function entrar() {
            window.location.assign("tiposcojines/familia.php");
        }
    </script>

</body>

</html>
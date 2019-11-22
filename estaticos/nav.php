<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MiRinconFavorito</title>
    <!--CSS BOOTSTRAP-->

    <link rel="styleheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- con estas tres librerias/scripts conseguimos que funcione el dropdown-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../css/estilos.css">



</head>

<body>

    <script>
        function index() {
            window.location.assign("/MiRinconFavorito-CEyTW/index_.php");
        }

        function carrito() {
            window.location.assign("/MiRinconFavorito-CEyTW/carrito.php");
        }

        function registrarse() {
            window.location.assign("/MiRinconFavorito-CEyTW/registrarse.php");
        }

        function iniciar_sesion() {
            window.location.assign("/MiRinconFavorito-CEyTW/entrar.php");
        }

        function mi_perfil() {
            window.location.assign("/MiRinconFavorito-CEyTW/perfil.php");
        }

        function cerrar_sesion() {
            window.location.assign("/MiRinconFavorito-CEyTW/index_.php");
        }
    </script>

    <!--Navegación-->

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">

        <a class="navbar-brand" onClick="index()">
            <img src="imagenes/logo_recortado.png" width="67" height="67"></img>
            <a class="h2" style="color:white;" onClick="index()">MI RINCÓN FAVORITO</a>
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
        
        <div id="searchbar2">
          <input id="search_input2" type="text" name="" placeholder="Buscar...">
          <a href="#" id="search_icon2"><i class="fas fa-search"></i></a>
        </div>
      
            <ul class="navbar-nav">
                
                <li class="nav-item dropdown">
                    <a class="nav-link d-flex align-items-center" id="dropdown01" onClick="carrito()">Carrito&nbsp;
                        <span class="badge badge-light">0</span>
                    </a>


                    
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Usuario&nbsp;</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown01">
                        <a class="dropdown-item" onClick="registrarse()">Registrarse</a>
                        <a class="dropdown-item" onClick="iniciar_sesion()">Iniciar sesión</a>
                        <a class="dropdown-item" onClick="mi_perfil()">Mi perfil</a>
                        <a class="dropdown-item" onClick="cerrar_sesion()">Cerrar sesión</a>
                    </div>
                </li>
            </ul>
        </div>


       







</div> 
</div> 
    </nav>




</body>

</html>
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


    <!-- JAVASCRIPT -->

    <script>
        function tipoamistad() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/amistad.php");
        }

        function tipoprofesiondobleseñorseñora() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/profesionesdoblesrsra.php");
        }

        function tipocorazonesdoblenormal() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/corazonesdoblenormal.php");
        }

        function tipocorazonesdobleseñorseñora() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/corazonesdobleseñorseñora.php");
        }

        function tipodibujosimple() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/dibujosimple.php");
        }

        function tipofamilia() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/familia.php");
        }

        function tiponatalicio() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/natalicio.php");
        }

        function tipopersonalizado() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/personalizado.php");
        }

        function tipoprofesionesdoble() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/profesionesdoble.php");
        }

        function tipoprofesionsimple() {
            window.location.assign("/MiRinconFavorito-CEyTW/tiposcojines/profesionsimple.php");
        }
    </script>

    <div class="container">
        <div class="row">


            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinescorazonsrsra.JPG" alt="Imagen cojínes de corazón sr/sra.">
                    <div class="card-body">
                        <h4 class="card-title">Cojines corazón Sr y Sra</h4>
                        <div class="card-price" font-size="1">
                            <h5>24,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipocorazonesdobleseñorseñora()" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinesprofesionessrsra.JPG" alt="Imagen cojínes de corazón sr/sra.">
                    <div class="card-body">
                        <h4 class="card-title">Cojines profesión Sr y Sra</h4>
                        <div class="card-price" font-size="1">
                            <h5>24,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipoprofesiondobleseñorseñora()" />
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinfamilia.JPG" alt="Imagen cojín familia.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín familia</h4>
                        <div class="card-price" font-size="1">
                            <h5>14,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipofamilia()" />
                        </div>

                        
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinescorazon.JPG" alt="Imagen cojínes corazón.">
                    <div class="card-body">
                        <h4 class="card-title">Cojines corazón</h4>
                        <div class="card-price" font-size="1">
                            <h5>24,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipocorazonesdoblenormal()" />
                        </div>
                        
                    </div>
                </div>
            </div>



            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinesprofesiones.JPG" alt="Imagen cojínes profesiones.">
                    <div class="card-body">
                        <h4 class="card-title">Cojines profesiones</h4>
                        <div class="card-price" font-size="1">
                            <h5>24,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipoprofesionesdoble()" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinamistad3.JPG" alt="Imagen cojín amistad.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín amistad</h4>
                        <div class="card-price" font-size="1">
                            <h5>14,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipoamistad()" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinprofesionsimple.JPG" alt="Imagen cojín profesion simple.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín profesión simple</h4>
                        <div class="card-price" font-size="1">
                            <h5>14,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipoprofesionsimple()" />
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinbebe2.JPG" alt="Imagen cojín para bebés.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín para bebés</h4>
                        <div class="card-price" font-size="1">
                            <h5>14,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tiponatalicio()" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojindibujo.JPG" alt="Imagen cojín dibujo.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín con dibujo</h4>
                        <div class="card-price" font-size="1">
                            <h5>16,00€</h5>
                            <input type="submit" class="btn btn-info product-button" style="float: right; width:auto;" value="Personalizar" onclick="tipodibujosimple()" />
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



    <br><br>

    <?php require 'estaticos/footer.php'; ?>

</body>

</html>
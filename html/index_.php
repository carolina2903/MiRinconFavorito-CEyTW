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

    <!-- JAVASCRIPT -->

    <script>
        function tipoamistad() {
            window.location.assign("tiposcojines/amistad.php");
        }


        function tipocorazonesdoblenormal() {
            window.location.assign("tiposcojines/corazonesdoblenormal.php");
        }

        function tipocorazonesdobleseñorseñora() {
            window.location.assign("tiposcojines/corazonesdobleseñorseñora.php");
        }

        function tipodibujosimple() {
            window.location.assign("tiposcojines/dibujosimple.php");
        }

        function tipofamilia() {
            window.location.assign("tiposcojines/familia.php");
        }

        function tiponatalicio() {
            window.location.assign("tiposcojines/natalicio.php");
        }

        function tipopersonalizado() {
            window.location.assign("tiposcojines/personalizado.php");
        }

        function tipoprofesionesdoble() {
            window.location.assign("tiposcojines/profesionesdoble.php");
        }

        function tipoprofesionsimple() {
            window.location.assign("tiposcojines/profesionsimple.php");
        }
    </script>

    <div class="container">
        <div class="row">


            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinescorazonsrsra.JPG" alt="Imagen cojínes de corazón sr/sra.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín corazón Sr y Sra</h4>
                        <div class="card-price" font-size="1">
                            <div class="row justify-content-end">
                                <h5>24€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipocorazonesdobleseñorseñora()'>Personalizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinescorazon.JPG" alt="Imagen cojínes corazón.">
                    <div class="card-body">
                        <h4 class="card-title">Cojínes corazón</h4>
                        <div class="card-price" font-size="1">
                            <div class="row justify-content-end">
                                <h5>24€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipocorazonesdoblenormal()'>Personalizar</a>
                            </div>
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
                            <div class="row justify-content-end">
                                <h5>13€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipofamilia()'>Personalizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinesprofesiones.JPG" alt="Imagen cojínes profesiones.">
                    <div class="card-body">
                        <h4 class="card-title">Cojínes profesiones</h4>
                        <div class="card-price" font-size="1">
                            <div class="row justify-content-end">
                                <h5>24€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipoprofesionesdoble()'>Personalizar</a>
                            </div>
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
                            <div class="row justify-content-end">
                                <h5>13€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipoprofesionsimple()'>Personalizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinamistad.JPG" alt="Imagen cojín amistad.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín amistad</h4>
                        <div class="card-price" font-size="1">
                            <div class="row justify-content-end">
                                <h5>13€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipoamistad()'>Personalizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <img class="card-img-top" src="imagenes/cojinbebe.JPG" alt="Imagen cojín para bebés.">
                    <div class="card-body">
                        <h4 class="card-title">Cojín para bebés</h4>
                        <div class="card-price" font-size="1">
                            <div class="row justify-content-end">
                                <h5>13€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tiponatalicio()'>Personalizar</a>
                            </div>
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
                            <div class="row justify-content-end">
                                <h5>15€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipodibujosimple()'>Personalizar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-4">
                <div class="card text-black bg-light mb-3">
                    <!-- <img class="card-img-top" src="imagenes/cojinamistad.JPG" alt="Imagen cojín amistad."> -->
                    <div class="card-body">
                        <h4 class="card-title">Cojín personalizado</h4>
                        <div class="card-price" font-size="1">
                            <div class="row justify-content-end">
                                <h5>10€&nbsp;</h5>
                                <br>
                                <a class="btn btn-info product-button" onClick='tipopersonalizado()'>Personalizar</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>







</body>

</html>
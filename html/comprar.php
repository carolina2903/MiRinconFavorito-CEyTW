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


    <script>
        var f = new Date();
        fecha_texto = f.getFullYear() + "/" + f.getMonth() + "/" + f.getDate();
        //ms = Date.parse(fecha_texto);
        //fecha = new Date(ms);
        document.getElementById("fechacompra").valueAsDate = new Date();
        //document.getElementById('fechacompra').innerHTML = fecha_texto;
    </script>


    <div class="container">
        <h3 class="text-left"><b>Datos de compra</b></h3>
        <hr>
        <br>
        <h4 id="demo2"></h4>
        <form>

            <div class="form-group">
                <input type="date" class="form-control" id="fechacompra" aria-describedby="dateHelp" readonly>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" id="purchase-address" aria-describedby="addressHelp" placeholder="Dirección de envío">
            </div>

            <br>
            <h5><b>Información de tarjeta</b></h5>
            <div class="form-group">

                <input type="text" class="form-control" name="card-holder-name" id="card-holder-name" placeholder="Nombre del propietario de tarjeta">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Número de tarjeta">
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="expiry-month"><b>Fecha de caducidad</b></label>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-2">
                            <select class="form-control" name="expiry-month" id="expiry-month" value="Mes">
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <select class="form-control" name="expiry-year">

                                <option value="19">2019</option>
                                <option value="20">2020</option>
                                <option value="21">2021</option>
                                <option value="22">2022</option>
                                <option value="23">2023</option>
                                <option value="24">2024</option>
                                <option value="25">2025</option>
                                <option value="26">2026</option>
                                <option value="27">2027</option>
                                <option value="28">2028</option>
                                <option value="29">2029</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="cvv" id="cvv" placeholder="CVV" length="3" pattern="[0-9]{3}">
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <br>

            <h5><b>Lista de productos</b></h5>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Producto</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <!--  {{#each cart.shoppingCartItems}}
                        {{> purchase-item-partial this }}
                    {{/each}} -->
                </tbody>
            </table>
            <hr>
            <div class="container">
                <div class="row">
                    <b>Subtotal: </b>&nbsp;
                    <!-- <p>{{formatPrice cart.subtotal}}</p> -->
                </div>
                <div class="row">
                    <b>Impuestos: </b>&nbsp;
                    <!-- <p>{{formatTax cart.tax}}</p> -->
                </div>
                <div class="row">
                    <b>Total: </b>&nbsp;
                    <!-- <p>{{formatPrice cart.total}}</p> -->
                </div>
            </div>
            <hr>
            <div class="form-check">
                <a onClick="validar()" class="btn btn-info" style="float: right;" role="button">Finalizar compra</a>
            </div>

        </form>

    </div> <br><br><br><br>

    <script>
        function validar() {
            window.location.assign("profile.php");
        }
    </script>

</body>

</html>
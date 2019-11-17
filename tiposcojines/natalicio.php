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
    
<div class="container">
            <h3 class="text-center">Cojín nacimiento bebés</h3>
            <br>
            <form>

                <div class="form-group">
                    <p>Nombre:</p>
                    <input type="text" class="form-control" name="nombrebebe" required="required">
                </div>
                <div class="form-group">
                    <p>Hora de nacimiento:</p>
                    <input type="text" class="form-control" name="horanacimiento" required="required"
                        placeholder="20:30">
                </div>
                <div class="form-group">
                    <p>Fecha</p>
                    <input type="date" id="fechanacimiento" class="form-control " name="fechanacimiento"
                        required="required" value="12/12/1998" />
                </div>
                <div class="form-group">
                    <p>Peso:</p>
                    <input type="text" class="form-control" name="peso" required="required" placeholder="3.5kg">
                </div>
                <div class="form-group">
                    <p>Altura:</p>
                    <input type="text" class="form-control" name="altura" required="required" placeholder="51cm">
                </div><br>

                <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                    <label for="colorprimario">Color primario</label>
                    <select name="colorprimario" class="form-control " required="required">
                        <option value="Azul claro">Azul claro</option>
                        <option value="Azul cielo">Azul cielo</option>
                        <option value="Azul turquesa">Azul turquesa</option>
                        <option value="Lila">Lila</option>
                        <option value="Violeta">Violeta</option>
                        <option value="Rosa">Rosa</option>
                        <option value="Rosa claro">Rosa claro</option>
                        <option value="Coral">Coral</option>
                        <option value="Rojo">Rojo</option>
                        <option value="Rojo vino">Rojo vino</option>
                        <option value="Naranja">Naranja</option>
                        <option value="Amarillo">Amarillo</option>
                        <option value="Verde">Verde</option>
                        <option value="Verde esmeralda">Verde esmeralda</option>
                        <option value="Gris">Gris</option>
                    </select>
                    <div class="select_arrow"></div>
                </div>

                <div class="wcpa_form_item wcpa_type_select  form-control_parent">
                    <label for="colorsecundario">Color secundario</label>
                    <div class="select"><select name="colorsecundario" class="form-control " required="required">
                            <option value="Azul claro">Azul claro</option>
                            <option value="Azul cielo" selected="selected">Azul cielo</option>
                            <option value="Azul turquesa">Azul turquesa</option>
                            <option value="Lila">Lila</option>
                            <option value="Violeta">Violeta</option>
                            <option value="Rosa">Rosa</option>
                            <option value="Rosa claro">Rosa claro</option>
                            <option value="Coral">Coral</option>
                            <option value="Rojo">Rojo</option>
                            <option value="Rojo vino">Rojo vino</option>
                            <option value="Naranja">Naranja</option>
                            <option value="Amarillo">Amarillo</option>
                            <option value="Verde">Verde</option>
                            <option value="Verde esmeralda">Verde esmeralda</option>
                            <option value="Gris">Gris</option>
                        </select>
                        <div class="select_arrow"></div>
                    </div>
                </div>
        </div>


        <div class="form-check">
            <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/cart"
                onclick="Controller.controllers.tiponatalicio.carrito_clicked(event);">Añadir al carrito</a>
        </div><br><br>
        <div class="form-check">
            <a class="btn btn-info" style="float: right; width:200px;" href="/funkoshop/views/purchase"
                onclick="Controller.controllers.tiponatalicio.comprar_clicked(event);">Comprar ahora</a>
        </div>


        </form>

</div> <br><br><br><br><br><br><br>


</body>
</html>
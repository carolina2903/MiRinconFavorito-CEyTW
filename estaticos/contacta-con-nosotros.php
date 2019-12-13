
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contacto</title>
    <!--CSS BOOTSTRAP-->
    <link rel="styleheet" href="css/bootstrap.css">
    <link href='css/bootstrap.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/estilos.css">
</head>
    
<?php require 'navtiposcojines.php' ;?>
<br><br><br><br>
<body>

<h1>Contacta con nosotros</h1>

<ol style="font-family:courier;" style="font-size:300%;">
    <li>Correo electrónico: escribe un correo electrónico a la siguiente dirección mirinconfavoritotienda@gmail.com y responderemos con la mayor brevedad posible.</li>
    <li>Teléfono: llámanos o escríbenos un whatsapp al siguiente número de teléfono 693 606 438</li>
    <li>Facebook: contacta con nosotros a través de nuestra página de facebook Mi Rincón Favorito</li>
</ol>

<p style="font-family:courier;" style="font-size:300%;">
También puedes contactar con nosotros rellenando el siguiente formulario.</p>

<div id="after_submit"></div>
<form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
  <div class="row">
    <label class="required" for="name">Tu nombre:</label><br />
    <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
    <span id="name_validation" class="error_message"></span>
  </div>
  <div class="row">
    <label class="required" for="email">Tu email:</label><br />
    <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
    <span id="email_validation" class="error_message"></span>
  </div>
  <div class="row">
    <label class="required" for="message">¿Qué duda tienes?:</label><br />
    <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
    <span id="message_validation" class="error_message"></span>
  </div>
    
    <input id="submit_button" type="submit" value="Enviar correo" />

</form>
</body>
<br><br><br><br><br>

<?php require 'footer.php';?>

</html>
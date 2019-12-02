function cambiarcantidadcarrito(){
    var contador='<?php  $contador=0; for($i = 0; $i < count($_SESSION["carrito"]); ++$i)  { $contador++;}  echo $contador;?>';
    document.getElementById('cantidadcarritospan').innerHTML=contador;
}
<?php
class carrito
{
//atributos
var $num_productos;
var $precio_total;
var $array_nombre_prod;
var $array_precio_prod;
var $array_cant_prod;
var $preciototal;
var $tax;
// constructor
function __construct( )
{
$this->num_productos=0;
$this->precio_total=0;
//return 'Hola, cómo estás?';
}
//introducir un artículo en el carrito pasándole el
//nombre, el precio y las unidades de ese producto
function introduce_producto($nombre_prod,$precio_prod,$cantidad_prod) {
	$this->array_nombre_prod[$this->num_productos]=$nombre_prod;
	$this->array_precio_prod[$this->num_productos]=$precio_prod;
	$this->array_cant_prod[$this->num_productos]=$cantidad_prod;
	
	$this->num_productos++;	
	//return $nombre_prod;
	//return $cantidad_prod;
}
//Muestra el contenido del carrito
function imprime_carrito($tax,$preciototal){
	$this->tax=$tax;
	$this->preciototal=$preciototal;
 	$suma=0;
	echo "<table border='1' cellpading='3'>";
	echo "<tr><td><b>Nombre del producto</td><td>Precio</td><td>Cantidad</b></td></tr>";
	
	for ($i=0;$i<$this->num_productos;$i++){		
			echo "<tr>";
			echo "<td>".$this->array_nombre_prod[$i]."</td>";
			echo "<td><div id='precio".$i."'>".$this->array_precio_prod[$i]. "  €  "."</div></td>";
			echo "<td>".$this->array_cant_prod[$i]."</td>";
			$suma+=$this->array_precio_prod[$i]*$this->array_cant_prod[$i];			
	} 
	//$this->precio_total=$suma;
	echo "<tr><tr><tr></tr></tr></tr>";
	echo "<tr><td>TOTAL</td><td><div id='total'>".$this->preciototal*$this->tax."  €  "."</div></td><td></td></tr>";
	echo "<tr><td>TOTAL+IVA</td><td><div id='totaliva'>".($this->preciototal)."  €  "."</div></td><td></td></tr>";
	echo "</table>"."<br>"."<br>";	
}
//rellenar el formulario de paypal sandbox y enviarlo para pagar
function comprar($nombre,$apellidos,$direccion,$localidad,$cp){
	
	echo "<form name=\"formTPV\" method=\"post\" action=\"https://www.sandbox.paypal.com/cgi-bin/webscr\">
		
		<input type=\"hidden\" name=\"cmd\" value=\"_cart\">
		<input type=\"hidden\" name=\"upload\" value=\"1\">
		<input type=\"hidden\" name=\"business\" value=\"vendedor1@business.example.com\">";
	
		for ($i=0;$i<$this->num_productos;$i++){	
			$b=$i+1;
			$tax=$this->array_precio_prod[$i]*0.21;
			echo "<input type=\"hidden\" name=\"item_name_".$b."\" value=".$this->array_nombre_prod[$i].">";
			echo "<input type=\"hidden\" name=\"quantity_".$b."\" value=".$this->array_cant_prod[$i].">";
			echo "<input type=\"hidden\" name=\"amount_".$b."\" value=".$this->array_precio_prod[$i].">";
			echo "<input type=\"hidden\" name=\"tax_".$b."\" value=".$tax.">";
		} 
		
		echo "
					
		<input type=\"hidden\" name=\"return\" value=\"http://localhost:8080/Examen%202/exito.php\">
		<input type=\"hidden\" name=\"cancel_return\" value=\"http://localhost:8080/Examen%202/cancelacion.php\">
		<input type=\"hidden\" name=\"no_note\" value=\"1\">
		<input type=\"hidden\" name=\"currency_code\" value=\"EUR\">
		<input type=\"hidden\" name=\"first_name\" value=".$_SESSION['nombre'].">
		<input type=\"hidden\" name=\"last_name\" value=".$_SESSION['apellidos'].">
		<input type=\"hidden\" name=\"address1\" value="">
		<input type=\"hidden\" name=\"city\" value="">
		<input type=\"hidden\" name=\"zip\" value="">
		<input type=\"hidden\" name=\"lc\" value=\"es\">
		
		<input type=\"hidden\" name=\"country\" value=\"ES\">
		<input type=\"image\" src=\"imagenes/buy-logo-large-es.png\" style='float: right; display:none' id=\"submitpaypal\" name=\"submitpaypal\" alt=\"Pagos con PayPal: Rápido, gratis y seguro\">
		
	</form>";
  
}
}

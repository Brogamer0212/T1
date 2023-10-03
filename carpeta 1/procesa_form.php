<?php 
$nombre = $_POST["nombre"];
$fabricante = $_POST["fabricante"];
$costo = $_POST["costo"];

$aumento = $costo * 80/100;
$preciofinal = $costo + $aumento;

echo "<br>","Nombre: ",$nombre;
echo "<br>","Fabricante: ",$fabricante;
echo "<br>","Costo: ",$costo;
echo "<br>","Precio De Venta: ",$preciofinal;

include "productos_conectar.php";

$sql = "INSERT INTO tabla_productos VALUES(NULL, '$nombre', '$fabricante', '$costo', '$preciofinal')";
$ejecutar = mysqli_query($conectar, $sql);

if (!$ejecutar) {
    echo "Hubo algún error";
} else {
    echo "<center>Los datos se han guardado correctamente</center>";
    echo '<center><a href="Form_productos.html"><button>Volver Al Inicio
    .</button></a></center>';
}
?>
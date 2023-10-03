<?php 
//datos de la base de datos
$servidor_db='localhost';
$usuario_bd='root';
$pass_bd='';
$base_bd='productos';

//conectamos con el servidor y la base de datos
$conectar = mysqli_connect($servidor_db,$usuario_bd,$pass_bd,$base_bd);
//Verificamos la conexión
if(!$conectar){
	echo "<br>";
	echo "No se pudo conectar con la base de datos";

}else{
echo "<br>";
echo "Conectado a la base de datos";
}
 ?>

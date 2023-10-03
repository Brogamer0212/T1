<?php
include "productos_conectar.php";


$nombreFiltro = "";
$fabricanteFiltro = "";
$precioVentaFiltro = "";


if ($_SERVER["REQUEST_METHOD"] == "POST")     
    $nombreFiltro = $_POST["nombre"];
    $fabricanteFiltro = $_POST["fabricante"];
    $precioVentaFiltro = $_POST["precio_venta"];


$sql = "SELECT * FROM tabla_productos where 1";


if (!empty($nombreFiltro)) {
    $sql .= " AND nombre LIKE '%$nombreFiltro%'";
}
if (!empty($fabricanteFiltro)) {
    $sql .= " AND fabricante LIKE '%$fabricanteFiltro%'";
}
if (!empty($precioVentaFiltro)) {
    $sql .= " AND precio_de_venta <= $precioVentaFiltro";
}

$result = mysqli_query($conectar, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Filtrar Productos</title>
    <link rel="stylesheet" type="text/css" href="mdatos.css">
</head>
<body>
    <div>
    <a href="Form_productos.html"><button>Ingresar</button></a>
    <a href="Mostrar_datos.php"><button>Lista Productos</button></a>
    </div>
<form method="post" action="#">
    <div>
        <label >Filtrar por Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $nombreFiltro; ?>" placeholder="Nombre...">


        <label>Filtrar por Fabricante:</label>
        <input type="text" id="fabricante" name="fabricante" value="<?php echo $fabricanteFiltro; ?>" placeholder="Fabricante...">


        <label>Filtrar por Precio de Venta:</label>
        <input type="number" id="precio_venta" name="precio_venta" value="<?php echo $precioVentaFiltro; ?>" placeholder="Precio de Venta...">


        <input type="submit" value="Filtrar">
    </div>
</form>

<table border="1">
    <thead>
        <tr>
            <td>ID</td>
            <td>NOMBRE</td>
            <td>FABRICANTE</td>
            <td>COSTO</td>
            <td>PRECIO DE VENTA</td>
        </tr>
    </thead>
    <?php
    while ($mostrar = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?php echo $mostrar['0'] ?></td>
            <td><?php echo $mostrar['1'] ?></td>
            <td><?php echo $mostrar['2'] ?></td>
            <td><?php echo $mostrar['3'] ?></td>
            <td><?php echo $mostrar['4'] ?></td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>

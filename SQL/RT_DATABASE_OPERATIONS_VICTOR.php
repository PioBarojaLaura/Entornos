<html>
<head>
<title>Ejemplo bases de datos</title>
</head>
<body>

<form method="POST" action="">
    <input type="submit" name="Modificar" value="Modificar">
    <input type="submit" name="Crear" value="Crear">
    <input type="submit" name="Cargar" value="Cargar">
    <input type="submit" name="Registrar" value="Registrar">
    <input type="submit" name="Borrar" value="Borrar">
</form>

<?php
/* Conectar a la BD y luego ya actuo siempre sobre la variable conexion*/
	$conexion = mysqli_connect("localhost","root","","ropa");
	
/* Para seleccionar la bd*/	
	mysqli_select_db($conexion,"ropa") or die ("No se puede seleccionar la BD");
	
/* Lazo la consulta sobre la BD*/	
	$resultado = mysqli_query($conexion, "select * from calzado");
	
/* para detectar errores*/
	if (mysqli_connect_errno()) {
	    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
	    exit();
	}

/* Devuelve el número de filas del resultado */
	$numr = mysqli_num_rows($resultado);
    if (isset ($_POST["Cargar"])) {
        $resultado_cargar_CAMISETA = mysqli_query($conexion, "select * from camiseta");
    
?>
<h1>MOSTRAR CAMISETAS</h1>
	<table style="border:1px solid black">
		<tr>
			<td>
				id
			</td>
			<td>
				talla
			</td>
			<td>
				precio
			</td>
			<td>
				marca
			</td>
			<td>
				color
			</td>
		</tr>
		<?php
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					echo "<tr>";
/* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/					
					$fila = mysqli_fetch_array($resultado_cargar_CAMISETA,MYSQLI_ASSOC);

/* Para concatenar string utilzo el .*/					
					echo "<td>".$fila["id"]."</td>";
					echo "<td>".$fila["talla"]."</td>";
					echo "<td>".$fila["precio"]."</td>";
					echo "<td>".$fila["marca"]."</td>";
					echo "<td>".$fila["color"]."</td>";
					echo "</tr>";
				}
			}
        }
		?>

	</table>



















    <?php
    /* Devuelve el número de filas del resultado */
	$numr = mysqli_num_rows($resultado);
    if (isset ($_POST["Modificar"])) {
        $resultado_cargar_ZAPATILLA = mysqli_query($conexion, "select * from calzado");
    
?>
<h1>MODIFICAR ZAPATILLAS</h1>
	<table style="border:1px solid black">
		<tr>
			<td>
				id
			</td>
			<td>
				talla
			</td>
			<td>
				precio
			</td>
			<td>
				marca
			</td>
			<td>
				color
			</td>
		</tr>
		<?php
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					echo "<tr>";
/* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/					
					$fila = mysqli_fetch_array($resultado_cargar_ZAPATILLA,MYSQLI_ASSOC);

/* Para concatenar string utilzo el .*/					
					echo "<td>".$fila["id"]."</td>";
					echo "<td>".$fila["talla"]."</td>";
					echo "<td>".$fila["precio"]."</td>";
					echo "<td>".$fila["marca"]."</td>";
					echo "<td>".$fila["color"]."</td>";
					echo "</tr>";
				}
			}
        }
		?>

	</table>


































    <?php
    /* Devuelve el número de filas del resultado */
	$numr = mysqli_num_rows($resultado);
    if (isset ($_POST["Crear"])) {
        $resultado_cargar_PANTALON = mysqli_query($conexion, "select * from pantalon");
    
?>
<h1>CREAR PANTALONES</h1>
	<table style="border:1px solid black">
		<tr>
			<td>
				id
			</td>
			<td>
				talla
			</td>
			<td>
				precio
			</td>
			<td>
				marca
			</td>
			<td>
				color
			</td>
		</tr>
		<?php
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					echo "<tr>";
/* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/					
					$fila = mysqli_fetch_array($resultado_cargar_PANTALON,MYSQLI_ASSOC);

/* Para concatenar string utilzo el .*/					
					echo "<td>".$fila["id"]."</td>";
					echo "<td>".$fila["talla"]."</td>";
					echo "<td>".$fila["precio"]."</td>";
					echo "<td>".$fila["marca"]."</td>";
					echo "<td>".$fila["color"]."</td>";
					echo "</tr>";
				}
			}
        }
		?>

	</table>
























    








    <?php
    /* Devuelve el número de filas del resultado */
	$numr = mysqli_num_rows($resultado);
    if (isset ($_POST["Crear"])) {
        $resultado_cargar_REGISTRO = mysqli_query($conexion, "select * from llevar");
    
?>
<h1>CREAR REGISTRO</h1>
	<table style="border:1px solid black">
		<tr>
			<td>
				id
			</td>
			<td>
				talla
			</td>
			<td>
				precio
			</td>
			<td>
				marca
			</td>
			<td>
				color
			</td>
		</tr>
		<?php
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					echo "<tr>";
/* El resultado es realmente una matriz y voy cogiendo por filas con esa función*/					
					$fila = mysqli_fetch_array($resultado_cargar_REGISTRO,MYSQLI_ASSOC);

/* Para concatenar string utilzo el .*/					
					echo "<td>".$fila["id"]."</td>";
					echo "<td>".$fila["talla"]."</td>";
					echo "<td>".$fila["precio"]."</td>";
					echo "<td>".$fila["marca"]."</td>";
					echo "<td>".$fila["color"]."</td>";
					echo "</tr>";
				}
			}
        }
		?>

	</table>















	



	
</body>
</html>
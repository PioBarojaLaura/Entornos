<html>
<head>
<title>Ejemplo bases de datos</title>
</head>
<body>
<?php


if (!isset ($_POST["Cargar"]) && !isset ($_POST["Crear"]) &&
!isset ($_POST["Modificar"]) && !isset ($_POST["Registrar"]) 
&& !isset ($_POST["Borrar"]) && !isset ($_POST["Modificado"])) {
   # code...

?>
<form method="POST" action="">
    <input type="submit" name="Modificar" value="Modificar">
    <input type="submit" name="Crear" value="Crear">
    <input type="submit" name="Cargar" value="Cargar">
    <input type="submit" name="Registrar" value="Registrar">
    <input type="submit" name="Borrar" value="Borrar">
</form>
<?php
}?>
<?php

	$conexion = mysqli_connect("localhost","root","","ropa");
	

	mysqli_select_db($conexion,"ropa") or die ("No se puede seleccionar la BD");
	

	$resultado = mysqli_query($conexion, "select * from calzado");
	

	if (mysqli_connect_errno()) {
	    printf("<p>Conexión fallida: %s</p>", mysqli_connect_error());
	    exit();
	}

















    if (isset ($_POST["Cargar"])) {
        $resultado_cargar_CAMISETA = mysqli_query($conexion, "select * from camiseta");
		$numr = mysqli_num_rows($resultado_cargar_CAMISETA);
    
?>
<h1>CARGAR CAMISETAS</h1>
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
				
					$fila = mysqli_fetch_array($resultado_cargar_CAMISETA,MYSQLI_ASSOC);

			
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
    
	

    if (isset ($_POST["Modificar"])) {
        $resultado_cargar_ZAPATILLA = mysqli_query($conexion, "select * from calzado");
		$numr = mysqli_num_rows($resultado_cargar_ZAPATILLA);
    
?>
<h1>MODIFICAR ZAPATILLAS</h1>


<form method="post" action="">
<input type="submit" name="Modificado" value="Modificado">
    <input type="text" name="id" placeholder="id" required>
    <input type="text" name="talla" placeholder="talla" required>
    <input type="text" name="precio" placeholder="precio" required>
    <input type="text" name="marca" placeholder="marca" required>
	<input type="text" name="color" placeholder="color" required>
</form>


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
				
					$fila = mysqli_fetch_array($resultado_cargar_ZAPATILLA,MYSQLI_ASSOC);

				
					echo "<td>".$fila["id"]."</td>";
					echo "<td>".$fila["talla"]."</td>";
					echo "<td>".$fila["precio"]."</td>";
					echo "<td>".$fila["marca"]."</td>";
					echo "<td>".$fila["color"]."</td>";
					echo "</tr>";
				}
				if (isset ($_POST["Modificado"])) {
					$sql = "UPDATE calzado SET talla = ?, precio = ?, marca = ?, color = ? WHERE id = ?";

				}
			}
        }
		?>

	</table>


































    <?php
  
	

    if (isset ($_POST["Crear"])) {
        $resultado_cargar_PANTALON = mysqli_query($conexion, "select * from pantalon");
		$numr = mysqli_num_rows($resultado_cargar_PANTALON);
    
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
				
					$fila = mysqli_fetch_array($resultado_cargar_PANTALON,MYSQLI_ASSOC);
				
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
	

    if (isset ($_POST["Registrar"])) {
        $resultado_cargar_REGISTRO = mysqli_query($conexion, "select * from llevar");
		$numr = mysqli_num_rows($resultado_cargar_REGISTRO);
    
?>
<h1>CREAR REGISTRO</h1>
	<table style="border:1px solid black">
		<tr>
			<td>
				persona
			</td>
			<td>
				pantalon
			</td>
			<td>
				camiseta
			</td>
			<td>
				calzado
			</td>
		</tr>
		<?php
			if($numr > 0){
				for ($i = 0; $i < $numr; $i++){
					echo "<tr>";				
					$fila = mysqli_fetch_array($resultado_cargar_REGISTRO,MYSQLI_ASSOC);

					
					echo "<td>".$fila["pers"]."</td>";
					echo "<td>".$fila["pantalon"]."</td>";
					echo "<td>".$fila["camiseta"]."</td>";
					echo "<td>".$fila["calzado"]."</td>";
					echo "</tr>";
				}
			}
        }
		?>

	</table>









































	



	
</body>
</html>
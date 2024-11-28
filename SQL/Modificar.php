<html>
<head>
<title>Ejemplo bases de datos</title>
</head>
<body>



<?php

	$conexion = mysqli_connect("localhost","root","","ropa");
	

	mysqli_select_db($conexion,"ropa") or die ("No se puede seleccionar la BD");
	

	$resultado = mysqli_query($conexion, "select * from calzado");
	
?>
<?php
    
	

    //if (isset ($_POST["Modificar"])) {
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
                    $talla = $_POST["talla"];
                    $precio = $_POST["precio"];
                    $marca = $_POST["marca"];
                    $color = $_POST["color"];
                    $id = $_POST["id"];

					$sql = "UPDATE calzado SET talla = $talla,
                     precio = $precio, marca = $marca, 
                     color = $color WHERE id = $id";
                    $ZAPATILLA_UPDATE = mysqli_query($conexion, $sql);
				}
			}
       // }
		?>

	</table>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wuealvcome</title>
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
// Verifica cuál botón fue presionado y redirige a la página correspondiente
if (isset($_POST['Modificar'])) {
    header("Location: Modificar.php"); // Redirige a la página modificar.php
    exit;
} elseif (isset($_POST['Crear'])) {
    header("Location: crear.php"); // Redirige a la página crear.php
    exit;
} elseif (isset($_POST['Cargar'])) {
    header("Location: cargar.php"); // Redirige a la página cargar.php
    exit;
} elseif (isset($_POST['Registrar'])) {
    header("Location: registrar.php"); // Redirige a la página registrar.php
    exit;
} elseif (isset($_POST['Borrar'])) {
    header("Location: borrar.php"); // Redirige a la página borrar.php
    exit;
}
?>

</body>
</html>
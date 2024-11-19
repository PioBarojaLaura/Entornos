<?php
session_start();
if (!isset($_COOKIE['lastlogin'])) {
    header("Location: index.php");
}

// Vaciar el carrito
unset($_SESSION['cart']);

// Redirigir de vuelta a cart.php
header("Location: cart.php");
?>

<?php
session_start();
if (!isset($_COOKIE['lastlogin'])) {
    header("Location: index.php");
};

// Confirmación del pedido
echo "<h2>Thank you, " . $_SESSION['username'] . "! Your order has been submitted.</h2>";

// Vaciar el carrito después del pedido
unset($_SESSION['cart']);

echo '<a href="products.php">Back to Products</a>';
?>

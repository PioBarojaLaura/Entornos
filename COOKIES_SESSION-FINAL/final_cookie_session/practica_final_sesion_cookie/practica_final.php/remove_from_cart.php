<?php
session_start();
//Verify if the session is defined, if not it redirects to the index page.
if (!isset($_COOKIE['lastlogin'])) {
    header("Location: index.php");
}

/**
 * This line gets the product id sended from the form 
 * with the POST method.
 */
$product_id = $_POST['product_id'];
//This condition verify if the id exists.
if (isset($_SESSION['cart'][$product_id])) {
    unset($_SESSION['cart'][$product_id]);
}

header("Location: cart.php");
?>

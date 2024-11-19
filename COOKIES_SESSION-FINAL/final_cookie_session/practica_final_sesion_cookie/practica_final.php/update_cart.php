<?php
//This code manage the changes in the amount of products of the chart.

//Resume the sesion.
session_start();


//This conditional verify if the user is saved on the sesion.
//If not it redirects to the index page.
if (!isset($_COOKIE['lastlogin'])) {
    header("Location: index.php");
}


//Get data from the form with post.

//This is the product identificator that the user wants to modify.
$product_id = $_POST['product_id'];

//This is the new amount that the user requires (int).
$new_quantity = (int)$_POST['quantity'];


//Update the cart

//This verify if the product_id exist on the cart.
if (isset($_SESSION['cart'][$product_id])) {
    //If the new queantity is more tha 0, the product amount is updated.
    if ($new_quantity > 0) {
        $_SESSION['cart'][$product_id]['quantity'] = $new_quantity;
        //If the amount is 0 or less, the product is deleted with unset().
    } else {
        unset($_SESSION['cart'][$product_id]);
    }
}
//This redirect to the cart.php.
header("Location: cart.php");

?>


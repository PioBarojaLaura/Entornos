<?php
//Resume the session.
session_start();
/*Checks if the sesion variable 'username' is defined.
If not, the user doesn´t start the session so it redirects to the maing page.*/
if (!isset($_COOKIE['lastlogin'])) {
    header("Location: index.php");
  
}

/*Verify if the cart is undefinied or empty, if it is empty,
an message appears indicating that the cart is emptyand provide a link
to redirect tho the products page.
 */
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    echo "<h2>Your cart is empty.</h2>";
    echo '<a href="products.php">Back to Products</a>';
} else {
    /*If theres products in the cart, the page shows a resume
     with the content of the cart and a link to continue shopping.*/
    echo "<h2>Cart Summary</h2>";
    echo '<a href="products.php">Continue Shopping</a><br><br>';


    //Initialize a variable to calculate the total of the cart.

    $total = 0;
/*This loops all the products that are on the cart, saved on the 
variable $_SESSION['cart'] 
Each product have a product_id and a asociative called $product that contains
details as 'name','price' and 'quantity'.
*/
    foreach ($_SESSION['cart'] as $product_id => $product) {
        $name = $product['name'];
        $price = $product['price'];
        $quantity = $product['quantity'];
        //This calculates the total for each product (price * cuantity).
        $subtotal = $price * $quantity;

  //Then it shows the information of the product on the page.
        echo "<p>Product: $name</p>";
        echo "<p>Price: $$price</p>";
        echo "<p>Subtotal: $$subtotal</p>";


        //This form allows the user update the amount of a product in the cart with the method post.
   //The form is sended to update cart.php to manage the cart update. 
        echo '<form method="POST" action="update_cart.php">';
        //Include the id in a number field to send it to the server whitout the user seeing it.
        echo '<input type="number" readonly="readonly" name="product_id" value="' . $product_id . '">';
        echo '<label>Quantity:</label>';
        //Shows a numeric field where the user can adjust the amount of the product.
        echo '<input type="number" name="quantity" value="' . $quantity . '" min="1">';
        echo '<input type="submit" value="Update Quantity">';
        echo '</form>';


        //This form allows the user delete products from the cart.
        //Its sended to remove_from_cart.php to manage the remove updates.
        echo '<form method="POST" action="remove_from_cart.php">';
        //The id of the product its also number.
        echo '<input type="number" readonly="readonly" name="product_id" value="' . $product_id . '">';
        echo '<input type="submit" readonly="readonly" value="Remove Product">';
        echo '</form>';
        


//Show the total and options for continue shopping or sumbit order.
        echo "<hr>";
        //This adds the subtotal of each product to the total of the cart.
        $total += $subtotal;
    //This shows the shipping total.
    echo "<h3>Total: $$total</h3>";
    //This submits the order
    echo '<form method="POST" action="submit_order.php">';
    echo '<input type="submit" value="Submit Order">';
    echo '</form>';
//This clear the cart sending a request to clear_cart.php.
    echo '<form method="POST" action="clear_cart.php">';
    echo '<input type="submit" value="Clear Cart">';
    echo '</form>';
}
}
?>


<?php

/*Check if the session already has started.
If not, the code brings back to the index page. */
session_start();
if (!isset($_COOKIE['lastlogin'])) {
    header("Location: index.php");
}

//Create an asociative array of valid products.

$products = [
    "Shoes" => [["id" => 1, "name" => "Nike", "price" => 175], ["id" => 2, "name" => "NewBalance", "price" => 200]],
    "T-Shirts" => [["id" => 3, "name" => "Volcom", "price" => 30], ["id" => 4, "name" => "Element", "price" => 25]],
    "Hoodies" => [["id" => 5, "name" => "Palace", "price" => 120], ["id" => 6, "name" => "Damage", "price" => 150]],
    "Pants" => [["id" => 7, "name" => "Dickies", "price" => 180], ["id" => 8, "name" => "Carhartt", "price" => 250]]
];
/*
// Si la cookie 'add_favorites' no existe, inicializarla como un array vacío en formato JSON
if (!isset($_COOKIE['add_favorites'])) {
    setcookie('add_favorites', json_encode([]), time() + 2 * 24 * 60 * 60, "/"); // Cookie válida por 2 días
} else {
    // Decodificar los datos de la cookie para obtener el array de favoritos
    $favorites = json_decode($_COOKIE['add_favorites'], true);
}

if (isset($_POST['add_favorite'])) {
    $favorite = $_POST['add_favorite'];

    // Comprobar si el favorito ya está en el array
    if (!in_array($favorite, $favorites)) {
        // Agregar el nuevo favorito al array
        $favorites[] = $favorite;
        
        // Guardar el array actualizado en la cookie (convertido a JSON)
        setcookie('add_favorites', json_encode($favorites), time() + 2 * 24 * 60 * 60, "/");
    }
}
*/
// Gestionar los favoritos usando cookies




if (isset($_POST['add_favorite'])) {
    $favorite = (int)$_POST['add_favorite']; // Obtener el ID del producto a añadir a favoritos

    // Obtener identificador único para el usuario
    $userIdentifier = $_COOKIE['lastlogin'] ?? $_SESSION['username'] ?? 'guest';
    $cookieName = 'FAVORITE_COOKIE_' . $userIdentifier;

    // Obtener la lista de favoritos actual desde la cookie (si existe)
    $favorites = isset($_COOKIE[$cookieName]) ? json_decode($_COOKIE[$cookieName], true) : [];

    // Verificar si el favorito ya está en la lista
    if (!in_array($favorite, $favorites)) {
        // Si no está, agregarlo a la lista de favoritos
        $favorites[] = $favorite;

        // Guardar los favoritos actualizados en la cookie
        setcookie($cookieName, json_encode($favorites), time() + 2 * 24 * 60 * 60, "/"); // 2 días de duración

        // Asegurar que los cambios se reflejan en el script actual
        $_COOKIE[$cookieName] = json_encode($favorites);
    }
}








/*
if (isset($_COOKIE['add_favorites'])) {
    $favorites = json_decode($_COOKIE['add_favorites'], true); // Decodificar la cookie JSON
} else {
    $favorites = []; // Inicializar favoritos como un array vacío si no existe la cookie
}

// Si se agrega un favorito
if (isset($_POST['add_favorite'])) {
    $favorite = (int)$_POST['add_favorite']; // Obtener el ID del producto a añadir a favoritos

    // Verificar si el favorito ya está en la lista
    if (!in_array($favorite, $favorites)) {
        // Si no está, agregarlo a la lista de favoritos
        $favorites[] = $favorite;
        //Para que no sobreescriba los favoritos
        $cookieName = 'FAVORITE_COOKIE_' . ($_COOKIE['lastlogin'] ?? $_SESSION['username']);
        //$favorites = isset($_COOKIE['FAVORITE_COOKIE_'] . $_COOKIE['lastlogin']) ? explode(',', $_COOKIE['FAVORITE_COOKIE_'] . $_COOKIE['lastlogin']) : [];
        $favorites = isset($cookieName) ? explode(',', $_COOKIE[$cookieName]) : [];
        // Guardar los favoritos actualizados en la cookie
        setcookie('FAVORITE_COOKIE_'. $_COOKIE['lastlogin'], json_encode($favorites), time() + 2 * 24 * 60 * 60, "/"); // 2 días de duración
    }

    // Redirigir después de añadir a favoritos para evitar el reenvío de formulario
    header('Location: products.php');
    exit;
}
*/
//********************************************************************************************************************************************************************************* */

//Add diferent products to the cart.

if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = (int) $_POST['quantity'];
//If there´s no session cart, the program creates an cart array.
        if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
//Find the products in the list to add its details to the cart
//The fisrt foreach go over the $products array 
//The key $category will represent the category of the products.
foreach ($products as $category => $items) {
    //$items will be the array withe the products inside a category.
    foreach ($items as $item) {
        if ($item['id'] == $product_id) {
            // If the product is already in the cart, we accumulate the quantity

            if (isset($_SESSION['cart'][$product_id])) {
                $_SESSION['cart'][$product_id]['quantity'] += $quantity;
            } else {
                // If it is not there, we add it with its quantity

                $_SESSION['cart'][$product_id] = [
                    "name" => $item['name'],
                    "price" => $item['price'],
                    "quantity" => $quantity
                ];
            }
            break 2; // We exit the loop once we find and add the product
        }
    }
}

}
//Line to check if the sessio has started.

?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>
<!--This shows the username of the current session.-->
    <h2>Welcome, <?php echo $_COOKIE['lastlogin']; ?></h2>
<!--Those are links to navigate the diferent windows-->
    <a href="cart.php">Check cart</a> | <a href="favorites.php">Check favourites</a> | <a href="logout.php">Logout</a>

    <h2>Products</h2>

    <?php 
    /*
    The first foreach loops the $products array that contains caregories of products.
    The key $category is the name of the category and $items is an array of products inside that category.
    */
    foreach ($products as $category => $items): ?>
        <h3><?php //This shows the category name.
         echo $category; 
         ?></h3>
        <?php 
        /*
        This second foreach loops the products that are inside in each category.
        Each $item contains information about a one product.
        */
        foreach ($items as $item): 
        ?>
            <p>
                <?php 
                /**
                 * This shows the product name and its price.
                 */
                echo $item['name']; ?> - $<?php echo $item['price']; ?>
            </p>

            <!-- Form to add products to favourites with the POST method. -->
            <form method="POST" action="products.php">
                <input type="number" name="add_favorite" readonly="readonly"  value="<?php echo $item['id']; ?>">
                <input type="submit" value="Add to favourites">
            </form>

            <!-- Form to add products to the cart with the POST method.  -->
            <form method="POST" action="products.php">
                <input type="number" name="product_id" readonly="readonly" value="<?php echo $item['id']; ?>">
                <label>Cantidad:</label>
                <input type="number" name="quantity" value="1" min="1">
                <input type="submit" name="add_to_cart" value="Add to cart">
            </form>
        <?php endforeach; ?>
    <?php endforeach; ?>

    
</body>
</html>

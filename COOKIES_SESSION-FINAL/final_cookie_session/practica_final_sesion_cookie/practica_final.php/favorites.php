<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_COOKIE['lastlogin'])) {
    header("Location: index.php");
    
}

// Lista de productos disponibles (mismo que en products.php)
$products = [
    "Shoes" => [["id" => 1, "name" => "Nike", "price" => 175], ["id" => 2, "name" => "NewBalance", "price" => 200]],
    "T-Shirts" => [["id" => 3, "name" => "Volcom", "price" => 30], ["id" => 4, "name" => "Element", "price" => 25]],
    "Hoodies" => [["id" => 5, "name" => "Palace", "price" => 120], ["id" => 6, "name" => "Damage", "price" => 150]],
    "Pants" => [["id" => 7, "name" => "Dickies", "price" => 180], ["id" => 8, "name" => "Carhartt", "price" => 250]]
];

$favorites = [];
if (isset($_COOKIE['FAVORITE_COOKIE_'. $_COOKIE['lastlogin']])) {
    $favorites = json_decode($_COOKIE['FAVORITE_COOKIE_'. $_COOKIE['lastlogin']], true);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Favorites</title>
</head>
<body>
    <h2>Welcome, <?php echo $_COOKIE['lastlogin']; ?></h2>
    <a href="products.php">Check products</a> | <a href="cart.php">Check cart</a> | <a href="logout.php">Logout</a>

    <h2>Your Favorites</h2>

    <?php if (empty($favorites)): ?>
        <p>You have no products in your favorites.</p>
    <?php else: ?>
        <?php
        /*
        foreach ($favorites as $favorite) {
            echo htmlspecialchars_decode($favorite);
        };*/
        
        // Recorrer los productos favoritos
        foreach ($favorites as $product_id): 
            
            // Buscar el producto en la lista de productos
            foreach ($products as $category => $favorites_) {
                
                foreach ($favorites_ as $item) {
                    
                    if ($item['id'] == $product_id): 
                    //echo " hola mundo ";?>
                        <p><?php echo htmlspecialchars($item['name']); ?> - $<?php echo htmlspecialchars($item['price']); ?></p>
                    <?php endif;
                }
            }
        endforeach; ?>
    <?php endif; ?>

</body>
</html>

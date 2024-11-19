<?php


//Start the session.

session_start();

//Create an asociative array of valid users.

$users = [
    ["username" => "Jaime", "password" => "jgranja" ],
    ["username" => "Victor", "password" => "vmena" ],
    ["username" => "Judit", "password" => "jmata" ]
];

//User login.

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($users as $user) {
        if ($user['username'] === $username && $user['password'] === $password) {
            $_SESSION['username'] = $username;
            //cookie for 2 days
            setcookie('lastlogin', $username, time()+ 2 * 24 * 60 * 60);
            header("Location: products.php"); 
        }
    }
    $error = "Wrong user or password";
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST">
        <label>User:</label>
        <input type="text" name="username" required>
        <br>
        <label>Password:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Submit">
    </form>
    <?php if (isset($error)) echo "<p>$error</p>"; ?>
</body>
</html>
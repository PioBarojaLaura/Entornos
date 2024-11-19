

<?php
/*This code closes the user sesion and redirect to the index page (indx.php)*/
//Resume the session.
session_start();
//Delete all the sesion variables.
//session_unset();
//Destroy all the session variables and the user can not access.
//session_destroy();
/*Cookie expire, this line delete the cookie "lastLoggedInUser" replacing its value
with an empty string and establising time in the past,
 this make that the browser deletes the cookie. */
setcookie("lastlogin", "", time() - 3600);
/*This redirects the browser to the main page index.php */
header("Location: index.php");

?>

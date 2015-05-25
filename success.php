<?php 
session_start();
require_once("new_connection.php");
echo "howdy! " . " {$_SESSION['first_name']}" . "!";
echo "<a href='process.php'>Log off!</a>";
 ?>



<?php 
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

unset($_SESSION['authenticated']);
unset($_SESSION['auth_user']);

$_SESSION['status'] = "Logged out successfully!";
header('Location: login.php');
exit(0);

?>
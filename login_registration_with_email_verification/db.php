<?php  

$server = "localhost";
$username = "root";
$password = "";
$database = "ella";

$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Something went wrong;");
}
 

 ?>

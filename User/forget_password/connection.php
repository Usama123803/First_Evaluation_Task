
<?php
function dbConnection(){
$servername = "localhost";
$username = "root";
$password = "";
$db="ems";
// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
return $conn;
// Check connection
}
?>

<?php
$firstname =  $_REQUEST['firstname'];
$lastname =  $_REQUEST['lastname']; 
$email =  $_REQUEST['email'];

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";



if(!empty($firstname) && !empty($lastname) && !empty($email)){

// Create connection
$conn = mysqli_connect($servername, 'Anskhan', 'admin123','my_db');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
} 
$sql = "INSERT INTO user (firstname, lastname,email) VALUES ('John', 'Doe','hey');";
$result = $conn->query($sql);

if (mysqli_query($conn, $sql)) {  
  echo 'success';
} else {
  echo "error  : ".$sql . mysqli_error($conn);
}

mysqli_close($conn);

}else{
  echo 'error: invalid  values';
}
?>
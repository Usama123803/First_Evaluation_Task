<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "mydb";

// Create connection
$conn = mysqli_connect($servername, 'Abdullah', 'abd197966','mydb');
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  

$sql = "SELECT * FROM `user`";
$result = $conn->query($sql);

if (mysqli_query($conn, $sql)) {

  
  if (mysqli_num_rows($result) > 0) {
  // output data of each row
  $response = array();
  while($row = mysqli_fetch_assoc($result)) {
    array_push($response,$row);
  }
  echo json_encode($response);
} else {
  echo "0 results";
}
} else {

  echo "error  : ".$sql . mysqli_error($conn);
}

mysqli_close($conn);
?>




































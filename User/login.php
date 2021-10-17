<?php

//get database connection
include_once '../config/database.php';

//get user data
include_once  '../User/user.php';

$database = new Database();
$db=$database->get_connection();

// prepare user object
$user = new User($db);
// set ID property of the user to be edited
$user->username = isset($_GET['username']) ? $_GET['username'] : die();
$user->password = base64_encode(isset($_GET['password']) ? $_GET['password'] : die());
// read the details of user to be edited
$stmt = $user->login();
if($stmt->rowCount() > 0){
    // get retrieved row
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // create array
    $user_arr = array(
        "status"   => true,
        "message"  => "Successfully login",
        "id"       => $row['id'],
        "username" => $row['username']
    );
}
else{
    $user_arr = array(
        "status"  => false,
        "message" => "Invalid Username or Password!"
    );
}
// make it json format
print_r(json_encode($user_arr));

?>
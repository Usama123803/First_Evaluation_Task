<?php

//get database connection
include_once '../config/database.php';

//get user data
include_once  '../User/user.php';

$database = new Database();
$db=$database->get_connection();
$user = new User($db);

//set user property values
$user->name=$_POST['name'];
$user->email=$_POST['email'];
$user->password= base64_encode($_POST['password']);
$user->reg_date= date('Y-m-d H:i:s');

//create the user
if($user->signup()){
    $user_arr=array(
    "status" => http_response_code(),
    "message" => "Successfully Signup",
    "id name" => $user->name
    );
}
else{
    $user_arr = array(
        "status" =>http_response_code(),
        "message" => $user->name." Already exists!"
    );

    }
print_r(json_encode($user_arr));
?>
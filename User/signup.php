<?php

//get database connection
include_once '../config/database.php';

//get user data
include_once  '../User/user.php';

$database = new Database();
$db=$database->get_connection();
$user = new User($db);

//set user property values with validations
$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";  
if (empty($_POST["name"]) && (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) ){  
    $errMsg = "Error! You didn't enter the Name.";  
             echo $errMsg;  
} 

elseif (empty($_POST['email']) && !preg_match ($pattern,$_POST['email']) ){  
    $ErrMsg = "Email is not valid.";  
            echo $ErrMsg;  
}
 else {  
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
        "message" => $user->email." Already exists!"
        );
    }
    
print_r(json_encode($user_arr));
}  


?>

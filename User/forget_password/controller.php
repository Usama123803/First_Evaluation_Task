<?php 

class User {
    //for db connection
    function __construct() {
        require_once('model_db.php');
        
      }
    
 //Check email the email is exist or not
 //The password is reset
  function forgetPassword($email,$new_password)
  {
            $user_model=new userModel();
            $response=$user_model->existEmail($email);
            $newarray=array();
            if (!$response)
            {
                $newarray=["204",'Email Does Not Exist'];
                echo json_encode($newarray);
            }
            else
            {
                //The password will reset here.
                $response=$user_model->resetPassword($email,md5($new_password));
                if($response)
                {
                $newarray=["200","Password Update Successfully"];
                echo json_encode($newarray);
                }
                else
                {
                    //HTTP Protocol
                    echo json_encode("400");
                }
                
            }
            

  }
}
//isset is used the specific keyword used or not

$inputArr=['email','new_password'];
if (isset($_POST['email']) && isset($_POST['new_password']))
{
$email=$_POST['email'];
$new_password=$_POST['new_password'];
$user_class=new User();
$user_class->forgetPassword($email,$new_password);
}
else
{
    echo json_encode("All Fields  Required");
}

?>

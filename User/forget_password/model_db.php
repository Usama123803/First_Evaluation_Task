<?php
require_once('connection.php'); // iclude connection


class userModel
{
      // construct function
      function __construct() {
        global $conn;
        $conn=dbConnection();
      }
      // checking exist email
    function existEmail($email)
    { 

        global $conn;
        $sql = "SELECT * FROM user  WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            return true;
        }
        else
        {
            return false;
        }
        
      
    }
      // when checking the existing email it will reset the new password  
    function resetPassword($email,$new_password)
    {
        global $conn;
        $sql = "UPDATE user SET password='$new_password' WHERE email='$email'";
        $result = mysqli_query($conn,$sql);
        return $result;
    }
}
?>

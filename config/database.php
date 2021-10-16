<?php

class Database
{
    private $username = "Employee Managment System";
    private $host= "localhost";
    private $db_name = "EMS";
    private $password = "12345";
    public $conn;

    public function get_connection()
    {
            $this->conn = null;
            try{
                $this->conn = new PDO("mysql:host=" . $this->host . "; dbname=" . $this->db_name , $this->username, $this->password);
        // set the PDO error mode to exception
        $this->conn->exec("set names utf8");
        
            }
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
        }
        return $this->conn;
   }

}

?>
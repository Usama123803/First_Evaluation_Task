<?php

    class User{
        //Connection and Table name
        private $conn;
        private $table_name= "user";
        
        //Table properties
        public $id;
        public $name;
        public $email;
        public $password;
        public $reg_date ;

        //constructor as $db with database connection
        public function __construct($db)
        {
            $this->conn = $db;
        }

        //signup user
        function signup()
        {
            if($this->is_already_exists()){    
                return false;
            }
            $query = "INSERT INTO user SET
            name=:name,
            password=:password,
            email=:email";
            //prepare query
            $stmt = $this->conn->prepare($query);            
            //execute query
            if($stmt->execute()){
                
                return true;
            }
            return false;
        }

        public function is_already_exists()
        {

            $query = "SELECT * FROM user WHERE email='".$this->email."'";
            //prepare query  statment of sql
            $stmt = $this->conn->prepare($query);
            // execute query
            $stmt->execute();
            if($stmt->rowCount()>0){
                return true;
            }
            else{
                return false;
            }
        }
    }

?>

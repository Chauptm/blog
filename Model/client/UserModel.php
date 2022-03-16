<?php
    // require('../Database.php');
    class UserModel extend Database {
        protected $db;

        public function __contruct(){
            $this->db = new Database();
            $this->db->connect();
        }

        public function signup($username, $password, $fullname){
            $sql= "INSERT INTO user (username, password, fullname) VALUES ('$username', '$password', '$fullname')";
            mysqli_query($this->db->conn, $sql))
        }

        public function checkExists($username){
            $sql = "SELECT * FROM user WHERE username= '$username'";
            $resutl= mysqli_query($this->db->conn, $sql);
            return $resutl;
        }

        public function login($username, $password){
            $sql = "SELECT * FROM user WHERE username= '$username' AND password= '$password'";
            $resutl= mysqli_query($this->db->conn, $sql);

            return $resutl;
        }
    }
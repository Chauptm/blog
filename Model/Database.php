<?php
    class Database{
        private $server = 'localhost';
        private $username= 'root';
        private $password ='12345678';
        private $database = 'blog';
        private $conn= NULL;

        public function connect(){
            $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
            if (!$this->conn){
                die(mysqli_connect_error());
            }
            // else {
            //     echo 'ket noi thanh cong';
            // }
            $this->conn->set_charset("utf8");
        }

        public function closeConnect(){
            if ($this->conn){
                mysqli_close($this->conn);
            }
        }

    }
?>
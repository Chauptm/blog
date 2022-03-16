<?php
    class Database{
        private $server = 'localhost';
        private $username= 'root';
        private $password ='12345678';
        private $database = 'blog';

        private $conn= NULL;
        private $resutl= NULL;

        public function connect(){
            $this->conn = mysqli_connect($this->server, $this->username, $this->password, $this->database);
            if (!$this->conn){
                die(mysqli_connect_error());
            }
           else {
               mysqli_set_charset($this->conn, 'utf8');
            //    echo "ok";
           }
           return $this->conn;
        }

        public function execute($sql){
            $this->result= $this->conn->query($sql);
            return $this->result;
        }

        public function getData(){
            if ($this->result){
                $data= mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }

        public function findByID($id){
            $sql= "SELECT * FROM thanhvien WHERE id= '$id'";
            $this->execute($sql);
            if ($this->num_rows()!=0){
                $data= mysqli_fetch_array($this->result);
            }else{
                $data=0;
            }
            return $data;
        }

        public function num_rows(){
            if ($this->result){
                $num= mysqli_num_rows($this->result);
            }else{
                $num= 0;
            }
            return $num;
        }
        // Lay toan bo du lieu:
        public function getAllData($table){
            $sql= "SELECT * FROM $table";
            $this->execute($sql);
            if($this->num_rows()==0){
                $data =0;
            }else {
                while($datas= $this->getData()){
                    $data[]= $datas;
                }
            }
            return $data;
        }

        public function insertData($hoten, $namsinh, $quequan){
            $sql= "INSERT INTO thanhvien(hovaten, namsinh, quequan) VALUES ('$hoten','$namsinh','$quequan')";
            return $this->execute($sql);
        }

        public function updateData($id, $hoten, $namsinh, $quequan){
            $sql= "UPDATE thanhvien SET hovaten='$hoten', namsinh= '$namsinh', quequan= '$quequan' WHERE id= '$id'";
            return $this->execute($sql);
        }

        public function deleteData($id){
            $sql ="DELETE FROM thanhvien WHERE id= '$id'";
            return $this->execute($sql);
        }

        public function closeConnect(){
            if ($this->conn){
                mysqli_close($this->conn);
            }
        }

    }
?>
<?php
    class Header{
        public function __contructor(){
            require('../Model/client/UserModel.php');
            $userModel= new UserModel();
            $error = $this->singUp($userModel);
            $errorLogin= $this->login($userModel);
            require('../View/client/layouts/header.php');
        }

        public function singUp($userModel){
            $username= $password= $fullname= NULL;
            $error= array();
            $error['username']= $error['password']= $error['full_name']= $error['username_exist']=NULL;
            if (isset($_POST['signup'])){
                if (empty($_POST['username'])){
                    $error['username']= 'Thieu ten dang nhap';
                }else {
                    $username= $_POST['username'];
                }
                if (empty($_POST['password'])){
                    $error['password']= 'Thieu mat khau';
                }else {
                    $password = md5($_POST['password']);
                }
                if (empty($_POST['full_name'])){
                    $error['full_name']= 'Thieu ho va ten';
                }else {
                    $fullname= $_POST['full_name'];
                }

                if ($fullname && $password && $username){
                    $row= $userModel->checkExists($username);
                    if (mysqli_num_row($row)>0){
                        $error['username_exist']= 'Ten dang nhap bi trung';
                    }else {
                        $userModel->signup($username, $password, $fullname);
                        echo "<script>alert('dang ky thanh cong')</script>";
                    }
                }
            }
            return $error;
        }

        public function login($userModel){
            $username = $password = $fullName = NULL;
            $error = array();
            $error['username'] = $error['password'] = NULL;

            if (!empty($_POST['login'])) {
                if (empty($_POST['username'])) {
                    $error['username'] = 'Nhap ten dang nhap';
                } else {
                    $username = $_POST['username'];
                }
                if (empty($_POST['password'])) {
                    $error['password'] = 'Nhap mat khau';
                } else {
                    $password = md5($_POST['password']);
                }

                if ($username && $password) {
                    $result = $userModel->login($username, $password);
                    $check = mysqli_num_row($result);
            
                    if ($check>0) {
                        $data = mysqli_ftech_array($result, MYSQL_ASSOC);
                        $_SESSION['user'] = $data;
                        header('Location: ./');
                    } else {
                        echo "<script>alert('Sai mật khẩu hoặc tên đăng nhập')</script>";
                    }
                }
            }

            return $error;
        }
    }

    $header= new Header();
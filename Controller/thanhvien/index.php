<?php

    if (isset($_GET['action'])){
        $action= $_GET['action'];
    }else {
        $action= '';
    }

    switch($action){
        case 'add':
            if (isset($_POST['add_user'])){
                $hoten= $namsinh= $quequan=NULL;
                $error=array();
                $error['hoten']=$error['namsinh']=$error['quequan']=NULL;
                if (empty($_POST['hoten'])){
                    $error['hoten']="Ban chua nhap ho ten";
                }else {
                    $hoten= $_POST['hoten'];
                }
                if (empty($_POST['namsinh'])){
                    $error['namsinh']="Ban chua nhap nam sinh";
                }else {
                    $namsinh= $_POST['namsinh'];
                }
                if (empty($_POST['quequan'])){
                    $error['quequan']="Ban chua nhap que quan";
                }else {
                    $quequan= $_POST['quequan'];
                }
                if ($hoten && $quequan && $namsinh){
                    $db->insertData($hoten, $namsinh, $quequan);
                }

            }
            require_once('View/thanhvien/add.php');
            break;
        case 'edit':
            require_once('View/thanhvien/edit.php');
            break;
        case 'delete':
            require_once('View/thanhvien/delete.php');
            break;
        case 'list':
            $table= 'thanhvien';
            $db->getData($table);
            $data= $db->getAllData($table);
            require_once('View/thanhvien/list.php');
            break;       
        default:
            require_once('View/thanhvien/list.php');
            break;
    }

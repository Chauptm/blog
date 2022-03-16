<?php
    require('Model/Database.php');

    $db= new Database;
    $db->connect();

    require('Controller/client/header.php');
    // require('View/client/layouts/header.php');
    if (isset($_GET['controller'])){
        require('../../Route/admin/web.php');
    }else {
        require('View/client/pages/home.php');
    }

    require('View/client/layouts/footer.php');
    $db->closeConnect();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Them thanh vien moi</title>
</head>
<body>

    

    <div class= "content">
        <div class="dangkythanhvien">
            <a href="index.php?controller=thanh-vien&action=list" class="list">Danh sach</a>
            <h3>Them thanh vien moi</h3>
            <form action="" method="POST">
                <table>
                    <tr>
                        <td>Ten  thanh vien:</td>
                        <td><input type="text" name= "hoten" placeholder="Ten thanh vien"></td>
                    </tr>
                    <tr>
                        <td>Nam sinh:</td>
                        <td><input type="text" name= "namsinh" placeholder="Nam sinh"></td>
                    </tr>
                    <tr>
                        <td>Que quan:</td>
                        <td><input type="text" name= "quequan" placeholder="Que quan"></td>
                    </tr>
                    <tr>
                        <td cosplan="2" ><input type="submit" value="Them moi" name= "add_user"></td>
                    </tr>
                    
                </table>
            </form>
            <?php if (isset($error['hoten'])){ ?>
                <div class="alert-danger" role="alert">
                    <?php echo $error['hoten']?>
                </div>
            <?php } ?>

            <?php if (isset($error['namsinh'])){ ?>
                <div class="alert-danger" role="alert">
                    <?php echo $error['namsinh']?>
                </div>
            <?php } ?>

            <?php if (isset($error['quequan'])){ ?>
                <div class="alert-danger" role="alert">
                    <?php echo $error['quequan']?>
                </div>
            <?php } ?>
            </div>
        </div>

</body>
</html>
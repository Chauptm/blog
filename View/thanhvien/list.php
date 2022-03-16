<div class="timkiem">
    <form action="" method="get">
        <table>
            <tr>
                <input type="hidden" name="controller" value="thanh-vien">
                <td><input type="text" name="tukhoa" placeholder="Nhap tu khoa"></td>
                <td><input type="submit" value="Tim kiem"></td>
            </tr>
        </table>
        <input type="hidden" name="action" value="search">
    </form>
</div>

<div class= "danhsach">

    <h3>Danh sach thanh vien</h3>
    <table border="1px">
        <thead>
            <tr>
                <th>STT</th>
                <th>Ten thanh vien</th>
                <th>Nam sinh</th>
                <th>Que quan</th>
                <th>Hanh dong</th>
            </tr>
        </thead>
        <tbody>
            <?php $STT=1 ?>
            <?php foreach($data as $value){ ?>
            <tr>
                <td><?php echo $STT?></td>
                <td><?php echo $value['hovaten']?></td>
                <td><?php echo $value['namsinh']?></td>
                <td><?php echo $value['quequan']?></td>
                <td>
                    <a onclick="return confirm('Ban co muon sua khong?')" href="index.php?controller=thanh-vien&action=edit&id=<?php echo $value['id']?>">Edit</a>
                    <a onclick="return confirm('Ban co muon xoa khong?')" href="index.php?controller=thanh-vien&action=delete&id=<?php echo $value['id']?>">Del</a>
                </td>
            </tr>

            <?php $STT++; } ?>
            <tr>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>
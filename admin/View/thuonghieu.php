<div class="container">
    <h3 class="text-primary text-center my-3 fw-bold text-decoration-underline">Thương hiệu</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Menu</th>
                <th>Hình</th>
                <th>Đường dẫn</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $sp = new Product();
                $results = $sp->getListThuongHieu();
                while ($set=$results->fetch()):
            ?>
            <tr>
                <td><?php echo $set['id_thuonghieu'];?></td>
                <td><?php echo $set['ten_thuonghieu'];?></td>
                <td><img src="Content/img/<?php echo $set['hinh_thuonghieu'];?>" width="50%" alt=""></td>
                <td><?php echo $set['link_thuonghieu'];?></td>
                <td>
                    <a class="btn btn-danger" href="index.php?action=thuonghieu&act=update&id=<?php echo $set['id_thuonghieu']?>">Chỉnh sửa</a>
                    <a class="btn btn-warning" href="index.php?action=thuonghieu&act=delete&id=<?php echo $set['id_thuonghieu']?>">Xóa</a>
                </td>
            </tr>
            <?php 
            endwhile;
            ?>
        </tbody>
    </table>
</div>
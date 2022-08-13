<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên người dùng</th>
            <th>Số điện thoại</th>
            <th>Email</th>
            <th>Địa chỉ</th>
            <th>Mật khẩu</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $us = new User();
            $result = $us->getListUsers();
            while($set = $result->fetch()):
        ?>
        <tr>
            <td><?php echo $set['user_id']; ?></td>
            <td><?php echo $set['user_name']; ?></td>
            <td><?php echo $set['user_address']; ?></td>
            <td><?php echo $set['user_number']; ?></td>
            <td><?php echo $set['user_email']; ?></td>
            <td><?php echo $set['user_password']; ?></td>
            <td>
                <a class="btn btn-danger" href="index.php?action=user&act=delete&id=<?php echo $set['user_id'];?>">Xóa</a>
            </td>

        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
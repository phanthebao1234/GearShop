<div class="container">
    <h3 class="text-primary text-center my-3 fw-bold text-decoration-underline">Menu Sản Phẩm</h3>
    <a href="index.php?action=loai&act=insert" >Thêm Menu</a>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=loai&act=insertmenu_action" method="POST">
                    
                        <div class="mb-3">
                            <label for="menu_name" class="form-label">Tên Menu</label>
                            <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="link" class="form-label">Đường dẫn</label>
                            <input type="text" class="form-control" name="link" id="link" placeholder="">
                        </div>
                        <div class="mb-3">
                            <button type="submit">Thêm Menu</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Menu</th>
                <th>Đường dẫn</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sp = new Product();
            $results = $sp->getListMenu();
            while ($set = $results->fetch()) :
            ?>
                <tr>
                    <td><?php echo $set['id_menu']; ?></td>
                    <td><?php echo $set['menu_name']; ?></td>
                    <td><?php echo $set['link']; ?></td>
                    <td>
                        <a class="btn btn-danger" href="index.php?action=loai&act=update&id=<?php echo $set['id_menu'] ?>">Chỉnh sửa</a>
                        <a class="btn btn-warning" href="index.php?action=loai&act=deletemenu&id=<?php echo $set['id_menu'] ?>">Xóa</a>
                    </td>
                </tr>
            <?php
            endwhile;
            ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
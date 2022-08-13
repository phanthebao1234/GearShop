<?php
include 'View/header_product.php';
?>
<div class="container">
    <div class="row" style="background-color: #fff; border-radius: 10px; margin-top: 10px;">
        <div class="col-lg-8">
            <h3 class="fw-bold">Xin chào,</h3>
            <p><a href="index.php?action=registration" class="text-primary text-decoration-underline">Đăng kí</a> hoặc Đăng nhập</p>
            <form action="index.php?action=login&act=login_action" method="POST">
                <div class="mb-3">
                    <label for="user_number" class="form-label">Nhập số điện thoại</label>
                    <input type="number" class="form-control" id="user_number" name="user_number" placeholder="">
                    <label for="user_password" class="form-label">Nhập mật khẩu</label>
                    <input type="text" class="form-control" id="user_password" name="user_password" placeholder="">
                </div>
                <button type="submit" class="btn btn-danger btn-lg">Đăng nhập</button>
        </div>
        </form>
        <div class="col-lg-4">
            <img src="Content/images/gbot-form-account.png" alt="" style="width: 75%;">
        </div>
    </div>
</div>
</div>
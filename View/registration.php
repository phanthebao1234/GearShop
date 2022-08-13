<?php 
include 'View/header_product.php';
?>
<div class="container">
    <div class="row " style="background-color: #fff; border-radius: 10px; margin-top: 10px;">
        <div class="col-sm-8 ms-5">
            <h3 class="fw-bold">Xin chào,</h3>
            <p><a href="index.php?action=login" class="text-primary text-decoration-underline" >Đăng nhập</a> hoặc Tạo tài khoản</p>
            <form action="index.php?action=registration&act=registration_action" method="POST">
                <div class="mb-3">
                    <label for="user_name" class="form-label">Nhập họ tên</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="" required>
                   
                </div>
                <div class="mb-3">
                    <label for="user_number" class="form-label">Nhập số điện thoại</label>
                    <input type="number" class="form-control" id="user_number" name="user_number" placeholder="" required>
                    
                </div>
                <div class="mb-3">
                    <label for="user_email" class="form-label">Nhập email</label>
                    <input type="email" class="form-control" id="user_email" name="user_email" placeholder="" required>
                    
                </div>
                <div class="mb-3">
                    <label for="user_address" class="form-label">Nhập địa chỉ</label>
                    <input type="text" class="form-control" id="user_address" name="user_address" placeholder="" required>
                </div>
                <div class="mb-3">
                    <label for="user_password" class="form-label">Nhập mật khẩu</label>
                    <input type="text" class="form-control" id="user_password" name="user_password" placeholder="" required>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn btn-danger">Đăng kí</button> 
                </div>
                
            </form>
        </div>
        <div class="col-sm-3">
            <img src="Content/images/gbot-form-account.png" alt="" style="width: 100%;">
        </div>
    </div>
</div>
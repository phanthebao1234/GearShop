<?php
    $action = 'registration';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }
    switch ($action) {
        case 'registration':
            include 'View/registration.php';
            break;
        case 'registration_action':
            if($_SERVER['REQUEST_METHOD']=='POST')// if(isset($_POST['submit']))
            {
                // do mã khách hàng cho tự tăng thì ko cần phải nhập vào
                $user_name=$_POST['user_name'];//$ten=an thịnh
                $user_number=$_POST['user_number'];//$username=anthinh
                $user_email=$_POST['user_email'];//$password=123456
                $user_address=$_POST['user_address'];//$diachi=hcm
                $user_password=$_POST['user_password'];
                $crypt=md5($user_password);
                $ur=new User();
                $ur->InsertUser($user_name,$user_number,$user_email,$crypt,$user_address);
                // $ur->InserUser(an thịnh, anthinh,đã đc mã,an@gmail.com,hcm,123456)
                echo '<script> alert("Đăng ký thành công");</script>';
            }
            // sau khi chèn thành công thì muốn load về trang nào là tùy
            include 'View/home.php';
            break;
                    
    }

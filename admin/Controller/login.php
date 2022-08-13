<?php
    $action = 'login';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }
    switch ($action) {
        case 'login':
            include 'View/login.php';
            break;
        case 'login_action':
            if ($_SERVER["REQUEST_METHOD"]== "POST") {
                $adminname = $_POST["adminname"];
                $password = $_POST["password"];
            }
            $user = new Admin();
            $login = $user->login($adminname, $password);    
            if($login) {
                $_SESSION['id'] = $login['id'];
                $_SESSION['adminname'] = $login['adminname'];
                $_SESSION['password'] = $login['password'];
                echo '<script> alert("Đăng nhập thành công");</script>';
                // thẻ meta load lại trang trong thời gian 0 giây
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
            }
            else {
                echo "<script language='javascript'>";
                echo "alert('WRONG INFORMATION')";
                echo "</script>";
                include "View/login.php";
            }
            break;
        case "logout":
            if(isset($_SESSION['adminname'])&&isset($_SESSION['id']))
            {
                // cách 2
                session_destroy();
            }
            echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
            break;
        

    }
?>
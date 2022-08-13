<?php
    $action = 'user';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'user':
            include 'View/user.php';
            break;
        case 'delete':
            if (isset($_GET['id'])) {
                $user_id = $_GET['id'];
                $us = new User();
                $us->deleteUser($user_id);
                echo '<script>alert("Xóa người dùng thành công")</script>';
            }
            include 'View/user.php';
            break;
        default:
            # code...
            break;
    }
?>
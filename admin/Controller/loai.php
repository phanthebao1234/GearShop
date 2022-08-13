<?php
    $action = 'loai';
    if (isset($_GET['act'])) {
        $action = $_GET['act'];
    }

    switch ($action) {
        case 'loai':
            include 'View/menu.php';
            break;
        case 'thuonghieu':
            include 'View/thuonghieu.php';
            break;
        case 'insert':
            include 'View/addmenu.php';
            break;
        case 'insertmenu_action':
            if (isset($_POST['submit'])) {
                $menu_name=$_POST['menu_name'];
                $link=$_POST['link'];
            }
            $sp = new Product();
            $result = $sp->insertmenu($menu_name,$link);
            if ($result==true) {
                echo '<script>alert("Thêm Menu thành công")</script>';
            }
            break;
        case 'deletemenu':
            if(isset($_GET['id']))
            {
            $mahh=$_GET['id'];
            $hh=new Product();
            $hh->deleteMenu($mahh);
            echo '<script> alert("Xóa sản phẩm thành công")</script>';
            }
            include "View/menu.php";
            break;
    }

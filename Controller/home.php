<?php
$action="home";
if(isset($_GET['act']))
{
  $action=$_GET['act'];//$action=detail
}
switch($action)
{
  case 'home':
    include 'View/home.php';
    break;
  case 'sanpham':
    include 'View/sanpham.php';
    break;
  case 'khuyenmai':
    include 'View/sanpham.php';
    break;
  case 'detail':
    //truyền id qua bên detail tức là qua bên trang chi tiết sản phẩm
    include 'View/sanphamchitiet.php';
    break;
  case 'timkiem':
    // gửi thông tin tìm keiesm là giày qua trang sanpham
    include "View/sanpham.php";
    break;
  case 'menu':
    include 'View/sanpham.php';
    break;
  
}
?>
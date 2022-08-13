<?php
$action="cart";
// trước khi mà click vào giỏ hàng của khách hàng đó thì phải kiểm tra là khách hàng đó có
// giỏ hàng, tức là có chọn mua sp nào hay chưa,nếu chưa thì phải tạo giỏ hàng cho khách hàng đó
if(!isset($_SESSION['cart']))
{
  // nếu ko tồn tại giỏ hàng thì tạo ra giỏ hàng tên là $_SESSION['cart']
  // vì giỏ hàng chứa nhiều sản phẩm nên nó là kiểu mảng
  $_SESSION['cart']=array();
  //a[] tương đương $_SESSION['cart'][]
}
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action)
{
  case "cart":
    include 'View/cart.php';
    break;
  case "add_cart":
    // truyền qua đây mahh vì nó là thẻ input, màu sắc vì nó là thẻ select, số lượng vì là thẻ input, kích 
    // thước vì là thẻ input
    // vì pt truyền qua là POST nên lấy đc value thông qua (input, select), lấy value thông qua name
    //$_POST['mahh'=12,'mymausac'='màu be',;'soluong'=2;size='35']
    // $_POST[key=value]
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
      $mahh=$_POST['id_sp'];//$mahh=12
      $soluong=$_POST['soluong'];
      // đem thông tin này add vào trong giỏ hàng, mà ai add vào giỏ=>model
      // do pt add_item ko viết trong class nên khi gọi chỉ cần gọi tên pt mà thôi
      add_item($mahh,$soluong);
      // add_item($mah,$quantity,$mycolor,$size)
      // nếu add thành công vì về trang view/cart
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
    }
    break;
  case 'emty_cart':
    // truyền id là mã hh mà người dùng click xóa
    // nhận id
    if(isset($_GET['id']))
    {
      $key=$_GET['id'];
      // xóa thì dùng hàm unset
      unset($_SESSION['cart'][$key]);
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
    }
  case 'update_cart':
    // mình cần chỉnh sửa là số lượng, mà mỗi lần nhấn nút submit là truyền những value trong input qua, truyền thông qua name
    // nhưng khi form đó có nhiều đối tượng trong thẻ input thì khi nhấn nó chỉ lấy input cuối cùng nó truyền giá trị qua
    //newqty[21=>10,22=>2]
    //[21=>5,22=>2]
    $soluongnew=$_POST['newqty'];// $soluongnew là 1 array lưu thông tin của tất cả mã hàng trong giỏ hàng với số lượng tuowg ứng
    // duyệt qua giỏ hàng $_SESSION['cart']
    foreach($soluongnew as $key=>$qty)
    {
      if($_SESSION['cart'][$key]['qty']!=$qty)
      {
        update_item($key,$qty);//21,10
      }
    }
    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=cart"/>';
    break;
}
?>
<?php
$action="order";
if(isset($_GET['act']))
{
  $action=$_GET['act'];
}
switch($action)
{
  case "order":
    include "View/order.php";
    break;
  case "order_detail":
    if (isset($_SESSION['user_id'])) {
      
      // đầu tiên phải insert đc vào bang hóa đơn vì có mã số hóa đơn trước thì mới chèn đc vào bảng chi tiết hóa đơn
      // gọi pt chứa kết quả trả về của mã số hóa đơn
      $hd=new HoaDon();
      $hoadon_id=$hd->insertOrder($_SESSION['user_id']);//22
      // tiến hàng lưu mã số hóa đơn này vào trong session
      $_SESSION['hoadon_id']=$hoadon_id;//22
      //  sau khi lấy đc mã số hóa đơn từ bảng hóa đơn ra
      // chèn vào bảng chi tiest hóa đơn
      // chèn cái gì vào bảng chi tiết?=> đem thông tin trong giỏ hàng chèn vào
      //                    21                                                      22
      //$_SESSION['cart][[21,21.jpg,giày cao got, màu be, 35,2, 5000000, 1000000],[22,22.jpg,giày cao got, màu be, 35,2, 5000000, 1000000]]
      $total=0;
      foreach($_SESSION['cart'] as $key=>$item)
      {
        $hd->insertOrderDetail($hoadon_id,$item['mahh'],$item['qty'],$item['total']);
        // chèn vào đc bảng chi tiết hóa đơn
        //tính tổng tiền trên hóa đơn của bảng chi tiết hóa đơn
        $total+=$item['total'];
      }
      //  sau đó cập nhật tổng thành tiền trong bảng chi tiết hóa đơn vào cột tổng tiefn của bảng hóa đơn
      $hd->updateOrderTotal($hoadon_id,$total);
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=order"/>';
    }
    else {
      echo '<script>alert("Vui lòng đăng nhập trước khi thanh toán")</script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
    }
    break;
  }



?>
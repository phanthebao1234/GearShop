<?php
  include 'View/header_product.php';
?>
<div class="table-responsive">
 <!-- kiểm tra người dùng có đăng nhập hay chưa mới mua đc hàng -->
 <?php
//  khi người dùng dùng đăng ký thì thông đã đc lưu vào $_SESSION['makh']
if(!isset($_SESSION['user_id'])||count($_SESSION['cart'])==0):
  echo '<script> alert("Bạn chưa đăng nhập");</script>';
  echo '<meta http-equiv="refresh" content="0;url=./index.php?action=login"/>';
 ?>
 <!-- ngược lại tức là có đăng nhập và giỏ hàng có -->
 <?php
  else:
    
 ?>
  <h3 class="text-center text-uppercase fw-bold text-danger my-5">Hóa đơn</h3>
    <form action="" method="post">
      <table class="table table-bordered" border="0">
      <?php
        $hd=new HoaDon();
        if(isset($_SESSION['hoadon_id']))
        {
          // viết pt lấy thông tin của số hóa đơn trong bảng chi tiết hóa đơn ra
          // lấy thông tin của kh
          $result=$hd->getOrder($_SESSION['hoadon_id']);
          // vì trả về chỉ 1 khách hàng
          $date=new DateTime($result['ngaydat']);
          $ngay=$date->format("d/m/Y");
        }
      ?>
                        
       
      <tr>
          <td colspan="2">Số Hóa đơn: <?php echo $result['hoadon_id'];?> </td>
          <td colspan="2"> Ngày lập: <?php echo $ngay;?></td>
        </tr>
       <tr>
          <td colspan="2">Họ và tên:</td>
          <td colspan="2"><?php echo $result['user_name'];?></td>
        </tr>
       <tr>
          <td colspan="2">Địa chỉ:  </td>
          <td colspan="2"><?php echo $result['user_address'];?></td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại: </td>
          <td colspan="2"><?php echo $result['user_number'];?></td>
        </tr>
     
      </table>
      <!-- Thông tin sản phầm -->
      <table class="table table-bordered">
        <thead>

          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Giá</th>
          </tr>
        </thead>
        <tbody>
          <!-- hiển thị những mặt hàng của hóa đơn -->
          <?php
          $i=0;
            $resultct=$hd->getOrderDetail($_SESSION['hoadon_id']);
            // do trả về nhiều hàng hóa, nên dùng while
            while($set=$resultct->fetch()):
              $i++;
          ?>
            <tr>
              <td><?php echo $i;?></td>
              <td><?php echo $set['ten_sp'];?></td>
          
              <td>Đơn Giá: <?php echo $set['dongia_sp'];?> - Số Lượng: <?php echo $set['soluongmua'];?> <br />
              </td>
            </tr>
          <?php
          endwhile;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b><?php echo get_subTotal();?> <sup><u>đ</u></sup></b>
            </td>
           
          </tr>
        </tbody>
      </table>
    </form>
  <?php endif;?>
</div>
</div>
<div class="container-fluid">
<?php
    include 'View/header_product.php';
    if(!isset($_SESSION['cart'])||count($_SESSION['cart'])==0):
      echo '<script> alert("Giỏ hàng của bạn chưa có món hàng nào");</script>';
      echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
?>
<?php
    else:
?>
    <h3 class="fw-bold text-center text-danger text-uppercase my-5">Giỏ hàng</h3>
    <div class="row">
        <div class="col-lg-8">
           <form action="index.php?action=cart&act=update_cart" method="POST">
                <div class="d-flex justify-content-center">
                    <div class="left">
                        <table class="table border text-center">
                    <?php
                        $i=0;
                        // foreach(mang as $key=>$value)// foreach(mang as $item)
                            foreach($_SESSION['cart'] as $key=>$item):
                            $i++;
                    ?>
                            <tbody>
                                <tr>
                                    <td>
                                        <a href="index.php?action=home&act=detail&id=<?php echo $item['mahh'];?>">
                                            <img src="Content/images/<?php echo $item['hinh'];?>" class="d-inline w-25" alt="">
                                        </a>
                                    </td>
                                    <td rowspan="2">
                                        <h4><?php echo $item['name'];?></h4>
                                        
                                    </td>
                                    <td>
                                        Đơn giá: <?php echo number_format($item['cost']);?> - Số Lượng: <input type="text" name="newqty[<?php echo $item['mahh'];?>]" value="<?php echo $item['qty'];?>" required/><br>
                                
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger px-5">Sửa</button><br>
                                        <a class="btn-warning btn px-5 mt-2" href="index.php?action=cart&act=emty_cart&id=<?php echo $item['mahh'];?>">Xóa</a>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                        endforeach;
                    ?>
                        </table>
                    </div>
                    <div class="right"></div>
                </div>
           </form>
        </div>
        <div class="col-lg-4">
            <div class="box-top border mb-3">
                <label for="makhuyenmai" class="form-label">Mã khuyến mãi</label><br>
                <input type="text" class="form-control" name="makhuyenmai" width="50%" id="makhuyenmai">
            </div>

            <div class="box-bottom">
                <p>Tạm tính <span class="float-end"><?php echo get_subTotal();?> <sup><u>đ</u></sup></span></p>
                <h2 class="text-danger">Tổng <span><?php echo get_subTotal();?> <sup><u>đ</u></sup></span></h2>
            </div>
            <a href="index.php?action=order&act=order_detail" class="btn btn-danger px-5 py-2">Thanh toán</a>
        </div>
    </div>
<?php endif; ?>
</div>
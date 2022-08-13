
<?php
include 'View/header_product.php';
if (isset($_GET['id'])) {
    // gán biến 
    $id_sp = $_GET['id']; //$mahh=24
    // pt getListDetail bên hang hóa là chứa thông 1 sản phẩm đc lấy về
    // do pt này nằm trong lớp Hanghoa, muốn lấy nó thì phải tạo đối tượng
    $sp = new Products();
    $result = $sp->getListProductDetail($id_sp);
    //bởi vì trả về 1 row nên ko cần phải while
    //$result=[24,giày cao gót, 500000,24.jpg....]
    $ten_sp = $result['ten_sp']; //$result[1]

    $dongia_sp = $result['dongia_sp'];
    $giamgia_sp = $result['giamgia_sp'];
    // if ($giamgia <= 0) {
    //     $gia = $dongia_sp;
    // }
    // else {
    //     $gia = $gamgia_sp;
    //     $goc = $dongia_sp;
    // }
    $hinh_sp = $result['hinh_sp'];
    $mota_sp = $result['mota_sp'];
}
?>
<div class="container-fluid mt-5">
    <div class="detail mx-3">
        <div class="row">
            <div class="col-lg-4">
                <img src="Content/images/<?php echo $hinh_sp; ?>" alt="<?php echo $ten_sp; ?>" width="100%">
            </div>
            <div class="col-lg-5">
                <form action="index.php?action=cart&act=add_cart" method="POST">
                <h3 class=""><?php echo $ten_sp; ?></h3>
                <?php
                    if ($giamgia_sp <= 0) {
                        echo '<h3 class="text-danger">'. number_format($dongia_sp).'<sup><u>đ</u></sup></h3>
                        <p>Giá gốc:</p>';
                    }
                    else {
                        echo '<p class="text-danger">Khuyến mãi còn: </p>
                        <h3 class="text-danger">'.number_format($giamgia_sp).'<sup><u>đ</u></sup></h3>
                        <p>Giá gốc:</p>
                        <strike>'.number_format($dongia_sp).'</strike><sup><u>đ</u></sup>';
                    }
                ?>
                <hr width="75%">
                <p class="text-uppercase">Ưa đãi khi mua tại GEARVN</p>
                <p>⭐ Giảm ngay <strong>100,000đ</strong> khi mua thêm màn hình máy tính.</p>
                <p>⭐ Giảm ngay <strong>150,000đ</strong> khi mua thêm ghế.</p>
                <p>⭐ Giảm ngay <strong>100,000đ</strong> khi mua thêm ram.</p>
                <p>⭐ Giảm ngay <strong>50,000đ</strong> mỗi loại khi mua thêm chuột, phím, tai nghe.</p>
                <hr width="75%">
                <input type="hidden" name="id_sp" value="<?php echo $id_sp;?>">
                <div class="my-3">
                    <label for="soluong">Chọn só lượng sản phẩm</label>
                    <input type="number" name="soluong" id="soluong" required>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-danger" type="submit" style="font-size: 24px">
                        Đặt hàng
                        <i class="fas fa-cart-arrow-down fa-1x"></i>
                    </button>
                </div>
            </form>
            </div>
            <div class="col-lg-3">
                <div class="box border p-3">
                    <ul>
                        <li class="">
                            <i class="far fa-people-carry fa-1x text-primary"></i>
                            Bảo hành chính hãng
                        </li>
                        <li class="">
                            <i class="far fa-certificate fa-1x text-primary"></i>
                            Bảo hành chính hãng
                        </li>
                        <li class="">
                            <i class="far fa-shipping-fast fa-1x text-primary"></i>
                            Bảo hành chính hãng
                        </li>
                    </ul>
                </div>
            </div>

            <br>
        </div>
        <div class="container">
            <h3>Thông số kỹ thuật</h3>
            <p><?php echo $mota_sp; ?></p>
        </div>
    </div>
</div>
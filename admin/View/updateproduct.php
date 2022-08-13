<?php
if (isset($_GET["act"])) {
    if ($_GET["act"] == "insertsp") {
        $ac = 'insert';
    } elseif ($_GET["act"] = "update") {
        $ac = 'update';
    } else {
        $ac = 0;
    }
}
?>
<?php
if ($ac == 'insert') {
    echo '<div class=""><h3> THÊM SẢN PHẨM</h3></div>';
} else if ($ac == 'update') {
    echo '<div class=""><h3> CẬP NHẬT SẢN PHẨM</h3></div>';
} else {
    echo '<div class=""><h3> KHÔNG CÓ TRANG NÀO</h3></div>';
}
?>
<?php
if (isset($_GET['id'])) {
    $mahh = $_GET['id']; //2
    $hh = new Product();
    $result = $hh->getProductID($mahh);
    $ten_sp = $result['ten_sp']; //$result[1];giầy sling canvas
    $dongia_sp = $result['dongia_sp']; //545000
    $giamgia_sp = $result['giamgia_sp'];
    $hinh_sp = $result['hinh_sp'];
    $maloai_sp = $result['maloai_sp']; //3
    $soluotxem = $result['soluotxem_sp'];
    $ngaylap_sp = $result['ngaylap_sp'];
    $mota_sp = $result['mota_sp'];
    $soluongton_sp = $result['soluongton_sp'];
    $id_thuonghieu = $result['id_thuonghieu'];
}
?>
<div class="container">
    <?php
    if ($ac == 'insert') {
        echo '<form class="row g-3" action="index.php?action=sanpham&act=insert_action" method="POST" enctype="multipart/form-data">';
    } else if ($ac == 'update') {
        echo '<form class="row g-3" action="index.php?action=sanpham&act=update_action&id=<?php echo $mahh;?>" method="POST" enctype="multipart/form-data">';
    } else {
        echo 'rong';
    }
    ?>
<form>
    <div class="col-md-3 mb-3">
        <label for="id_sp" class="form-label">ID</label>
        <input type="text" class="form-control" id="id_sp" name="id_sp" disabled value="<?php if (isset($mahh)) echo $mahh;?>">
    </div>
    <div class="col-12 mb-3">
        <label for="ten_sp" class="form-label">Tên sản phẩm</label>
        <input type="text" class="form-control" id="ten_sp" name="ten_sp" value="<?php if (isset($ten_sp)) echo $ten_sp; ?>">
    </div>
    <div class="col-md-4 mb-3">
        <label for="dongia_sp" class="form-label">Đơn giá</label>
        <input type="text" class="form-control" id="dongia_sp" name="dongia_sp" value="<?php if (isset($dongia_sp)) echo $dongia_sp; ?>">
    </div>
    <div class="col-md-4 mb-3">
        <label for="giamgia_sp" class="form-label">Khuyến mãi</label>
        <input type="text" class="form-control" id="giamgia_sp" name="giamgia_sp" value="<?php if (isset($giamgia_sp)) echo $giamgia_sp; ?>">
    </div>
    <div class="col-md-6 mb-3">
        <h5>Hình sản phẩm</h5>
        <img src="../Content/images/<?php if (isset($mahh)) echo $hinh_sp; ?>" alt="" width="30%"><br>
        <label for="image" class="form-label">Chọn file để upload</label>
        <input class="form-control form-control-lg" id="image" name="image" type="file">
    </div>
    <div class="col-12 mb-3">
        <label for="maloai_sp" class="form-label">Mã loại</label>
        <select id="maloai_sp" name="maloai_sp" class="form-select">
            <?php
            // cho biến
            $selectLoai = -1;
            if (isset($maloai_sp) && $maloai_sp != -1) {
                $selectLoai = $maloai_sp; //3
            }
            $hh = new Product();
            $results = $hh->getListMaLoaiSP();
            while ($set = $results->fetch()) :
            ?>
                <option value="<?php echo $set['id_menu']; ?>" <?php if ($selectLoai == $set['id_menu']) echo 'selected="selected"'; ?>><?php echo $set['menu_name']; ?></option>
            <?php
            endwhile
            ?>
        </select>
    </div>
    <div class="col-md-6">
        <label for="ngaylap_sp" class="form-label">Ngày lập sản phẩm</label>
        <input type="date" class="form-control" id="ngaylap_sp" name="ngaylap_sp" value="<?php if (isset($ngaylap_sp)) echo $ngaylap_sp; ?>">
    </div>
    <div class="col-12 mb-3">
        <h5>Mô tả sản phẩm</h5>
        <textarea name="mota_sp" id="mota_sp" cols="100" rows="6"><?php if(isset($mota_sp)) echo $mota_sp; ?></textarea>
    </div>
    <div class="col-md-4 mb-3">
        <label for="soluongton_spsoluongton_sp" class="form-label">Số lượng tồn</label>
        <input type="text" class="form-control" id="soluongton_sp" name="soluongton_sp" placeholder="" value="<?php if (isset($soluongton_sp)) echo $soluongton_sp; ?>">
    </div>
    <div class="col-md-4 mb-3">
        <label for="soluotxem_sp" class="form-label">Số lượt xem</label>
        <input type="text" class="form-control" id="soluotxem_sp" name="soluotxem_sp" value="<?php if (isset($soluotxem_sp)) echo $soluotxem_sp; ?>">
    </div>
    <div class="col-12 mb-3">
        <label for="id_thuonghieu" class="form-label">Thương hiệu</label>
        <select id="id_thuonghieu" name="id_thuonghieu" class="form-select">
            <?php
            // cho biến
            $selectThuongHieu = -1;
            if (isset($id_thuonghieu) && $id_thuonghieu != -1) {
                $selectThuongHieu = $id_thuonghieu; 
            }
            $hh = new Product();
            $results = $hh->getListThuongHieuSP();
            while ($set = $results->fetch()) :
            ?>
                <option value="<?php echo $set['id_thuonghieu']; ?>" <?php if ($selectThuongHieu == $set['id_thuonghieu']) echo 'selected="selected"'; ?>><?php echo $set['ten_thuonghieu']; ?></option>
            <?php
            endwhile
            ?>
        </select>
    </div>
    <div class="col-12">
        
        <?php
            if ($ac == 'insert') {
                echo '<input type="submit" name="submit" value="Thêm sản phẩm" class="btn btn-primary">';
            } else if ($ac == 'update') {
                echo '<input type="submit" name="submit" value="Cập nhật" class="btn btn-primary">';
            } else {
                echo '<div class=""><h3> KHÔNG CÓ TRANG NÀO</h3></div>';
            }
        ?>
    </div>
    </form>
</div>